@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h1 class="mb-5">Edit NFT</h1>

            <form action="{{ route('nft.update', $nft->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama NFT</label>
                    <input type="text" autocomplete="off" name="nama_nft"
                        class="form-control @error('nama_nft') is-invalid @enderror"
                        value="{{ old('nama_nft', $nft->nama_nft) }}" required>
                    @error('nama_nft')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>File</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.mp3,.mp4">
                    <div class="form-text">Current file: <a href="{{ asset('storage/' . $nft->file) }}"
                            target="_blank">{{ $nft->file }}</a></div>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                    <div class="col-lg-8">
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('{{ $nft->foto ? asset('storage/' . $nft->foto) : asset('assets/media/avatars/blank.png') }}');">
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{ $nft->foto ? asset('storage/' . $nft->foto) : asset('assets/media/avatars/blank.png') }}');">
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Foto">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                <input type="file" name="foto" class="@error('foto') is-invalid @enderror"
                                    accept=".png, .jpg, .jpeg" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Foto">
                                <i class="fas fa-trash fs-7"></i>
                            </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        @error('foto')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" autocomplete="off" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $nft->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $nft->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                        @foreach ($users as $user)
                            @if (auth()->id() == 1 || auth()->id() == $user->id)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id', $nft->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label>Harga Awal</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" autocomplete="off" name="harga_awal" id="harga_awal"
                            class="form-control @error('harga_awal') is-invalid @enderror"
                            value=" {{ number_format($nft->harga_awal, 0, ',', '.') }}"
                            oninput="this.value = this.value.rupiah()" required>
                        @error('harga_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="available" {{ $nft->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="auction" {{ $nft->status == 'auction' ? 'selected' : '' }}>Auction</option>
                        <option value="sold" {{ $nft->status == 'sold' ? 'selected' : '' }}>Sold</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('nft.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
