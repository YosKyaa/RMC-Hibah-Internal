@extends('layouts.master')
@section('title', 'Add Presentation Date')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST" action="{{ route('presentation.update', $proposals->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basicDate">Tanggal Presentasi</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="date" class="form-control @error('presentation_date') is-invalid @enderror"
                                    name="presentation_date" placeholder="yyyy-mm-dd"
                                    value="{{ old('presentation_date') }}">
                                @error('presentation_date')
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
