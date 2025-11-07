@extends('admin.layouts.master')

@section('title', 'View Card')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="p-3 card">
            <div class="card-header">
                <h4>Card Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Card ID:</strong> {{ $card->card_id }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong>
                    <span class="badge {{ $card->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($card->status) }}
                    </span>
                </div>
                <div class="mb-3">
                    <strong>QR Code:</strong><br>
                    <a href="{{ asset($card->qrcode) }}" target="_blank">
                        <img src="{{ asset($card->qrcode) }}" width="150" alt="QR Code">
                    </a>
                </div>
                <div class="mb-3">
                    <strong>QR Points To:</strong>
                    <code>{{ url('/view/'.$card->card_id) }}</code>
                </div>

                <a href="{{ route('admin.cards.edit', $card->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
