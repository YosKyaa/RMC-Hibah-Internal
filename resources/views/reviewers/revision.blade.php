@extends('layouts.master')
@section('title', 'Add Reviewer')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Berikan catatan!</h5> <small class="text-muted float-end">Add Reviewer</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST" action="{{ route('reviewers.update', $proposal->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Comment</label>
                            <div class="input-group input-group-merge has-validation">
                                <textarea type="text" class="form-control @error('review_notes') is-invalid @enderror" name="review_notes">{{ $proposal->review_notes ?? old('review_notes') }}</textarea>
                                @error('review_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
