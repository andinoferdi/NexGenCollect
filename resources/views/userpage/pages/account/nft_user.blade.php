@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">NFT Saya</h2>
        @if ($nfts->isEmpty())
            <div class="alert alert-info text-center">
                <p>Anda belum memiliki NFT.</p>
            </div>
        @else
            <div class="row">
                @foreach ($nfts as $nftUser)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-white shadow-sm">
                            <img src="{{ asset('storage/' . $nftUser->nft->foto) }}" class="card-img-top" alt="NFT">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $nftUser->nft->nama_nft }}</h5>
                                <p class="card-text text-center text-muted">
                                    Harga: Rp {{ number_format($nftUser->nft->harga_akhir, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
