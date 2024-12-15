@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Auction Management</span>
                        <span class="text-muted mt-1 fw-bold fs-7">List of all auctions</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('lelang.create') }}" class="btn btn-sm btn-light btn-active-primary">
                            <i class="fas fa-plus text-primary"></i> New Auction
                        </a>
                    </div>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-150px">NFT Name</th>
                                    <th class="min-w-150px">Start Date</th>
                                    <th class="min-w-150px">End Date</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Pemenang</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lelangs as $lelang)
                                    <tr>
                                        <td>{{ $lelang->nft->nama_nft }}</td>
                                        <td>{{ $lelang->tanggal_awal }}</td>
                                        <td>{{ $lelang->tanggal_akhir }}</td>
                                        <td>{{ ucfirst($lelang->status) }}</td>
                                        <td>
                                            {{ $lelang->status === 'closed' ? $lelang->pemenang->user->name : '-' }}
                                        </td>
                                        <td class="text-end">
                                            @if ($lelang->status === 'closed')
                                                <span class="text-muted">No Actions Available</span>
                                            @elseif (now() > $lelang->tanggal_awal)
                                                <form action="{{ route('lelang.stop', $lelang->id) }}" method="POST"
                                                    class="stop-form" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="btn btn-danger btn-sm stop-button">
                                                        Stop & Set Pemenang
                                                    </button>
                                                </form>
                                            @else
                                                <a href="{{ route('lelang.edit', $lelang->id) }}"
                                                    class="btn btn-icon btn-light btn-sm me-1 text-primary">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('lelang.destroy', $lelang->id) }}" method="POST"
                                                    class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-icon btn-light btn-sm text-danger delete-button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Delete
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = button.closest('.delete-form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Tombol Stop
            const stopButtons = document.querySelectorAll('.stop-button');
            stopButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = button.closest('.stop-form');

                    Swal.fire({
                        title: 'Apakah Anda yakin ingin menghentikan lelang?',
                        text: "Lelang akan dihentikan dan statusnya menjadi 'closed'.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hentikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
