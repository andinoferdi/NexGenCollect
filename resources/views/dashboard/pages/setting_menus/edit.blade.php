@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Edit Setting Menu</h3>

            <form action="{{ route('setting_menus.update', $id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Role Selection -->
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $id ? 'selected' : '' }}>{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Menu Selection -->
                <div class="mb-3">
                    <label class="form-label">Menu</label>
                    <div>
                        @foreach($menus as $menu)
                            <div>
                                <!-- Checkbox for menu -->
                                <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}"
                                    {{ isset($selectedSettings[$menu->id]) ? 'checked' : '' }}>
                                <label>{{ $menu->nama_menu }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('setting_menus.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
