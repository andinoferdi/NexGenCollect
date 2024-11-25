@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">NFT Management</span>
                        <span class="text-muted mt-1 fw-bold fs-7">List of all NFTs</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('nft.create') }}" class="btn btn-sm btn-light btn-active-primary">
                            <i class="fas fa-plus text-primary"></i> New NFT
                        </a>
                    </div>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-150px">Photo</th>
                                    <th class="min-w-150px">NFT Name</th>
                                    <th class="min-w-150px">Category</th>
                                    <th class="min-w-100px">Starting Price</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nfts as $nft)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $nft->foto) }}" alt="NFT Photo"
                                                class="img-thumbnail" width="80">
                                        </td>
                                        <td>{{ $nft->nama_nft }}</td>
                                        <td>{{ $nft->kategori->nama_kategori }}</td>
                                        <td>Rp{{ number_format($nft->harga_awal, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($nft->status) }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('nft.edit', $nft->id) }}"
                                                class="btn btn-icon btn-light btn-sm me-1 text-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="{{ route('nft.detail', $nft->id) }}"
                                                class="btn btn-icon btn-light btn-sm me-1 text-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('nft.destroy', $nft->id) }}" method="POST"
                                                style="display:inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-icon btn-light btn-sm text-danger delete-button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
