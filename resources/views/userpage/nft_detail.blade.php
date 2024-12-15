@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="card card-custom shadow-lg" style="border-radius: 15px; max-width: 800px; margin: 0 auto;">
            <div class="card-body p-10">
                <div class="text-center mb-5">
                    <div class="image-input image-input-outline" data-kt-image-input="true">
                        <div class="image-input-wrapper w-200px h-200px"
                            style="background-image: url({{ asset('storage/' . $nft->foto) }}); border-radius: 15px; background-size: cover; background-position: center;">
                        </div>
                    </div>
                    <h3 class="mt-3">{{ $nft->nama_nft }}</h3>
                </div>

                <div class="form-group mb-5">
                    <label class="form-label text-dark fw-bold">Deskripsi</label>
                    <p class="text-muted">{{ $nft->deskripsi }}</p>
                </div>

                <div class="form-group mb-5">
                    <label class="form-label text-dark fw-bold">Kategori</label>
                    <p class="badge bg-info text-dark py-2 px-3 text-capitalize">{{ $nft->kategori->nama_kategori }}</p>
                </div>

                <div class="form-group mb-5">
                    <label class="form-label text-dark fw-bold">File</label>
                    @php
                        $fileExtension = pathinfo($nft->file, PATHINFO_EXTENSION);
                    @endphp

                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <div style="pointer-events: none;">
                            <img src="{{ asset('storage/' . $nft->file) }}" class="img-fluid rounded shadow-sm mt-3"
                                alt="NFT Image" style="max-width: 100%; height: auto;" oncontextmenu="return false;">
                        </div>
                    @elseif (in_array($fileExtension, ['mp3']))
                        <div>
                            <audio id="audioPlayer" controls class="w-100 mt-3" controlsList="nodownload"
                                oncontextmenu="return false;">
                                <source src="{{ asset('storage/' . $nft->file) }}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    @elseif (in_array($fileExtension, ['mp4']))
                        <div>
                            <video id="videoPlayer" controls class="w-100 rounded shadow-sm mt-3" controlsList="nodownload"
                                oncontextmenu="return false;">
                                <source src="{{ asset('storage/' . $nft->file) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @else
                        <p class="text-muted">Kategori file tidak dikenali.</p>
                    @endif
                </div>


                @if ($lelang && $highestBid)
                    <div class="form-group mb-5">
                        <label class="form-label text-dark fw-bold">Harga Penawaran Tertinggi</label>
                        <p class="text-success">Rp {{ number_format($highestBid, 0, ',', '.') }}</p>
                    </div>
                @elseif ($lelang)
                    <p class="text-muted">Belum ada penawaran untuk lelang ini.</p>
                @endif

                <div class="form-group mb-5">
                    <label class="form-label text-dark fw-bold">Lelang Status</label>
                    @if ($lelang)
                        <div id="countdown" class="text-center mb-3"></div>
                        @if ($lelang->status === 'closed')
                            <div class="text-center mb-3">
                                @if ($lelang->pemenang)
                                    <h5 class="text-danger fw-bold">Pemenang Lelang:
                                        {{ $lelang->pemenang->user->name }}</h5>
                                @else
                                    <h5 class="text-danger fw-bold">Lelang selesai, tetapi tidak ada pemenang.</h5>
                                    <p class="text-muted">NFT ini telah ditambahkan ke keranjang Anda.</p>
                                @endif
                            </div>
                        @else
                            <div class="text-center mb-3">
                                <div id="lelang-button" class="d-none mb-3">
                                    <a href="{{ route('penawaran.index', $lelang->id) }}"
                                        class="btn btn-primary btn-lg">Buat Penawaran</a>
                                </div>
                                <div class="alert alert-warning text-center mx-auto" style="max-width: 600px;"
                                    role="alert">
                                    <strong>Lelang Dimulai!</strong> Segera ajukan penawaran sebelum lelang berakhir.
                                </div>
                            </div>
                        @endif
                    @else
                        <p class="text-muted">NFT ini tidak sedang dilelang.</p>
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ route('userpage.nft') }}" class="btn btn-light w-50">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($lelang && $lelang->status !== 'closed')
                const startDate = new Date("{{ $lelang->tanggal_awal }}").getTime();
                const endDate = new Date("{{ $lelang->tanggal_akhir }}").getTime();
                const countdownElement = document.getElementById('countdown');
                const lelangButton = document.getElementById('lelang-button');

                function updateCountdown() {
                    const now = new Date().getTime();
                    let remainingTime;

                    if (now < startDate) {
                        remainingTime = startDate - now;
                        countdownElement.innerHTML = "Lelang dimulai dalam: " + formatTime(remainingTime);
                    } else if (now >= startDate && now <= endDate) {
                        remainingTime = endDate - now;
                        countdownElement.innerHTML = "Lelang berakhir dalam: " + formatTime(remainingTime);
                        lelangButton.classList.remove('d-none');

                    } else {
                        countdownElement.innerHTML = "Lelang telah selesai.";
                        countdownElement.classList.add('text-danger');
                        clearInterval(countdownInterval);
                        return;
                    }
                }

                function formatTime(milliseconds) {
                    const days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((milliseconds % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((milliseconds % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((milliseconds % (1000 * 60)) / 1000);

                    return `${days}d ${hours}h ${minutes}m ${seconds}s`;
                }

                const countdownInterval = setInterval(updateCountdown, 1000);
                updateCountdown();
            @endif
        });
    </script>
@endsection
