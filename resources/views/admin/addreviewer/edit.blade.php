@extends('layouts.master')
@section('title', 'Add Reviewer')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST" action="{{ route('proposals.update', $proposals->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basicDate">Tanggal Mulai Review</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="date" class="form-control @error('review_date_start') is-invalid @enderror"
                                    name="review_date_start" placeholder="yyyy-mm-dd"
                                    value="{{ old('review_date_start') }}">
                                @error('review_date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basicDate">Tanggal Selesai Review</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="date" class="form-control @error('review_date_end') is-invalid @enderror"
                                    name="review_date_end" placeholder="yyyy-mm-dd" value="{{ old('review_date_end') }}">
                                @error('review_date_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="reviewer_id" class="form-label">Pilih Reviewer</label>
                            <select name="reviewer_id" id="reviewer_id" class="form-select" required>
                                <option value="">Select Reviewer</option>
                                @foreach ($users as $role)
                                    <option value="{{ $role->id }}"
                                        {{ in_array($role->id, old('users') ?? []) ? 'selected' : '' }}>
                                        {{ $role->name }} (
                                        @foreach ($role->roles as $x)
                                            {{ $x->name }}
                                        @endforeach
                                        )
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
