@extends('userpage.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3 class="fs-2hx text-light mb-5">NFT Koleksi Saya</h3>
            <div class="btn-group" role="group" aria-label="NFT Categories">
                <button class="btn btn-light filter-button" data-filter="all">All</button>
                @foreach ($kategoris as $kategori)
                    <button class="btn btn-outline-light filter-button" data-filter="{{ $kategori->id }}">
                        {{ $kategori->nama_kategori }}
                    </button>
                @endforeach
            </div>
        </div>

        @if ($nfts->isEmpty())
            <div class="text-center my-5">
                <h5 class="text-muted">Anda belum memiliki NFT.</h5>
            </div>
        @else
            <div class="row" id="nft-collection">
                @foreach ($nfts as $key => $nft)
                    <div class="col-md-4 nft-item {{ $key > 2 ? 'd-none' : '' }}" data-category="{{ $nft->kategori_id }}">
                        <div class="card shadow-sm mb-4">
                            <img src="{{ asset('storage/' . $nft->foto) }}" class="card-img-top" alt="{{ $nft->nama_nft }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $nft->nama_nft }}</h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit($nft->deskripsi, 100) }}
                                </p>
                                <a href="{{ route('userpage.nft_user_detail', $nft->id) }}" class="btn btn-primary">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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

                    buttons.forEach((btn) => {
                        btn.classList.remove("btn-light");
                        btn.classList.add("btn-outline-light");
                    });

                    this.classList.remove("btn-outline-light");
                    this.classList.add("btn-light");

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
