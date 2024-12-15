@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg" style="border-radius: 15px; width: 600px;">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $lelang->nft->foto) }}" alt="{{ $lelang->nft->nama_nft }}"
                            class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                    </div>

                    @php
                        $endDate = $lelang->tanggal_akhir;
                    @endphp
                    <div class="text-center mb-4">
                        <h5 class="text-primary fw-bold">Lelang Berakhir Dalam:</h5>
                        <div id="countdown" class="fw-bold text-danger fs-4"></div>
                    </div>

                    <h4 class="text-center text-primary mb-3">
                        Penawaran untuk: <strong>{{ $lelang->nft->nama_nft }}</strong>
                    </h4>

                    @php
                        $highestBid = $penawaran->max('harga') ?? $lelang->nft->harga_awal;
                    @endphp
                    <div class="text-center mb-4">
                        <h5 class="text-success fw-bold">Harga Tertinggi Saat Ini: Rp
                            {{ number_format($highestBid, 0, ',', '.') }}</h5>
                    </div>

                    <div class="p-3 bg-light rounded shadow-sm">
                        <form action="{{ route('penawaran.store', $lelang->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="harga" class="form-label fw-bold">Masukkan Harga Penawaran</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    placeholder="Masukkan harga..." required min="{{ $highestBid }}">
                                <small class="text-muted">Minimal harga penawaran: Rp
                                    {{ number_format($highestBid, 0, ',', '.') }}</small>
                            </div>
                            <button type="submit" class="btn btn-danger w-100 fw-bold">Ajukan Penawaran</button>
                        </form>
                    </div>

                    <div class="mt-5">
                        <h5 class="fw-bold mb-3">Daftar Penawaran</h5>
                        @if ($penawaran->isEmpty())
                            <p class="text-center text-muted">Belum ada penawaran untuk lelang ini.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">Nama User</th>
                                            <th class="text-center">Harga Penawaran</th>
                                            <th class="text-center">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penawaran as $bid)
                                            <tr>
                                                <td class="text-center">{{ $bid->user->name }}</td>
                                                <td class="text-center">Rp {{ number_format($bid->harga, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ $bid->created_at->format('d M Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdownElement = document.getElementById('countdown');
            const endDate = new Date("{{ $endDate }}").getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const remainingTime = endDate - now;

                if (remainingTime <= 0) {
                    countdownElement.innerHTML = "Lelang Telah Berakhir!";
                    countdownElement.classList.remove('text-danger');
                    countdownElement.classList.add('text-secondary');
                    clearInterval(countdownInterval);
                    return;
                }

                const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days}h ${hours}j ${minutes}m ${seconds}d`;
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        });
    </script>
@endsection
