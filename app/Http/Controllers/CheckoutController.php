<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\PesananSaya;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Transaction;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkTransactionStatus($orderId)
    {
        try {
            $status = Transaction::status($orderId);
            Log::info('Transaction Status: ', $status);
            return $status;
        } catch (\Exception $e) {
            Log::error('Error checking transaction status: ' . $e->getMessage());
            return null;
        }
    }

    public function index()
    {
        $keranjangs = Keranjang::with('nft')->where('user_id', Auth::id())->get();
    
        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }
    
        $totalHarga = $keranjangs->sum(function ($keranjang) {
            return $keranjang->nft->harga_akhir ?? 0;
        });
    
        $checkout = Checkout::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'success'])
            ->latest()
            ->first();
    
        if (!$checkout) {
            $checkout = Checkout::create([
                'user_id' => Auth::id(),
                'total_harga' => $totalHarga,
                'status' => 'pending',
            ]);
        }
    
        $snapToken = null;
        if ($checkout->status === 'pending') {
            $userEmail = Auth::user()->email;

            if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                $userEmail = 'no-reply@example.com';
            }
            $uuid = Str::uuid();
            $transaction = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $uuid,
                    'gross_amount' => $checkout->total_harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => $userEmail,
                ],
            ];
    
            $snapToken = Snap::getSnapToken($transaction);
            $checkout->update(['transaksi_id' => $uuid]);
        }
    
        return view('userpage.checkout', compact('keranjangs', 'totalHarga', 'checkout', 'snapToken'));
    }
    
    public function receive(Request $request)
{
    try {
        $notification = new Notification();
        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;
        $checkoutId = str_replace('ORDER-', '', $orderId);

        Log::info('Midtrans Callback Received:', [
            'transaction_status' => $transactionStatus,
            'order_id' => $orderId,
        ]);

        $checkout = Checkout::where('transaksi_id', $checkoutId)->first();

        if (!$checkout) {
            Log::warning('Checkout not found for ID: ' . $checkoutId);
            return response()->json(['error' => 'Checkout not found'], 404);
        }

        $keranjangs = Keranjang::where('user_id', $checkout->user_id)->get();

        switch ($transactionStatus) {
            case 'capture':
            case 'settlement':
                $checkout->update(['status' => 'success']);
                Log::info("Order {$orderId} updated to success");
                $keranjangs = Keranjang::where('user_id', $checkout->user_id)->get();
        
                foreach ($keranjangs as $keranjang) {
                    \App\Models\NftUser::create([
                        'user_id' => $checkout->user_id,
                        'nft_id' => $keranjang->nft_id,
                    ]);
        
                    PesananSaya::create([
                        'user_id' => $checkout->user_id,
                        'nft_id' => $keranjang->nft_id,
                        'status' => 'success',
                    ]);
        
                    $keranjang->delete();
                }
                break;
        

            case 'expire':
            case 'cancel':
            case 'deny':
                $checkout->update(['status' => 'failed']);
                Log::info("Order {$orderId} failed with status: {$transactionStatus}");

                foreach ($keranjangs as $keranjang) {
                    PesananSaya::create([
                        'user_id' => $checkout->user_id,
                        'nft_id' => $keranjang->nft_id,
                        'status' => 'failed',
                    ]);
                }
                break;

            case 'pending':
                $checkout->update(['status' => 'pending']);
                Log::info("Order {$orderId} is pending");

                foreach ($keranjangs as $keranjang) {
                    PesananSaya::firstOrCreate([
                        'user_id' => $checkout->user_id,
                        'nft_id' => $keranjang->nft_id,
                        'status' => 'pending',
                    ]);
                }
                break;

            default:
                Log::warning("Unknown transaction status: {$transactionStatus}");
                break;
        }

        return response()->json([
            'success' => true,
            'message' => 'Notification successfully processed',
        ]);
    } catch (\Exception $e) {
        Log::error('Midtrans Callback Error: ' . $e->getMessage());

        return response()->json([
            'error' => true,
            'message' => 'Notification failed to process',
        ], 500);
    }
}


    public function simulateSuccess($checkoutId)
    {
        $checkout = Checkout::findOrFail($checkoutId);

        if ($checkout->status === 'pending') {
            $checkout->update(['status' => 'success']);

            $keranjangs = Keranjang::where('user_id', $checkout->user_id)->get();
            foreach ($keranjangs as $keranjang) {
                \App\Models\NftUser::create([
                    'user_id' => $checkout->user_id,
                    'nft_id' => $keranjang->nft_id,
                ]);
                $keranjang->delete();
            }

            return response()->json(['message' => 'Simulasi pembayaran sukses. NFT berhasil dipindahkan.']);
        }

        return response()->json(['message' => 'Transaksi bukan pending atau sudah diproses.'], 400);
    }
}
