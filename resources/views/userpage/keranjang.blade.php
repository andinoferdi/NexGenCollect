@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center mb-4 text-white">Keranjang Belanja</h3>

        @if ($keranjangs->isEmpty())
            <div class="text-center my-5">
                <h5 class="text-white">Keranjang Anda kosong</h5>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-white">#</th>
                            <th class="text-white">Nama NFT</th>
                            <th class="text-white">Harga</th>
                            <th class="text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($keranjangs as $key => $keranjang)
                            @php
                                $total += $keranjang->nft->harga_awal;
                            @endphp
                            <tr>
                                <td class="text-white">{{ $key + 1 }}</td>
                                <td class="text-white">{{ $keranjang->nft->nama_nft }}</td>
                                <td class="text-white">Rp{{ number_format($keranjang->nft->harga_awal, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('keranjang.destroy', $keranjang->id) }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $keranjang->id }}').submit();">
                                        Hapus
                                    </a>
                                    <form id="delete-form-{{ $keranjang->id }}"
                                        action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total Harga -->
            <div class="text-right">
                <h5 class="text-white">Total Harga: Rp{{ number_format($total, 0, ',', '.') }}</h5>
            </div>

            <!-- Tombol Proses Pembayaran -->
            <div class="text-right mt-4">
                {{-- <a href="{{ route('checkout') }}" class="btn btn-success">Proses Pembayaran</a> --}}
            </div>
        @endif
    </div>
@endsection
