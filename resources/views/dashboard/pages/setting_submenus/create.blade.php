@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Setting Submenu</h3>

            <form action="{{ route('setting_submenus.store') }}" method="POST">
                @csrf

                <!-- Role Selection -->
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select" required>
                        <option value="" disabled selected>Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Menu and Submenu Selection -->
                <div class="mb-3">
                    <label class="form-label">Menu</label>
                    <select name="menu_id" class="form-select" required>
                        <option value="" disabled selected>Select Menu</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Submenu</label>
                    <select name="submenu_id" class="form-select" required>
                        <option value="" disabled selected>Select Submenu</option>
                        @foreach($menus as $menu)
                            @foreach($menu->submenus as $submenu)
                                <option value="{{ $submenu->id }}">{{ $submenu->nama_submenu }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('setting_submenus.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
