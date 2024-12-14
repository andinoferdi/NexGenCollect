@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-5">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">User Verification Details</span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-6 text-center">
                            <h5 class="mb-3">KTP File</h5>
                            @php
                                $ktpFileExtension = pathinfo($userVerifikasi->ktp_file, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($ktpFileExtension), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $userVerifikasi->ktp_file) }}" alt="KTP"
                                    class="img-thumbnail" style="max-width: 100%; height: auto;">
                            @elseif (strtolower($ktpFileExtension) == 'pdf')
                                <a href="{{ asset('storage/' . $userVerifikasi->ktp_file) }}" target="_blank"
                                    class="text-primary">Lihat PDF KTP</a>
                            @else
                                <p>File format not supported</p>
                            @endif
                        </div>

                        <div class="col-md-6 text-center">
                            <h5 class="mb-3">Portfolio File</h5>
                            @php
                                $portfolioFileExtension = pathinfo($userVerifikasi->portfolio_file, PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array(strtolower($portfolioFileExtension), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $userVerifikasi->portfolio_file) }}" alt="Portfolio"
                                    class="img-thumbnail" style="max-width: 100%; height: auto;">
                            @elseif (strtolower($portfolioFileExtension) == 'pdf')
                                <a href="{{ asset('storage/' . $userVerifikasi->portfolio_file) }}" target="_blank"
                                    class="text-primary">Lihat PDF Portfolio</a>
                            @elseif (strtolower($portfolioFileExtension) == 'mp4')
                                <video controls style="max-width: 100%; height: auto;">
                                    <source src="{{ asset('storage/' . $userVerifikasi->portfolio_file) }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <p>File format not supported</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Deskripsi Diri</h5>
                            <p>{{ $userVerifikasi->deskripsi }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Informasi Akun Sosial Media</h5>
                            <p>{{ $userVerifikasi->sosial_media_info }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
