@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }}"
                                    alt="image" />
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#"
                                            class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->name }}</a>
                                        <a href="#"
                                            class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">
                                            {{ auth()->user()->role->nama_role }}
                                        </a>
                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="fas fa-user me-2"></i>Developer</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="fas fa-map-marker-alt me-2"></i>SF, Bay Area</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="fas fa-envelope me-2"></i>{{ auth()->user()->email }}</a>
                                    </div>
                                </div>
                                <div class="d-flex my-4">
                                    <a href="#" class="btn btn-sm btn-light me-2">Follow</a>
                                    <a href="#" class="btn btn-sm btn-primary me-3">Hire Me</a>
                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                        <i class="fas fa-ellipsis-h fs-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex overflow-auto h-55px">
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#profile_tab">Setting Tim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#assets_tab">Asset</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">

                <div class="tab-pane fade show active" id="profile_tab">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Profile Details</h3>
                            </div>
                        </div>
                        <div class="collapse show">
                            <form id="kt_account_profile_details_form" class="form" method="POST"
                                action="{{ route('updateprofile', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                                        <div class="col-lg-8">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url({{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }});">
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url({{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('assets/media/avatars/blank.png') }});">
                                                </div>
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                </label>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                            </div>
                                            <div class="form-text">
                                                Allowed file types: png, jpg, jpeg.
                                            </div>
                                            @error('foto')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="name"
                                                class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                                placeholder="Full Name" value="{{ old('name', $user->name) }}"
                                                autocomplete="off" />
                                            @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="email" name="email"
                                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email', $user->email) }}"
                                                autocomplete="off" />
                                            @error('email')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">New Password</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" name="password"
                                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                                placeholder="Enter new password" />
                                            @error('password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Confirm Password</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Confirm new password" />
                                            @error('password_confirmation')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">
                                        Save Changes
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="assets_tab">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0 cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Assets</h3>
                            </div>
                        </div>
                        <div class="collapse show">
                            <div class="card-body border-top p-9">
                            </div>
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
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil tab aktif dari localStorage atau gunakan default '#profile_tab'
            const activeTab = localStorage.getItem('activeTab') || '#profile_tab';
            const tabLink = document.querySelector(`[data-bs-target="${activeTab}"]`);
            const tabContent = document.querySelector(activeTab);

            // Aktifkan tab terakhir yang tersimpan
            if (tabLink) tabLink.classList.add('active');
            if (tabContent) tabContent.classList.add('show', 'active');

            // Simpan tab aktif ke localStorage saat diklik
            document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
                tab.addEventListener('shown.bs.tab', function(e) {
                    localStorage.setItem('activeTab', e.target.getAttribute('data-bs-target'));
                });
            });
        });
    </script>
@endsection
