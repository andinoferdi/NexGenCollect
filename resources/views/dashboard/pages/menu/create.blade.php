@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Menu</h3>

            <form action="{{ route('menu.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Menu Name</label>
                    <input type="text" name="nama_menu" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Optional)</label>
                    <input type="text" name="icon_menu" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
