@extends('admin.layouts.master')

@section('title', 'Public Profile | UpSkill Academia')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="shadow-sm card">
                <div class="text-center text-white card-header bg-info">
                    Public Profile
                </div>
                <div class="text-center card-body">
                    <h4>{{ $user->name }}</h4>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @if($user->card)
                        <p><strong>Card ID:</strong> {{ $user->card->card_id }}</p>
                        <img src="{{ asset($user->card->qrcode) }}" alt="QR Code" class="my-3 img-fluid" style="max-width: 150px;">
                        <p><span class="badge bg-{{ $user->card->status == 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($user->card->status) }}
                        </span></p>
                    @endif
                    <a href="{{ url('/') }}" class="mt-3 btn btn-primary">Back to Home</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
