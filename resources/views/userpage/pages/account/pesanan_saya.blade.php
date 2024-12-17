@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Pesanan Saya</h2>
        @if ($pesanans->isEmpty())
            <div class="alert alert-info text-center">
                <p>Anda belum memiliki pesanan. Mulailah berbelanja NFT favorit Anda!</p>
            </div>
        @else
            <div class="table-responsive">
                <div class="card bg-white shadow-sm">
                    <div class="card-body">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead class="table-dark">
                                <tr class="fw-bold text-white">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nama NFT</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tanggal Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanans as $index => $pesanan)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $pesanan->nft->foto) }}" alt="NFT"
                                                class="img-thumbnail"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                                        <td class="text-center text-black fw-bold">{{ $pesanan->nft->nama_nft }}</td>
                                        <td class="text-center text-black fw-bold">
                                            <span
                                                class="badge {{ $pesanan->status === 'success' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($pesanan->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center text-black">
                                            {{ $pesanan->created_at->format('d M Y H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
