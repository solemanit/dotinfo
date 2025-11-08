@extends('admin.layouts.master')

@section('title', 'View User | DotInfo')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="flex-wrap page-title-box d-flex-between gap-15">
            <h1 class="page-title fs-18 lh-1">User Details</h1>

            <nav aria-label="breadcrumb">
                <ol class="mb-0 breadcrumb breadcrumb-example1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">{{ $user->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body pt-15">

                <h4 class="mb-3">{{ $user->name }}</h4>

                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
                <p><strong>Joined:</strong> {{ $user->created_at->format('d M, Y') }}</p>

                <hr>

                <h5 class="mb-3">Assigned Cards</h5>

                @if($user->cards && $user->cards->count() > 0)
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Card ID</th>
                                <th>Status</th>
                                <th>QR</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->cards as $card)
                                <tr>
                                    <td>{{ $card->card_id }}</td>
                                    <td>
                                        <span class="badge {{ $card->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($card->status) }}
                                        </span>
                                    </td>
                                    <td><img src="{{ asset($card->qrcode) }}" width="50"></td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $card->card_id) }}" class="btn btn-info-light btn-sm" target="_blank">
                                            View Card
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No card assigned.</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to List</a>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
