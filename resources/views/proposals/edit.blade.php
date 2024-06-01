@extends('layouts.master')
@section('title', 'Tim Peneliti Proposal')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
@endsection
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
                        <input type="hidden" name="proposals_id" value="{{ $proposals->id }}">
                        <div class="mb-3">

                            <div class="input-group input-group-merge has-validation">
                                <label for="select2Multiple" class="form-label">Silahkan pilih tim peneliti</label>
                                <select id="select2Multiple"
                                    class="select2 form-select @error('researcher_id') is-invalid @enderror"
                                    name="researcher_id[]" id="researcher_id" multiple>
                                    <option value="" disabled selected>-- Pilih Jenis Penelitian --</option>
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

@section('script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection
