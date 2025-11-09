@extends('admin.layouts.master')

@section('title', 'View Card')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="p-3 card">
            <div class="justify-between card-header d-flex">
                <h4>Card Details</h4>
                <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <strong>Card ID:</strong> {{ $card->card_id }}
                </div>

                <div class="mb-3">
                    <strong>QR Code:</strong><br>
                    <a href="{{ asset($card->qrcode) }}" target="_blank">
                        <img src="{{ asset($card->qrcode) }}" width="150" class="img-thumbnail" alt="QR Code">
                    </a>
                </div>

                <div class="mb-3">
                    <strong>QR URL:</strong>
                    <code class="copy-url" data-url="{{ url($card->card_id) }}" style="cursor:pointer;">
                        {{ url($card->card_id) }}
                    </code>
                </div>

                <div class="mb-3">
                    <strong>Status:</strong>
                    <span class="badge {{ $card->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($card->status) }}
                    </span>
                </div>

                <div class="mb-3">
                    <strong>Created At:</strong> {{ $card->created_at->format('d M, Y h:i A') }}
                </div>

                <hr>

                <h5>User Information</h5>
                @if ($card->user)
                    <p><strong>Name:</strong> {{ $card->user->name }}</p>
                    <p><strong>Email:</strong> {{ $card->user->email ?? 'N/A' }}</p>
                    <p><strong>Mobile:</strong> {{ $card->user->mobile ?? 'N/A' }}</p>
                    <p><strong>Country:</strong> {{ $card->user->country_name ?? 'N/A' }}</p>
                    <p><strong>IP Address:</strong> {{ $card->user->registration_ip ?? 'N/A' }}</p>
                @else
                    <p class="text-muted">No user registered yet.</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('admin.cards.edit', $card->id) }}" class="btn btn-primary">
                        <i class="ri-edit-line"></i> Edit Card
                    </a>
                    <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.copy-url').forEach(function(element) {
        element.addEventListener('click', function() {
            let text = this.getAttribute('data-url');
            navigator.clipboard.writeText(text);
            alert('URL copied to clipboard!');
        });
    });
});
</script>
@endpush
@endsection
