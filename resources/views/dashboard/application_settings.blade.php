@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab_setting_tim">Setting Tim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab_asset">Asset</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_setting_tim" role="tabpanel">
                    <form method="POST" action="{{ route('application_settings.update_all') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @foreach ($settings as $index => $setting)
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header border-0 cursor-pointer">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bolder m-0">Anggota Tim: {{ $setting->nama_tim }}</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Nama Tim -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Nama Tim</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="teams[{{ $setting->id }}][nama_tim]"
                                                class="form-control form-control-lg form-control-solid @error("teams.{$setting->id}.nama_tim") is-invalid @enderror"
                                                placeholder="Masukkan nama tim" value="{{ $setting->nama_tim }}" required
                                                autocomplete="off" />
                                            @error("teams.{$setting->id}.nama_tim")
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Deskripsi Tim -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi Tim</label>
                                        <div class="col-lg-8">
                                            <textarea name="teams[{{ $setting->id }}][deskripsi_tim]"
                                                class="form-control form-control-lg form-control-solid @error("teams.{$setting->id}.deskripsi_tim") is-invalid @enderror"
                                                rows="4" placeholder="Masukkan deskripsi tim" autocomplete="off">{{ $setting->deskripsi_tim }}</textarea>
                                            @error("teams.{$setting->id}.deskripsi_tim")
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Foto Tim -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Foto Tim</label>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('{{ $setting->foto_tim ? asset('storage/' . $setting->foto_tim) : asset('assets/media/avatars/blank.png') }}');">
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url('{{ $setting->foto_tim ? asset('storage/' . $setting->foto_tim) : asset('assets/media/avatars/blank.png') }}');">
                                                </div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Ganti Foto">
                                                    <i class="fas fa-pencil-alt fs-7"></i>
                                                    <input type="file" name="teams[{{ $setting->id }}][foto_tim]"
                                                        class="@error("teams.{$setting->id}.foto_tim") is-invalid @enderror"
                                                        accept=".png, .jpg, .jpeg" />
                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Hapus Foto">
                                                    <i class="fas fa-trash fs-7"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">Jenis file yang diperbolehkan: png, jpg, jpeg.</div>
                                            @error("teams.{$setting->id}.foto_tim")
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Tombol Simpan -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>


                <div class="tab-pane fade" id="tab_asset" role="tabpanel">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Asset Tim</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <form method="POST" action="{{ route('assets.store') }}"> --}}
                            @csrf

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Nama Asset</label>
                                <div class="col-lg-8">
                                    <input type="text" name="nama_asset"
                                        class="form-control form-control-lg form-control-solid @error('nama_asset') is-invalid @enderror"
                                        placeholder="Masukkan nama asset" required />
                                    @error('nama_asset')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Deskripsi Asset</label>
                                <div class="col-lg-8">
                                    <textarea name="deskripsi_asset"
                                        class="form-control form-control-lg form-control-solid @error('deskripsi_asset') is-invalid @enderror"
                                        rows="4" placeholder="Masukkan deskripsi asset"></textarea>
                                    @error('deskripsi_asset')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Asset
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
