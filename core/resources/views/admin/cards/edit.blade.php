@extends('admin.layouts.master')

@section('title', 'Edit Card')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Card</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.cards.update', $card->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="inactive" {{ $card->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ $card->status == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Card</button>
                    <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
