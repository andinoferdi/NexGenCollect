@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Setting Submenu</h3>

            <form action="{{ route('setting_submenus.store') }}" method="POST">
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
                    <label class="form-label">Menus and Submenus</label>
                    @foreach ($menus as $menu)
                        <div class="mb-2">
                            <strong>{{ $menu->nama_menu }}</strong>
                            <div class="ms-3">
                                @foreach ($menu->submenus as $submenu)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="submenu_id[]"
                                            value="{{ $submenu->id }}" id="submenu_{{ $submenu->id }}">
                                        <label class="form-check-label"
                                            for="submenu_{{ $submenu->id }}">{{ $submenu->nama_submenu }}</label>
                                        <input type="hidden" name="menu_id[]" value="{{ $menu->id }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    @error('submenu_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('setting_submenus.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
