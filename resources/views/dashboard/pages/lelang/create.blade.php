@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Create New Auction</h3>

            <form action="{{ route('lelang.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NFT</label>
                    <select name="nft_id" class="form-control" required>
                        <option value="">-- Select NFT --</option>
                        @foreach ($nfts as $nft)
                            @if (($nft->user_id == auth()->id() || auth()->id() == 1) && $nft->status === 'available')
                                <option value="{{ $nft->id }}">{{ $nft->nama_nft }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="text" id="tanggal_awal" name="tanggal_awal" class="form-control"
                        placeholder="Select Start Date" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="text" id="tanggal_akhir" name="tanggal_akhir" class="form-control"
                        placeholder="Select End Date" required>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('lelang.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const today = new Date().toISOString().split('T')[0]; // Tanggal hari ini (YYYY-MM-DD)

            $('#tanggal_awal').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                minDate: today // Tanggal awal tidak boleh kurang dari hari ini
            });

            $('#tanggal_akhir').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                minDate: today // Tanggal akhir tidak boleh kurang dari hari ini
            });
        });
    </script>
@endsection
