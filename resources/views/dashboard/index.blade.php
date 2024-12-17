@extends('dashboard.layouts.main')
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="container-xxl" id="kt_content_container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold fs-7">Jumlah NFT</span>
                                    <span class="text-dark fw-bolder fs-2">{{ $nftsCount }}</span>
                                </div>
                                <div class="symbol symbol-50px symbol-light-primary">
                                    <i class="bi bi-images fs-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold fs-7">NFT Terjual</span>
                                    <span class="text-dark fw-bolder fs-2">{{ $nftsSold }}</span>
                                </div>
                                <div class="symbol symbol-50px symbol-light-success">
                                    <i class="bi bi-check-circle fs-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold fs-7">NFT Tersedia</span>
                                    <span class="text-dark fw-bolder fs-2">{{ $nftsAvailable }}</span>
                                </div>
                                <div class="symbol symbol-50px symbol-light-info">
                                    <i class="bi bi-box fs-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column">
                                    <span class="text-muted fw-bold fs-7">Jumlah Kategori</span>
                                    <span class="text-dark fw-bolder fs-2">{{ $categories }}</span>
                                </div>
                                <div class="symbol symbol-50px symbol-light-warning">
                                    <i class="bi bi-tags fs-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <h3 class="text-dark fw-bolder">Statistik Lelang</h3>
                            <canvas id="lelangChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <h3 class="text-dark fw-bolder">NFT Tersedia vs NFT Terjual</h3>
                            <canvas id="nftChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <h3 class="text-dark fw-bolder">Daftar Pengguna</h3>
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-100px">Foto</th>
                                            <th class="min-w-150px">Nama</th>
                                            <th class="min-w-150px">Email</th>
                                            <th class="min-w-100px">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                        alt="User Photo" width="50">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->nama_role ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <h3 class="text-dark fw-bolder">Daftar Pengguna dengan NFT</h3>
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-100px">Foto</th>
                                            <th class="min-w-150px">Nama</th>
                                            <th class="min-w-150px">Email</th>
                                            <th class="min-w-100px">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersWithNFTsData as $user)
                                            <tr>
                                                <td>
                                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                        alt="User Photo" width="50">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->nama_role ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-body">
                            <h3 class="text-dark fw-bolder">Komentar Terbaru</h3>
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-100px">Foto</th>
                                            <th class="min-w-150px">Nama Pengguna</th>
                                            <th class="min-w-150px">Komentar</th>
                                            <th class="min-w-100px">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestComments as $comment)
                                            <tr>
                                                <td>
                                                    <img src="{{ $comment->user->foto ? asset('storage/' . $comment->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                        alt="User Photo" width="50">
                                                </td>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->komentar }}</td>
                                                <td>{{ $comment->created_at->format('d M Y, H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var lelangChart = new Chart(document.getElementById('lelangChart'), {
            type: 'pie',
            data: {
                labels: ['Lelang Terbuka', 'Lelang Tertutup'],
                datasets: [{
                    label: 'Lelang',
                    data: [{{ $openLelang }}, {{ $closedLelang }}],
                    backgroundColor: ['#28a745', '#dc3545'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });

        var nftChart = new Chart(document.getElementById('nftChart'), {
            type: 'bar',
            data: {
                labels: ['Terjual', 'Tersedia'],
                datasets: [{
                    label: 'NFT',
                    data: [{{ $nftsSold }}, {{ $nftsAvailable }}],
                    backgroundColor: ['#007bff', '#ffc107'],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    },
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>
@endsection
