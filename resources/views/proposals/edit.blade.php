@extends('layouts.master')
@section('title', 'Tim Peneliti Proposal')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST"
                        action="{{ route('user-proposals.update', $proposals->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Silahkan Pilih Tim Peneliti</label>
                            <div class="input-group input-group-merge has-validation">
                                <select class="form-select @error('researcher_id') is-invalid @enderror select2-modal"
                                    name="researcher_id[]" id="researcher_id" data-placeholder="-- Pilih Jenis Penelitian--"
                                    multiple>
                                    <option value="">-- Pilih Jenis Penelitian --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ in_array($user->id, old('researcher_id', [])) ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('researcher_id')
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
