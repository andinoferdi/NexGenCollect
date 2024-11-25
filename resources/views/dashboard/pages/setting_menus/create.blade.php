@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Setting Menu</h3>

            <form action="{{ route('setting_menus.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select" required>
                        <option value="" disabled selected>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Menu</label>
                    <div>
                        @foreach ($menus as $menu)
                            <div>
                                <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}">
                                <label>{{ $menu->nama_menu }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('menu_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('setting_menus.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
