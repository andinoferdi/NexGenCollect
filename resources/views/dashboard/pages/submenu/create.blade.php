@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Submenu</h3>

            <form action="{{ route('submenu.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Menu</label>
                    <select name="menu_id" class="form-control" required>
                        <option value="" disabled selected>Select Menu</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Submenu Name</label>
                    <input type="text" name="nama_submenu" class="form-control" required>
                    @error('nama_submenu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link_submenu" class="form-control" required>
                    @error('link_submenu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Optional)</label>
                    <input type="text" name="icon_submenu" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('submenu.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
