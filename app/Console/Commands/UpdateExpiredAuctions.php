<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lelang;
use App\Models\PenawaranLelang;
use App\Models\Keranjang;

class UpdateExpiredAuctions extends Command
{
    protected $signature = 'auctions:update-expired';
    protected $description = 'Update status of expired auctions to closed';

    public function handle()
    {
        $expiredLelangs = Lelang::where('status', 'open')
            ->where('tanggal_akhir', '<=', now())
            ->get();

        foreach ($expiredLelangs as $lelang) {
            $highestBid = PenawaranLelang::where('lelang_id', $lelang->id)->max('harga');

            if (!$highestBid) {
                $lelang->nft->update(['status' => 'available']);
            } else {
                $highestBidder = PenawaranLelang::where('lelang_id', $lelang->id)
                    ->where('harga', $highestBid)
                    ->first();

                $lelang->nft->update(['status' => 'sold']);

                Keranjang::create([
                    'user_id' => $highestBidder->user_id,
                    'nft_id' => $lelang->nft_id,
                ]);
            }

            $lelang->update(['status' => 'closed', 'harga_akhir' => $highestBid ?? null]);
        }

        $this->info('Expired auctions updated successfully.');
    }
}
