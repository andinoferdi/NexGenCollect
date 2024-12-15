@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Keranjang Anda</h2>
        @if ($keranjangs->isEmpty())
            <div class="alert alert-info text-center">
                <p>Keranjang Anda kosong. Silahkan menangkan NFT melalui lelang!</p>
            </div>
        @else
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <div class="card bg-white shadow-sm">
                            <div class="card-body">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead class="table-dark">
                                        <tr class="fw-bold text-white">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Nama NFT</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Tanggal Ditambahkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjangs as $index => $keranjang)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('storage/' . $keranjang->nft->foto) }}"
                                                        alt="NFT" class="img-thumbnail"
                                                        style="width: 100px; height: 100px; object-fit: cover;">
                                                </td>
                                                <td class="text-center text-black fw-bold">{{ $keranjang->nft->nama_nft }}
                                                </td>
                                                <td class="text-center text-black fw-bold">
                                                    {{ number_format($keranjang->nft->harga_akhir, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center text-black">
                                                    {{ $keranjang->created_at->format('d M Y H:i') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-white shadow-sm">
                        <div class="card-body">
                            <h5 class="text-center">Total Harga</h5>
                            <p class="text-center text-muted">Total harga dari NFT yang ada di keranjang</p>
                            <hr>
                            <div class="text-center">
                                <h4 class="fw-bold">Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
