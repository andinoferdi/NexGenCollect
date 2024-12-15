@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        @if ($verifikasi && $verifikasi->status_verifikasi === 'rejected')
            <div class="alert alert-danger">
                Verifikasi akun Anda telah <strong>ditolak</strong>. Silakan hubungi admin untuk informasi lebih lanjut.
            </div>
        @else
            <div class="card card-custom shadow-lg" style="border-radius: 15px;">
                <div class="card-body p-10">
                    <form action="{{ route('userpage.verifikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-5">
                            <h3 class="mt-3">Verifikasi Akun Anda</h3>
                        </div>

                        <div class="form-group mb-5">
                            <label class="form-label text-dark">KTP (File JPG, PNG, PDF max 2MB)</label>
                            <input type="file" name="ktp_file" class="form-control form-control-solid" id="ktp_file"
                                required accept=".jpg,.jpeg,.png,.pdf">
                        </div>

                        <div class="form-group mb-5">
                            <label class="form-label text-dark">Portfolio (File JPG, PNG, PDF, MP4 max 4MB)</label>
                            <input type="file" name="portfolio_file" class="form-control form-control-solid"
                                id="portfolio_file" required accept=".jpg,.jpeg,.png,.pdf,.mp4">
                        </div>

                        <div class="form-group mb-5">
                            <label class="form-label text-dark">Deskripsi Diri</label>
                            <textarea name="deskripsi" class="form-control form-control-solid" rows="5" required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group mb-5">
                            <label class="form-label text-dark">Informasi Akun Sosial Media</label>
                            <textarea name="sosial_media_info" class="form-control form-control-solid" rows="3" required>{{ old('sosial_media_info') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary w-50">Kirim Verifikasi</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if ($verifikasi)
            <div class="card card-custom shadow-lg mt-5" style="border-radius: 15px;">
                <div class="card-body">
                    <h4 class="text-center mb-4">Status Verifikasi Akun Anda</h4>
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 mb-0">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-150px">Nama</th>
                                    <th class="min-w-150px">Email</th>
                                    <th class="min-w-150px">Status Verifikasi</th>
                                    <th class="min-w-150px">Tanggal Verifikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ auth()->user()->email }}</td>
                                    <td>
                                        @if ($verifikasi->status_verifikasi === 'pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif ($verifikasi->status_verifikasi === 'verified')
                                            <span class="text-success">Verified</span>
                                        @elseif ($verifikasi->status_verifikasi === 'rejected')
                                            <span class="text-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $verifikasi->updated_at ? $verifikasi->updated_at->format('d M Y') : 'N/A' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info mt-5 mb-0">
                Anda belum mengajukan permohonan verifikasi. Silakan isi form di atas untuk mengajukan verifikasi.
            </div>
        @endif
    </div>
@endsection

@section('script')
@endsection
