@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-5 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">{{ $nft->nama_nft }}</h3>
                    <a href="{{ route('nft.index') }}" class="btn btn-light btn-sm">kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h5 class="fw-bold">Foto</h5>
                            <img src="{{ asset('storage/' . $nft->foto) }}" class="img-fluid rounded shadow-sm"
                                alt="{{ $nft->nama_nft }}">
                        </div>

                        <div class="col-md-8 mb-3">
                            <h5 class="fw-bold">File</h5>
                            @php
                                $fileExtension = pathinfo($nft->file, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $nft->file) }}" class="img-fluid rounded shadow-sm"
                                    alt="NFT File">
                            @elseif (in_array($fileExtension, ['mp4']))
                                <video controls class="w-100 rounded shadow-sm">
                                    <source src="{{ asset('storage/' . $nft->file) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif (in_array($fileExtension, ['mp3']))
                                <audio controls class="w-100">
                                    <source src="{{ asset('storage/' . $nft->file) }}" type="audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                            @elseif (in_array($fileExtension, ['pdf']))
                                <a href="{{ asset('storage/' . $nft->file) }}" target="_blank" class="btn btn-primary">
                                    View PDF
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $nft->file) }}" target="_blank" class="btn btn-secondary">
                                    Download File
                                </a>
                            @endif
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Deskripsi</h5>
                            <p>{{ $nft->deskripsi }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Kategori</h5>
                            <p class="text-capitalize">{{ $nft->kategori->nama_kategori }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Dibuat Oleh</h5>
                            <p>{{ $nft->user->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Harga Awal</h5>
                            <p>Rp{{ number_format($nft->harga_awal, 0, ',', '.') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Harga Akhir</h5>
                            <p>
                                {{ $nft->harga_akhir ? 'Rp' . number_format($nft->harga_akhir, 0, ',', '.') : 'N/A' }}
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="fw-bold">Status</h5>
                            <p class="text-capitalize">{{ $nft->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
