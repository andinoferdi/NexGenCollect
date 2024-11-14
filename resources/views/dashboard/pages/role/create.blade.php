@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Role</h3>

            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Role Name</label>
                    <input type="text" name="nama_role" class="form-control" required>
                    @error('nama_role')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
