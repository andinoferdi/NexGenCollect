@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <form action="{{ route('nft.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="nama_nft" class="form-control @error('nama_nft') is-invalid @enderror"
                        required>
                    @error('nama_nft')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>File</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required
                        accept=".jpg,.jpeg,.png,.mp3,.mp4">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                    <div class="col-lg-8">
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('{{ asset('assets/media/avatars/blank.png') }}');">
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{ asset('assets/media/avatars/blank.png') }}');">
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti Foto">
                                <i class="fas fa-pencil-alt fs-7"></i>
                                <input type="file" name="foto" class="@error('foto') is-invalid @enderror"
                                    accept=".png, .jpg, .jpeg" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus Foto">
                                <i class="fas fa-trash fs-7"></i>
                            </span>
                        </div>
                        <div class="form-text">Jenis file yang diperbolehkan: png, jpg, jpeg.</div>
                        @error('foto')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Category</label>
                    <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
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
                        <input type="text" name="harga_awal" id="harga_awal"
                            class="form-control @error('harga_awal') is-invalid @enderror"
                            oninput="this.value = this.value.rupiah()" required>
                        @error('harga_awal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="available">Available</option>
                        <option value="auction">Auction</option>
                        <option value="sold">Sold</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
