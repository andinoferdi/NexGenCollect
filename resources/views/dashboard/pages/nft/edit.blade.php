@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <form action="{{ route('nft.update', $nft->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="nama_nft" class="form-control" value="{{ $nft->nama_nft }}" required>
                </div>
                <div class="mb-3">
                    <label>File</label>
                    <input type="file" name="file" class="form-control">
                    <small class="text-muted">Current File: <a href="{{ asset('storage/' . $nft->file) }}"
                            target="_blank">View</a></small>
                </div>
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Current Photo:</small>
                    <img src="{{ asset('storage/' . $nft->foto) }}" alt="Current Photo" class="img-thumbnail mt-2"
                        width="150">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="deskripsi" class="form-control">{{ $nft->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Category</label>
                    <select name="kategori_id" class="form-control" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $nft->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $nft->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Starting Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="harga_awal" id="harga_awal" class="form-control"
                            value="{{ number_format($nft->harga_awal, 0, ',', '.') }}"
                            oninput="this.value = this.value.rupiah()" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="available" {{ $nft->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="auction" {{ $nft->status == 'auction' ? 'selected' : '' }}>Auction</option>
                        <option value="sold" {{ $nft->status == 'sold' ? 'selected' : '' }}>Sold</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
