@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border-radius: 15px; max-width: 800px; margin: 0 auto;">
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
                        <img src="{{ asset('storage/' . $nft->file) }}" class="img-fluid rounded shadow-sm mt-3"
                            alt="NFT">
                    @elseif ($fileExtension === 'mp3')
                        <audio controls class="w-100 mt-3">
                            <source src="{{ asset('storage/' . $nft->file) }}" type="audio/mp3">
                        </audio>
                    @elseif ($fileExtension === 'mp4')
                        <video controls class="w-100 rounded shadow-sm mt-3">
                            <source src="{{ asset('storage/' . $nft->file) }}" type="video/mp4">
                        </video>
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ route('userpage.nft_user') }}" class="btn btn-light w-50">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
