@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Edit Menu</h3>

            <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Menu Name</label>
                    <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" required>
                    @error('nama_menu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Optional)</label>
                    <input type="text" name="icon_menu" class="form-control" value="{{ $menu->icon_menu }}">
                    @error('icon_menu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
