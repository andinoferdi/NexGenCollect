@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>{{ $nft->nama_nft }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Photo:</label>
                        <img src="{{ asset('storage/' . $nft->foto) }}" class="img-thumbnail mt-2" width="200">
                    </div>
                    <div class="mb-3">
                        <label>File:</label>
                        <a href="{{ asset('storage/' . $nft->file) }}" target="_blank">Download File</a>
                    </div>
                    <div class="mb-3">
                        <label>Description:</label>
                        <p>{{ $nft->deskripsi }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Category:</label>
                        <p>{{ $nft->kategori->nama_kategori }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Created By:</label>
                        <p>{{ $nft->user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Starting Price:</label>
                        <p>Rp{{ number_format($nft->harga_awal, 0, ',', '.') }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Final Price:</label>
                        <p>{{ $nft->harga_akhir ? 'Rp' . number_format($nft->harga_akhir, 0, ',', '.') : 'N/A' }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Status:</label>
                        <p>{{ ucfirst($nft->status) }}</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('nft.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection
@section('script')
