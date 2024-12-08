 @extends('userpage.layouts.main')
 @section('content')
     <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
         <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
             <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Build An Outstanding Solutions
                 <br />with
                 <span
                     style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                     <span id="kt_landing_hero_text">The Best Theme Ever</span>
                 </span>
             </h1>
             <a href="../../demo7/dist/index.html" class="btn btn-primary">Try Metronic</a>
         </div>
         <div class="d-flex flex-center flex-wrap position-relative px-5">
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
                 <img src="{{ asset('assets/media/svg/brand-logos/fujifilm.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
                 <img src="{{ asset('assets/media/svg/brand-logos/vodafone.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
                 <img src="{{ asset('assets/media/svg/brand-logos/kpmg.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
                 <img src="{{ asset('assets/media/svg/brand-logos/nasa.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
                 <img src="{{ asset('assets/media/svg/brand-logos/aspnetzero.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
                 <img src="{{ asset('assets/media/svg/brand-logos/aon.svg') }}" class="mh-30px mh-lg-40px" alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
                 <img src="{{ asset('assets/media/svg/brand-logos/hp-3.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
             <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
                 <img src="{{ asset('assets/media/svg/brand-logos/truman.svg') }}" class="mh-30px mh-lg-40px"
                     alt="" />
             </div>
         </div>
     </div>
     </div>



     <div class="mb-n10 mb-lg-n20 z-index-2 mt-10">
         <div class="container">
             <div class="text-center mb-17">
                 <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                     How it Works
                 </h3>
                 <div class="fs-5 text-muted fw-bold">
                     Save thousands to millions of bucks by using single tool
                     <br />for different amazing and great useful admin
                 </div>
             </div>
             <div class="row w-100 gy-10 mb-md-20">
                 <div class="col-md-4 px-5">
                     <div class="text-center mb-10 mb-md-0">
                         <img src="{{ asset('assets/media/illustrations/sigma-1/2.png') }}" class="mh-125px mb-9"
                             alt="" />
                         <div class="d-flex flex-center mb-5">
                             <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
                             <div class="fs-5 fs-lg-3 fw-bolder text-dark">Jane Miller</div>
                         </div>
                         <div class="fw-bold fs-6 fs-lg-4 text-muted">
                             Save thousands to millions of bucks
                             <br />by using single tool for different
                             <br />amazing and great
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 px-5">
                     <div class="text-center mb-10 mb-md-0">
                         <img src="{{ asset('assets/media/illustrations/sigma-1/8.png') }}" class="mh-125px mb-9"
                             alt="" />
                         <div class="d-flex flex-center mb-5">
                             <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
                             <div class="fs-5 fs-lg-3 fw-bolder text-dark">Setup Your App</div>
                         </div>
                         <div class="fw-bold fs-6 fs-lg-4 text-muted">
                             Save thousands to millions of bucks
                             <br />by using single tool for different
                             <br />amazing and great
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 px-5">
                     <div class="text-center mb-10 mb-md-0">
                         <img src="{{ asset('assets/media/illustrations/sigma-1/12.png') }}" class="mh-125px mb-9"
                             alt="" />
                         <div class="d-flex flex-center mb-5">
                             <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
                             <div class="fs-5 fs-lg-3 fw-bolder text-dark">Enjoy Nautica App</div>
                         </div>
                         <div class="fw-bold fs-6 fs-lg-4 text-muted">
                             Save thousands to millions of bucks
                             <br />by using single tool for different
                             <br />amazing and great
                         </div>
                     </div>
                 </div>
             </div>
             <div class="tns tns-default">
                 <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                     data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                     data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                     data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                     <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                         <img src="{{ asset('assets/media/product-demos/demo1.png') }}"
                             class="card-rounded shadow mw-100" alt="" />
                     </div>
                     <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                         <img src="{{ asset('assets/media/product-demos/demo2.png') }}"
                             class="card-rounded shadow mw-100" alt="" />
                     </div>
                     <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                         <img src="{{ asset('assets/media/product-demos/demo4.png') }}"
                             class="card-rounded shadow mw-100" alt="" />
                     </div>
                     <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                         <img src="{{ asset('assets/media/product-demos/demo5.png') }}"
                             class="card-rounded shadow mw-100" alt="" />
                     </div>
                 </div>
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                     <i class="fas fa-chevron-left fa-2x"></i>
                 </button>
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                     <i class="fas fa-chevron-right fa-2x"></i>
                 </button>
             </div>
         </div>
     </div>



     <div class="pb-15 pt-18 landing-dark-bg mt-10">
         <div class="container">
             <div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                 <h3 class="fs-2hx text-white fw-bolder mb-5">We Make Things Better</h3>
                 <div class="fs-5 text-gray-700 fw-bold">Save thousands to millions of bucks by using single tool for
                     different amazing and great useful admin</div>
             </div>
             <div class="d-flex flex-center">
                 <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                     <!-- Item 1 -->
                     <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                         style="background-image: url('{{ asset('assets/media/svg/misc/octagon.svg') }}')">
                         <span class="fa-stack fa-2x mb-3">
                             <i class="fas fa-circle fa-stack-2x text-light"></i>
                             <i class="fas fa-th-large fa-stack-1x text-dark"></i>
                         </span>
                         <div class="mb-0">
                             <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                 <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700"
                                     data-kt-countup-suffix="+">0</div>
                             </div>
                             <span class="text-gray-600 fw-bold fs-5 lh-0">Known Companies</span>
                         </div>
                     </div>

                     <!-- Item 2 -->
                     <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                         style="background-image: url('{{ asset('assets/media/svg/misc/octagon.svg') }}')">
                         <span class="fa-stack fa-2x mb-3">
                             <i class="fas fa-circle fa-stack-2x text-light"></i>
                             <i class="fas fa-chart-pie fa-stack-1x text-dark"></i>
                         </span>
                         <div class="mb-0">
                             <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                 <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80"
                                     data-kt-countup-suffix="K+">0</div>
                             </div>
                             <span class="text-gray-600 fw-bold fs-5 lh-0">Statistic Reports</span>
                         </div>
                     </div>

                     <!-- Item 3 -->
                     <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                         style="background-image: url('{{ asset('assets/media/svg/misc/octagon.svg') }}')">
                         <span class="fa-stack fa-2x mb-3">
                             <i class="fas fa-circle fa-stack-2x text-light"></i>
                             <i class="fas fa-smile fa-stack-1x text-dark"></i>
                         </span>
                         <div class="mb-0">
                             <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                 <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="96"
                                     data-kt-countup-suffix="%">0</div>
                             </div>
                             <span class="text-gray-600 fw-bold fs-5 lh-0">Positive Feedback</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="py-10 py-lg-20">
         <div class="container">
             <div class="text-center mb-12">
                 <h3 class="fs-2hx text-dark mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                     Our Great Team
                 </h3>
                 <div class="fs-5 text-muted fw-bold">
                     It’s no doubt that when a development takes longer to complete, additional costs to
                     <br />integrate and test each extra feature creeps up and haunts most of us.
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
                             <!-- Foto Tim -->
                             <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center"
                                 style="background-image:url('{{ $team->foto_tim ? asset('storage/' . $team->foto_tim) : asset('assets/media/avatars/blank.png') }}')">
                             </div>
                             <!-- Nama dan Posisi -->
                             <div class="mb-0">
                                 <a href="#"
                                     class="text-dark fw-bolder text-hover-primary fs-3">{{ $team->nama_tim }}</a>
                                 <div class="text-muted fs-6 fw-bold mt-1">{{ $team->deskripsi_tim }}</div>
                             </div>
                         </div>
                     @endforeach

                 </div>
                 <!-- Navigasi -->
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                     <i class="fas fa-chevron-left fa-2x"></i>
                 </button>
                 <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                     <i class="fas fa-chevron-right fa-2x"></i>
                 </button>
             </div>
         </div>
     </div>


     <div class="mb-lg-n15 position-relative z-index-2">
         <div class="container">
             <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                 <div class="card-body p-lg-20">
                     <div class="text-center mb-5 mb-lg-10">
                         <h3 class="fs-2hx text-dark mb-5" id="portfolio"
                             data-kt-scroll-offset="{default: 100, lg: 150}">Our Projects</h3>
                     </div>
                     <div class="d-flex flex-center mb-5 mb-lg-15">
                         <ul class="nav border-transparent flex-center fs-5 fw-bold">
                             <li class="nav-item">
                                 <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#"
                                     data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Latest</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                     data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Web Design</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                     data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps">Mobile
                                     Apps</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                     data-bs-toggle="tab"
                                     data-bs-target="#kt_landing_projects_development">Development</a>
                             </li>
                         </ul>
                     </div>
                     <div class="tab-content">
                         <div class="tab-pane fade show active" id="kt_landing_projects_latest">
                             <div class="row g-10">
                                 <div class="col-lg-6">
                                     <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-23.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-23.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="row g-10 mb-10">
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-22.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-22.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-21.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-21.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                     </div>
                                     <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x400/img-20.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-20.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="kt_landing_projects_web_design">
                             <div class="row g-10">
                                 <div class="col-lg-6">
                                     <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-11.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-11.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="row g-10 mb-10">
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-12.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-12.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-21.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-21.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                     </div>
                                     <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x400/img-20.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-20.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
                             <div class="row g-10">
                                 <div class="col-lg-6">
                                     <div class="row g-10 mb-10">
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-16.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-16.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-12.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-12.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                     </div>
                                     <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-13.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-13.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                                 <div class="col-lg-6">
                                     <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-14.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-14.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="kt_landing_projects_development">
                             <div class="row g-10">
                                 <div class="col-lg-6">
                                     <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-1.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-1.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="row g-10 mb-10">
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-2.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-2.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="col-lg-6">
                                             <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                                 href="{{ asset('assets/media/stock/600x600/img-3.jpg') }}">
                                                 <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                     style="background-image:url('{{ asset('assets/media/stock/600x600/img-3.jpg') }}')">
                                                 </div>
                                                 <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                     <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                 </div>
                                             </a>
                                         </div>
                                     </div>
                                     <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                         href="{{ asset('assets/media/stock/600x600/img-4.jpg') }}">
                                         <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                             style="background-image:url('{{ asset('assets/media/stock/600x600/img-4.jpg') }}')">
                                         </div>
                                         <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                             <i class="bi bi-eye-fill fs-3x text-white"></i>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="mt-sm-n20">

         <div class="py-20 landing-dark-bg">
             <div class="container">
                 <div class="d-flex flex-column container pt-lg-20">
                     <div class="mb-13 text-center">
                         <h1 class="fs-2hx fw-bolder text-white mb-5" id="pricing"
                             data-kt-scroll-offset="{default: 100, lg: 150}">Clear Pricing Makes it Easy</h1>
                         <div class="text-gray-600 fw-bold fs-5">Save thousands to millions of bucks by using single
                             tool for different
                             <br />amazing and outstanding cool and great useful admin
                         </div>
                     </div>
                     <div class="text-center" id="kt_pricing">
                         <div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true"
                             style="border: 1px dashed #2B4666;">
                             <a href="#"
                                 class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active"
                                 data-kt-plan="month">Monthly</a>
                             <a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3"
                                 data-kt-plan="annual">Annual</a>
                         </div>
                         <div class="row g-10">
                             <div class="col-xl-4">
                                 <div class="d-flex h-100 align-items-center">
                                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                         <div class="mb-7 text-center">
                                             <h1 class="text-dark mb-5 fw-boldest">Startup</h1>
                                             <div class="text-gray-400 fw-bold mb-5">Best Settings for Startups
                                             </div>
                                             <div class="text-center">
                                                 <span class="mb-2 text-primary">$</span>
                                                 <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="99"
                                                     data-kt-plan-price-annual="999">99</span>
                                                 <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon"
                                                     data-kt-plan-price-annual="Ann">/ Mon</span>
                                             </div>
                                         </div>
                                         <div class="w-100 mb-10">
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10
                                                     Active Users</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30
                                                     Project Integrations</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800">Keen Analytics
                                                     Platform</span>
                                                 <span class="svg-icon svg-icon-1">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <rect x="7" y="15.3137" width="12" height="2"
                                                             rx="1" transform="rotate(-45 7 15.3137)"
                                                             fill="black" />
                                                         <rect x="8.41422" y="7" width="12" height="2"
                                                             rx="1" transform="rotate(45 8.41422 7)"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800">Targets Timelines &amp;
                                                     Files</span>
                                                 <span class="svg-icon svg-icon-1">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <rect x="7" y="15.3137" width="12" height="2"
                                                             rx="1" transform="rotate(-45 7 15.3137)"
                                                             fill="black" />
                                                         <rect x="8.41422" y="7" width="12" height="2"
                                                             rx="1" transform="rotate(45 8.41422 7)"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack">
                                                 <span class="fw-bold fs-6 text-gray-800">Unlimited Projects</span>
                                                 <span class="svg-icon svg-icon-1">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <rect x="7" y="15.3137" width="12" height="2"
                                                             rx="1" transform="rotate(-45 7 15.3137)"
                                                             fill="black" />
                                                         <rect x="8.41422" y="7" width="12" height="2"
                                                             rx="1" transform="rotate(45 8.41422 7)"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                         </div>
                                         <a href="#" class="btn btn-primary">Select</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4">
                                 <div class="d-flex h-100 align-items-center">
                                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                         <div class="mb-7 text-center">
                                             <h1 class="text-white mb-5 fw-boldest">Business</h1>
                                             <div class="text-white opacity-75 fw-bold mb-5">Best Settings for
                                                 Business</div>
                                             <div class="text-center">
                                                 <span class="mb-2 text-white">$</span>
                                                 <span class="fs-3x fw-bolder text-white" data-kt-plan-price-month="199"
                                                     data-kt-plan-price-annual="1999">199</span>
                                                 <span class="fs-7 fw-bold text-white opacity-75"
                                                     data-kt-plan-price-month="Mon" data-kt-plan-price-annual="Ann">/
                                                     Mon</span>
                                             </div>
                                         </div>
                                         <div class="w-100 mb-10">
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up
                                                     to 10 Active Users</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-white">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Up
                                                     to 30 Project Integrations</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-white">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Keen
                                                     Analytics Platform</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-white">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-white opacity-75 text-start pe-3">Targets
                                                     Timelines &amp; Files</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-white">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack">
                                                 <span class="fw-bold fs-6 text-white opacity-75">Unlimited
                                                     Projects</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-white">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <rect x="7" y="15.3137" width="12" height="2"
                                                             rx="1" transform="rotate(-45 7 15.3137)"
                                                             fill="black" />
                                                         <rect x="8.41422" y="7" width="12" height="2"
                                                             rx="1" transform="rotate(45 8.41422 7)"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                         </div>
                                         <a href="#"
                                             class="btn btn-color-primary btn-active-light-primary btn-light">Select</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-xl-4">
                                 <div class="d-flex h-100 align-items-center">
                                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                         <div class="mb-7 text-center">
                                             <h1 class="text-dark mb-5 fw-boldest">Enterprise</h1>
                                             <div class="text-gray-400 fw-bold mb-5">Best Settings for Enterprise
                                             </div>
                                             <div class="text-center">
                                                 <span class="mb-2 text-primary">$</span>
                                                 <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="999"
                                                     data-kt-plan-price-annual="9999">999</span>
                                                 <span class="fs-7 fw-bold opacity-50" data-kt-plan-price-month="Mon"
                                                     data-kt-plan-price-annual="Ann">/ Mon</span>
                                             </div>
                                         </div>
                                         <div class="w-100 mb-10">
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 10
                                                     Active Users</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Up to 30
                                                     Project Integrations</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Keen
                                                     Analytics Platform</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack mb-5">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Targets
                                                     Timelines &amp; Files</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                             <div class="d-flex flex-stack">
                                                 <span class="fw-bold fs-6 text-gray-800 text-start pe-3">Unlimited
                                                     Projects</span>
                                                 <span class="svg-icon svg-icon-1 svg-icon-success">
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24" viewBox="0 0 24 24" fill="none">
                                                         <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                             rx="10" fill="black" />
                                                         <path
                                                             d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                             fill="black" />
                                                     </svg>
                                                 </span>
                                             </div>
                                         </div>
                                         <a href="#" class="btn btn-primary">Select</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>


         <div class="mt-20 mb-20 position-relative z-index-2">
             <div class="container">
                 <div class="text-center mb-17">
                     <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">
                         What Our Clients Say</h3>
                     <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                         <br />for different amazing and great useful admin
                     </div>
                 </div>
                 <div class="row g-lg-10 mb-10 mb-lg-20">
                     <div class="col-lg-4">
                         <div
                             class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                             <div class="mb-7">
                                 <div class="rating mb-6">
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                 </div>
                                 <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                     <br />and the most well structured
                                 </div>
                                 <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have
                                     ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                     cleanest and the most up to standard I have ever seen.</div>
                             </div>
                             <div class="d-flex align-items-center">
                                 <div class="symbol symbol-circle symbol-50px me-5">
                                     <img src="assets/media/avatars/150-2.jpg" class="" alt="" />
                                 </div>
                                 <div class="flex-grow-1">
                                     <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Paul
                                         Miles</a>
                                     <span class="text-muted d-block fw-bold">Development Lead</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div
                             class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                             <div class="mb-7">
                                 <div class="rating mb-6">
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                 </div>
                                 <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                     <br />and the most well structured
                                 </div>
                                 <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have
                                     ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                     cleanest and the most up to standard I have ever seen.</div>
                             </div>
                             <div class="d-flex align-items-center">
                                 <div class="symbol symbol-circle symbol-50px me-5">
                                     <img src="assets/media/avatars/150-3.jpg" class="" alt="" />
                                 </div>
                                 <div class="flex-grow-1">
                                     <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Janya
                                         Clebert</a>
                                     <span class="text-muted d-block fw-bold">Development Lead</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4">
                         <div
                             class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                             <div class="mb-7">
                                 <div class="rating mb-6">
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                     <div class="rating-label me-2 checked">
                                         <i class="bi bi-star-fill fs-5"></i>
                                     </div>
                                 </div>
                                 <div class="fs-2 fw-bolder text-dark mb-3">This is by far the cleanest template
                                     <br />and the most well structured
                                 </div>
                                 <div class="text-gray-500 fw-bold fs-4">The most well thought out design theme I have
                                     ever used. The codes are up to tandard. The css styles are very clean. In fact the
                                     cleanest and the most up to standard I have ever seen.</div>
                             </div>
                             <div class="d-flex align-items-center">
                                 <div class="symbol symbol-circle symbol-50px me-5">
                                     <img src="assets/media/avatars/150-18.jpg" class="" alt="" />
                                 </div>
                                 <div class="flex-grow-1">
                                     <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Steave
                                         Brown</a>
                                     <span class="text-muted d-block fw-bold">Development Lead</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     @endsection
