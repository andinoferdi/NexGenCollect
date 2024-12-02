@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">User Verification Requests</span>
                        <span class="text-muted mt-1 fw-bold fs-7">List of all user verification requests</span>
                    </h3>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-150px">Name</th>
                                    <th class="min-w-150px">Email</th>
                                    <th class="min-w-150px">Verification Status</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($verifications as $verifikasi)
                                    <tr>
                                        <td>{{ $verifikasi->user->name }}</td>
                                        <td>{{ $verifikasi->user->email }}</td>
                                        <td>{{ ucfirst($verifikasi->status_verifikasi) }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('verifikasi.show', $verifikasi->id) }}"
                                                class="btn btn-icon btn-light btn-sm me-1 text-info">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if ($verifikasi->status_verifikasi === 'pending')
                                                <form action="{{ route('verifikasi.verify', $verifikasi->id) }}"
                                                    method="POST" style="display:inline;"
                                                    id="verify-form-{{ $verifikasi->id }}">
                                                    @csrf
                                                    <button type="button"
                                                        class="btn btn-icon btn-light btn-sm text-success"
                                                        onclick="confirmAction('verify', {{ $verifikasi->id }})">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('verifikasi.reject', $verifikasi->id) }}"
                                                    method="POST" style="display:inline;"
                                                    id="reject-form-{{ $verifikasi->id }}">
                                                    @csrf
                                                    <button type="button" class="btn btn-icon btn-light btn-sm text-danger"
                                                        onclick="confirmAction('reject', {{ $verifikasi->id }})">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            @elseif($verifikasi->status_verifikasi === 'verified')
                                                <span class="text-success">Verified</span>
                                            @elseif($verifikasi->status_verifikasi === 'rejected')
                                                <span class="text-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmAction(action, id) {
            let message = '';
            let formId = '';

            if (action === 'verify') {
                message = 'Are you sure you want to verify this user?';
                formId = 'verify-form-' + id;
            } else if (action === 'reject') {
                message = 'Are you sure you want to reject this user?';
                formId = 'reject-form-' + id;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection
