<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
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
            $transaction = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $checkout->id,
                    'gross_amount' => $checkout->total_harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];
            $snapToken = Snap::getSnapToken($transaction);
        }

        return view('userpage.checkout', compact('keranjangs', 'totalHarga', 'checkout', 'snapToken'));
    }
    public function notification(Request $request)
    {
        $notification = json_decode($request->getContent(), true);
        $transactionStatus = $notification['transaction_status'];
        $orderId = $notification['order_id'];
    
        $checkoutId = str_replace('ORDER-', '', $orderId);
        $checkout = Checkout::find($checkoutId);
    
        if ($checkout) {
            if (in_array($transactionStatus, ['capture', 'settlement'])) {
                $checkout->update(['status' => 'success']);
    
                $keranjangs = Keranjang::where('user_id', $checkout->user_id)->get();
                foreach ($keranjangs as $keranjang) {
                    \App\Models\NftUser::create([
                        'user_id' => $checkout->user_id,
                        'nft_id' => $keranjang->nft_id,
                    ]);
                    $keranjang->delete(); 
                }
            } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
                $checkout->update(['status' => 'failed']);
            } elseif ($transactionStatus == 'pending') {
                $checkout->update(['status' => 'pending']);
            }
        }
    
        return response()->json(['status' => 'ok']);
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
