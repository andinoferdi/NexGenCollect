@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card shadow-lg"
                style="border-radius: 25px; width: 600px; background: linear-gradient(to right, #000000, #ff2d31);">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $lelang->nft->foto) }}" alt="{{ $lelang->nft->nama_nft }}"
                            class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                    </div>

                    @php
                        $endDate = $lelang->tanggal_akhir;
                    @endphp
                    <h1 class="text-center text-white mb-3">
                        <strong>{{ $lelang->nft->nama_nft }}</strong>
                    </h1>

                    <div class="text-center mb-4">
                        <h5 class="text-white fw-bold">Lelang Berakhir Dalam:</h5>
                        <div id="countdown" class="fw-bold text-primary fs-4"></div>
                    </div>

                    @php
                        $highestBid = $penawaran->max('harga') ?? $lelang->nft->harga_awal;
                    @endphp
                    <div class="text-center mb-4">
                        <h5 class="text-success fw-bold">Harga Tertinggi Saat Ini: Rp
                            {{ number_format($highestBid, 0, ',', '.') }}</h5>
                    </div>

                    @if (now() > $lelang->tanggal_akhir)
                        <div class="alert alert-danger text-center">
                            <p>Lelang telah berakhir. Tidak dapat memasukkan harga penawaran lagi.</p>
                        </div>
                    @else
                        <div class="p-3 bg-light rounded shadow-sm">
                            <form action="{{ route('penawaran.store', $lelang->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="harga" class="form-label fw-bold">Masukkan Harga Penawaran</label>
                                    <input type="text" name="harga" id="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="Masukkan harga..." oninput="this.value = this.value.rupiah()"
                                        value="{{ old('harga', number_format($highestBid, 0, ',', '.')) }}" required
                                        min="{{ $highestBid }}" style="border-radius: 12px;">
                                    <small class="text-muted">Minimal harga penawaran: Rp
                                        {{ number_format($highestBid, 0, ',', '.') }}</small>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 fw-bold"
                                    style="border-radius: 12px; transition: all 0.3s ease-in-out;">
                                    Ajukan Penawaran
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="mt-5">
                        <h5 class="fw-bold text-white mb-3">Daftar Penawaran</h5>
                        @if ($penawaran->isEmpty())
                            <p class="text-center text-muted">Belum ada penawaran untuk lelang ini.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-black" style="background-color: #bdbdbd;">
                                            <th class="min-w-150px text-center">Nama User</th>
                                            <th class="min-w-150px text-center">Harga Penawaran</th>
                                            <th class="min-w-150px text-center">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penawaran as $bid)
                                            <tr class="text-black"
                                                style="background: linear-gradient(to right, #ffffff, #ffffff);">
                                                <td class="text-center">{{ $bid->user->name }}</td>
                                                <td class="text-center">Rp
                                                    {{ number_format($bid->harga, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ $bid->created_at->format('d M Y H:i') }}
                                                </td>
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
                    countdownElement.classList.remove('text-primary');
                    countdownElement.classList.add('text-danger');
                    clearInterval(countdownInterval);
                    return;
                }

                const days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                const hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days}h ${hours}j ${minutes}m ${seconds}s`;
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        });
    </script>
@endsection
