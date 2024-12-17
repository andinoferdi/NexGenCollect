@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h1 class="mb-5">Balasan Admin</h1>

            <form action="{{ route('komentar.update', $komentar->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Komentar User -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Komentar User</label>
                    <div class="form-control bg-light" readonly>
                        {{ $komentar->komentar }}
                    </div>
                </div>

                <!-- Balasan Admin -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Balasan Admin</label>
                    <textarea name="balasan_admin" class="form-control" rows="5" placeholder="Masukkan balasan admin..." required>{{ old('balasan_admin', $komentar->balasan_admin) }}</textarea>
                    @error('balasan_admin')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Rating</label>
                    <div class="form-control bg-light" readonly>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $komentar->rating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star text-secondary"></i>
                            @endif
                        @endfor
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
