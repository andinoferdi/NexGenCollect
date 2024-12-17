 @extends('userpage.layouts.main')
 @section('content')
     <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
         <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
             <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">
                 Bangun Solusi Luar Biasa <br />
                 dengan Mendorong Kreativitas Digital bersama
                 <span
                     style="background: linear-gradient(to right, #ff0000 0%, #ffffff 100%);
                    -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                     <span id="kt_landing_hero_text">NextGenCollect</span>
                 </span>
             </h1>

         </div>
     </div>
     </div>

     <div class="container my-5">
         <div class="text-center mb-4">
             <h3 class="fs-2hx text-dark mb-5">Koleksi NFT Kami</h3>
             <div class="btn-group" role="group" aria-label="NFT Categories">
                 <button class="btn btn-dark filter-button" data-filter="all">Semua</button>
                 @foreach ($kategoris as $kategori)
                     <button class="btn btn-outline-dark filter-button" data-filter="{{ $kategori->id }}">
                         {{ $kategori->nama_kategori }}
                     </button>
                 @endforeach
             </div>
         </div>

         @if ($nfts->isEmpty())
             <div class="text-center my-5">
                 <h5 class="text-muted">Belum ada NFT</h5>
             </div>
         @else
             <div class="row" id="nft-collection">
                 @foreach ($nfts as $key => $nft)
                     <div class="col-md-4 nft-item {{ $key > 2 ? 'd-none' : '' }}" data-category="{{ $nft->kategori_id }}">
                         <div class="card shadow-sm mb-4">
                             <img src="{{ asset('storage/' . $nft->foto) }}" class="card-img-top"
                                 alt="{{ $nft->nama_nft }}">
                             <div class="card-body">
                                 <h5 class="card-title">{{ $nft->nama_nft }}</h5>
                                 <p class="card-text text-muted">
                                     {{ Str::limit($nft->deskripsi, 100) }}
                                 </p>
                                 <p class="card-text">
                                     <span class="text-success">Harga Awal:
                                         Rp{{ number_format($nft->harga_awal, 0, ',', '.') }}</span>
                                 </p>
                                 <a href="{{ route('userpage.nft.detail', $nft->id) }}" class="btn btn-primary">Lihat
                                     Detail</a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>

             <div class="text-center mt-4">
                 <a href="{{ route('userpage.nft') }}" class="btn btn-outline-primary" id="view-more">Lihat Semua</a>
             </div>
         @endif
     </div>

     <div class="pb-15 pt-18 landing-dark-bg mt-10">
         <div class="container">
             <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                 <h3 class="fs-2hx text-white fw-bolder mb-5">User Terpercaya Kami</h3>
                 <div class="fs-5 text-gray-700 fw-bold">Discover unique collections from our creators.</div>
             </div>

             <div class="row">
                 @if ($users->isEmpty())
                     <div class="text-center my-5">
                         <h5 class="text-muted">Belum ada User yang mengupload NFT</h5>
                     </div>
                 @else
                     @foreach ($users as $user)
                         <div class="col-md-4 mb-4">
                             <div class="card m-3">
                                 <div class="card-body">
                                     <div class="mb-3 text-center">
                                         <a href="{{ route('userpage.user_nfts', $user->id) }}">
                                             <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                 alt="{{ $user->name }}" class="rounded-circle w-100px h-100px mb-3">
                                         </a>
                                         <h5 class="fw-bold">{{ $user->name }}</h5>
                                         <p class="text-gray-500 mb-4">{{ $user->email }}</p>
                                     </div>
                                     @php
                                         $nft = $user->nfts->first();
                                     @endphp
                                     @if ($nft)
                                         <div class="card mb-3">
                                             <img src="{{ asset('storage/' . $nft->foto) }}" class="card-img-top"
                                                 alt="{{ $nft->nama_nft }}">
                                             <div class="card-body bg-secondary text-start">
                                                 <h4 class="card-title fw-bold fs-3">{{ $nft->nama_nft }}</h4>
                                                 <span
                                                     class="badge bg-info fs-6">{{ $nft->kategori->nama_kategori }}</span>
                                                 <p class="mt-3 fs-5">
                                                     <strong>Harga Awal:</strong> Rp
                                                     {{ number_format($nft->harga_awal, 0, ',', '.') }}
                                                 </p>
                                                 <p class="text-success fs-5">
                                                     <strong>Status:</strong> {{ ucfirst($nft->status) }}
                                                 </p>
                                             </div>
                                         </div>
                                     @else
                                         <p class="text-muted text-center">No NFTs available for this user.</p>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @endif
             </div>
         </div>
     </div>

     <div class="py-10 py-lg-20">
         <div class="container">
             <div class="text-center mb-12">
                 <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                     Tim Kami
                 </h3>
                 <div class="fs-5 text-muted fw-bold">
                     Ini adalah Tim Pengembang NextGenCollect semua punya bidang dan keahlian masing masing
                 </div>
             </div>
             <div class="tns tns-default">
                 <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                     data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                     data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                     data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                     data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">

                     @foreach ($teams as $team)
                         <div class="text-center">
                             <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                 style="background-image:url('{{ $team->foto_tim ? asset('storage/' . $team->foto_tim) : asset('assets/media/avatars/blank.png') }}')">
                             </div>
                             <div class="mb-0">
                                 <a href="#"
                                     class="text-dark fw-bolder text-hover-primary fs-3">{{ $team->nama_tim }}</a>
                                 <div class="text-muted fs-6 fw-bold mt-1">{{ $team->deskripsi_tim }}</div>
                             </div>
                         </div>
                     @endforeach

                 </div>
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                     <i class="fas fa-chevron-left fa-2x"></i>
                 </button>
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                     <i class="fas fa-chevron-right fa-2x"></i>
                 </button>
             </div>
         </div>
     </div>

     <div class="mt-sm-n20">

         <div class="mt-20 mb-20 position-relative z-index-2">
             <div class="container">
                 <div class="text-center mb-17">
                     <h3 class="fs-2hx text-dark mb-5">Apa yang Client Kami Bilang</h3>
                     <div class="fs-5 text-muted fw-bold">
                         Ini adalah komentar para user kami
                         <br />
                     </div>
                 </div>

                 <div class="row g-lg-10 mb-10 mb-lg-20">
                     @if ($komentars->isEmpty())
                         <div class="col-12 text-center">
                             <p class="text-muted">Belum ada Komentar</p>
                         </div>
                     @else
                         @foreach ($komentars as $komentar)
                             <div class="col-lg-4">
                                 <div
                                     class="d-flex flex-column justify-content-between h-100 bg-dark text-white p-4 rounded shadow-lg">
                                     <div class="d-flex align-items-center mt-auto">
                                         <div class="symbol symbol-circle symbol-50px me-4">
                                             <img src="{{ $komentar->user->foto ? asset('storage/' . $komentar->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                 alt="user-avatar" class="img-fluid" />
                                         </div>
                                         <div>
                                             <span class="fw-bolder text-white d-block">{{ $komentar->user->name }}</span>
                                             <span
                                                 class="text-light d-block">{{ $komentar->user->role->nama_role }}</span>
                                         </div>
                                         @if ($komentar->user_id === Auth::id())
                                             <form action="{{ route('komentar.delete.user', $komentar->id) }}"
                                                 method="POST" class="ms-auto">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit"
                                                     class="btn btn-sm btn-danger d-flex align-items-center">
                                                     <i class="fas fa-trash me-1"></i> Hapus
                                                 </button>
                                             </form>
                                         @endif
                                     </div>

                                     <div class="mt-4">
                                         <div class="mb-2">
                                             @for ($i = 1; $i <= 5; $i++)
                                                 @if ($i <= $komentar->rating)
                                                     <i class="fas fa-star text-warning"></i>
                                                 @else
                                                     <i class="far fa-star text-secondary"></i>
                                                 @endif
                                             @endfor
                                         </div>
                                         <div class="fs-5 mb-2 text-light">
                                             <h2 class="text-light"> {{ $komentar->komentar }}</h2>
                                         </div>

                                         <hr>
                                         @if ($komentar->balasan_admin)
                                             <div class="fs-6 mt-3">
                                                 <h5>
                                                     <span class="text-danger">Balasan Admin:</span>
                                                     <span class="text-white">{{ $komentar->balasan_admin }}</span>
                                                 </h5>
                                             </div>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     @endif
                 </div>

                 <div class="mt-5">
                     <h4 class="text-center mb-4">Tambah Komentar</h4>
                     <form action="{{ route('komentar.store.user') }}" method="POST" class="w-50 mx-auto">
                         @csrf
                         <div class="form-group mb-3">
                             <label for="komentar" class="form-label text-dark fw-bold">Komentar Anda</label>
                             <textarea name="komentar" class="form-control" rows="4" placeholder="Tulis komentar..." required></textarea>
                         </div>
                         <div class="form-group mb-3">
                             <label for="rating" class="form-label text-dark fw-bold">Rating Anda</label>
                             <select name="rating" class="form-control" required>
                                 <option value="1">⭐</option>
                                 <option value="2">⭐⭐</option>
                                 <option value="3">⭐⭐⭐</option>
                                 <option value="4">⭐⭐⭐⭐</option>
                                 <option value="5">⭐⭐⭐⭐⭐</option>
                             </select>
                         </div>
                         <button type="submit" class="btn btn-primary w-100">Kirim Komentar</button>
                     </form>
                 </div>
             </div>
         </div>

     @endsection
     @section('script')
         <script>
             document.addEventListener("DOMContentLoaded", function() {
                 const buttons = document.querySelectorAll(".filter-button");
                 const items = document.querySelectorAll(".nft-item");
                 const viewMoreButton = document.getElementById("view-more");

                 let displayedCount = 3;

                 buttons.forEach((button) => {
                     button.addEventListener("click", function() {
                         const filter = this.getAttribute("data-filter");

                         buttons.forEach((btn) => btn.classList.remove("btn-dark"));
                         this.classList.add("btn-dark");

                         items.forEach((item) => {
                             item.classList.add("fade-out");
                             setTimeout(() => {
                                 if (filter === "all" || item.getAttribute(
                                         "data-category") === filter) {
                                     item.style.display = "block";
                                     item.classList.remove("d-none");
                                     setTimeout(() => item.classList.remove("fade-out"),
                                         200);
                                 } else {
                                     item.style.display = "none";
                                     item.classList.add("d-none");
                                 }
                             }, 200);
                         });

                         displayedCount = 3;
                         viewMoreButton.style.display = "inline-block";
                     });
                 });

                 viewMoreButton.addEventListener("click", function() {
                     let hiddenItems = Array.from(items).filter((item) => {
                         return item.style.display === "block" && item.classList.contains("d-none");
                     });

                     for (let i = 0; i < 3; i++) {
                         if (hiddenItems[i]) {
                             hiddenItems[i].classList.remove("d-none");
                         }
                     }

                     if (hiddenItems.length <= 3) {
                         viewMoreButton.style.display = "none";
                     }
                 });
             });
         </script>
     @endsection
