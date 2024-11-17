@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="card card-custom shadow-lg" style="border-radius: 15px;">
            <div class="card-body p-10">
                <!-- Form Update Profil -->
                <form action="{{ route('updateprofile_user', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Foto Profil -->
                    <div class="text-center mb-5">
                        <div class="image-input image-input-outline" data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px"
                                style="background-image: url({{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }});">
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                        <h3 class="mt-3">{{ $user->name }}</h3>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="form-group mb-5">
                        <label class="form-label text-dark">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-solid"
                            value="{{ old('name', $user->name) }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-5">
                        <label class="form-label text-dark">Email</label>
                        <input type="email" name="email" class="form-control form-control-solid"
                            value="{{ old('email', $user->email) }}" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-5">
                        <label class="form-label text-dark">Password</label>
                        <input type="password" name="password" class="form-control form-control-solid"
                            placeholder="Enter new password (optional)">
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary w-50">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
