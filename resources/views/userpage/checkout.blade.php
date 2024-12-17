@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-white">Halaman Checkout</h2>
        @if ($keranjangs->isEmpty())
            <div class="alert alert-info text-center">
                <p>Tidak ada item yang bisa di-checkout. Silahkan tambahkan NFT ke keranjang terlebih dahulu!</p>
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
                            <p class="text-center text-muted">Total harga dari NFT yang akan dibayar</p>
                            <hr>
                            <div class="text-center">
                                <h4 class="fw-bold">Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>
                            </div>
                            <div class="text-center mt-3">
                                <p class="fw-bold mb-2">
                                    Status Pembayaran:
                                    @if ($checkout->status === 'success')
                                        <span class="text-success">Sukses</span>
                                    @elseif ($checkout->status === 'pending')
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </p>
                                @if ($checkout->status === 'success')
                                    <a href="{{ route('userpage.nft_user') }}" class="btn btn-success btn-lg">Lihat NFT
                                        Saya</a>
                                @else
                                    <button id="pay-button" class="btn btn-primary btn-lg">Bayar Sekarang</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($snapToken)
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('services.midtrans.client_key') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        alert('Pembayaran berhasil!');
                        location.reload();
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal! Silakan coba lagi.');
                    },
                    onPending: function(result) {
                        alert('Pembayaran tertunda, silakan selesaikan transaksi Anda.');
                    }
                });
            }
        </script>
    @endif
@endsection
