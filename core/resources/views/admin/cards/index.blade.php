@extends('admin.layouts.master')

@section('title', 'Card Users | DotInfo')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="flex-wrap page-title-box d-flex-between gap-15">
                <h1 class="page-title fs-18 lh-1">Cards</h1>
                <nav aria-label="breadcrumb">
                    <ol class="mb-0 breadcrumb breadcrumb-example1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Card Users</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="justify-between card-header">
                    <h4 class="gap-10 d-flex-items">
                        Card User List
                        <span class="badge bg-label-warning">{{ $cards->count() }}</span>
                    </h4>
                    <div class="flex-wrap d-flex gap-15">
                        <form action="{{ route('admin.cards.generate') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Generate 10 Cards</button>
                        </form>
                    </div>
                </div>

                <div class="card-body pt-15">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Card ID</th>
                                <th>QR Code URL</th>
                                <th>User</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cards as $card)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $card->card_id }}</td>
                                    <td>
                                        <div class="gap-2 d-flex align-items-center">
                                            <code class="copy-url" data-url="{{ url('view/'.$card->card_id) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Copy URL"
                                                style="cursor:pointer;">
                                                {{ url('view/'.$card->card_id) }}
                                            </code>

                                        </div>
                                    </td>


                                    <td>
                                        @if ($card->user)
                                            <strong>{{ $card->user->name }}</strong><br>
                                            <small><strong>Email:</strong> {{ $card->user->email ?? 'N/A' }}</small><br>
                                            <small><strong>Mobile:</strong> {{ $card->user->mobile ?? 'N/A' }}</small>
                                        @else
                                            <span class="text-muted">Not Registered Yet</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($card->user)
                                            <small><strong>Country:</strong>
                                                {{ $card->user->country_name ?? 'N/A' }}</small><br>
                                            <small><strong>IP:</strong> {{ $card->user->registration_ip ?? 'N/A' }}</small><br>
                                            <small><strong>Registration:</strong> {{ $card->user->created_at ? $card->user->created_at->format('d M, Y h:i A') : 'N/A' }}</small>
                                        @else
                                            <span class="text-muted">Not Registered Yet</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $card->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ ucfirst($card->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $card->created_at->format('d M, Y h:i A') }}</td>

                                    <td>
                                        <div class="gap-10 d-flex-items">
                                            <a href="{{ route('admin.cards.edit', $card->id) }}"
                                                class="btn btn-success-light btn-icon">
                                                <i class="ri-edit-line"></i>
                                            </a>

                                            <form action="{{ route('admin.cards.destroy', $card->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger-light btn-icon"
                                                    onclick="return confirm('Are you sure to delete this card?')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('admin.cards.view', $card->card_id) }}"
                                                class="btn btn-info-light btn-icon" target="_blank">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No cards found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                // Enable tooltip manually
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('.copy-url'));
                var tooltips = tooltipTriggerList.map(function(element) {
                    return new bootstrap.Tooltip(element, {
                        trigger: 'manual'
                    });
                });

                document.querySelectorAll('.copy-url').forEach(function(element) {
                    element.addEventListener('click', function() {

                        let text = this.getAttribute('data-url');
                        navigator.clipboard.writeText(text);

                        // Show tooltip
                        let tooltip = bootstrap.Tooltip.getInstance(this);
                        tooltip.show();

                        // Hide tooltip after 1 second
                        setTimeout(() => {
                            tooltip.hide();
                        }, 1000);

                    });
                });

            });
        </script>
    @endpush

@endsection
