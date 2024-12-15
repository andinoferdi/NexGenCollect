@extends('dashboard.layouts.main')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <h3 class="mb-5">Edit Auction</h3>

            <form action="{{ route('lelang.update', $lelang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NFT</label>
                    <select name="nft_id" class="form-control" required>
                        <option value="">-- Select NFT --</option>
                        @foreach ($nfts as $nft)
                            @if ($nft->user_id == auth()->id() || auth()->id() == 1)
                                <option value="{{ $nft->id }}" {{ $lelang->nft_id == $nft->id ? 'selected' : '' }}>
                                    {{ $nft->nama_nft }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="text" id="tanggal_awal" name="tanggal_awal" class="form-control"
                        value="{{ $lelang->tanggal_awal }}" placeholder="Select Start Date" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="text" id="tanggal_akhir" name="tanggal_akhir" class="form-control"
                        value="{{ $lelang->tanggal_akhir }}" placeholder="Select End Date" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="open" {{ $lelang->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ $lelang->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('lelang.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const today = new Date().toISOString().split('T')[0];

            $('#tanggal_awal').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                minDate: today
            });

            $('#tanggal_akhir').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                minDate: today
            });
        });
    </script>
@endsection
