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
                            <img src="{{ asset('storage/' . $userVerifikasi->ktp_file) }}" alt="KTP"
                                class="img-thumbnail" style="max-width: 100%; height: auto;">
                        </div>
                        <div class="col-md-6 text-center">
                            <h5 class="mb-3">Portfolio File</h5>
                            <img src="{{ asset('storage/' . $userVerifikasi->portfolio_file) }}" alt="Portfolio"
                                class="img-thumbnail" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Description</h5>
                            <p>{{ $userVerifikasi->deskripsi }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Social Media Information</h5>
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
