@extends('admin.layouts.master')

@section('title', 'Dashboard | UpSkill Academia')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome, {{ auth()->user()->name }}</h3>
            <p>Email: {{ auth()->user()->email }}</p>

            @if(auth()->user()->card)
            <div class="mt-4 shadow-sm card">
                <div class="text-white card-header bg-primary">
                    Your Card Details
                </div>
                <div class="card-body">
                    <p><strong>Card ID:</strong> {{ auth()->user()->card->card_id }}</p>
                    <p><strong>Status:</strong> {{ ucfirst(auth()->user()->card->status) }}</p>
                    <p><strong>QR Code:</strong></p>
                    <img src="{{ asset(auth()->user()->card->qrcode) }}" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    <br><br>
                    <a href="{{ url('/view/' . auth()->user()->card->card_id) }}" target="_blank" class="btn btn-success">View Public Profile</a>
                </div>
            </div>
            @else
            <div class="mt-4 alert alert-warning">
                You don’t have a card assigned yet.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
