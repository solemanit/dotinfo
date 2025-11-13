@extends('admin.layouts.master')

@section('title', 'Card Users | DotInfo')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="flex-wrap page-title-box d-flex-between gap-15">
                <h1 class="page-title fs-18 lh-1">Cards</h1>
                <nav aria-label="breadcrumb">
                    <ol class="mb-0 breadcrumb breadcrumb-example1">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Card Users</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="justify-between card-header d-flex align-items-center">
                    <h4 class="gap-10 d-flex-items">
                        Card User List
                        <span class="badge bg-label-warning">{{ $users->count() }}</span>
                    </h4>

                    <form action="{{ route('admin.cards.generate') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="ri-add-fill"></i> Generate 10 Cards
                        </button>
                    </form>
                </div>

                <div class="card-body pt-15">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="responsiveDataTable" class="table align-middle table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Card ID</th>
                                    <th>Status</th>
                                    <th>User Details</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td class="fw-bold">{{ $user->card_id }}</td>

                                        <td>
                                            <span class="badge rounded-pill {{ $user->status === 'active' ? 'bg-success' : ($user->status ? 'bg-secondary' : 'bg-dark') }}">{{ $user->status ? ucfirst($user->status) : 'N/A' }}</span>
                                        </td>


                                        <td>
                                            @if ($user->user)
                                                <strong>{{ $user->user->name }}</strong><br>
                                                <small>{{ $user->user->email }}</small><br>
                                                <small class="text-success">Linked</small>
                                            @else
                                                <span class="text-muted">Not Assigned</span>
                                            @endif
                                        </td>

                                        <td class="text-center">

                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                class="btn btn-info-light btn-icon" title="View" target="_blank">
                                                <i class="ri-eye-line"></i>
                                            </a>

                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-success-light btn-icon" title="Edit">
                                                <i class="ri-edit-line"></i>
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger-light btn-icon"
                                                    onclick="return confirm('Delete this card?')" title="Delete">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No cards available.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
