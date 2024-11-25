@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Edit Submenu</h3>

            <form action="{{ route('submenu.update', $submenu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Menu</label>
                    <select name="menu_id" class="form-control" required>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $menu->id == $submenu->menu_id ? 'selected' : '' }}>
                                {{ $menu->nama_menu }}</option>
                        @endforeach
                    </select>
                    @error('menu_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Submenu Name</label>
                    <input type="text" name="nama_submenu" class="form-control" value="{{ $submenu->nama_submenu }}"
                        required>
                    @error('nama_submenu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text" name="link_submenu" class="form-control" value="{{ $submenu->link_submenu }}"
                        required>
                    @error('link_submenu')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Optional)</label>
                    <input type="text" name="icon_submenu" class="form-control" value="{{ $submenu->icon_submenu }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('submenu.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
