@extends('layouts.master')
@section('title', 'Account Bank')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
@endsection

@section('content')
    <div class="col-xl">
        <div class="card mb-4 p-4">
            <div class="card-header justify-content-between align-items-center">
                <h3 class="mb-0">Account Bank</h3>
                <span class="text-muted">Pendanaan akan ditransfer melalui rekening ini. </span>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Bank Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="bx bxs-bank"></i></span>
                            <div class="input-group input-group-merge has-validation">
                                <select @error('research_type') is-invalid @enderror class="select2" name="research_type"
                                    id="research_type" data-style="btn-default">
                                    <option value="">-- Pilih Jenis Penelitian --</option>
                                    @foreach ($researchtypes as $d)
                                        <option value="{{ $d->id }}"
                                            {{ $d->id == old('research_type') ? 'selected' : '' }}>
                                            {{ $d->title }}</option>
                                    @endforeach
                                </select>
                                @error('research_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Company</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bx-buildings"></i></span>
                            <input type="text" id="basic-icon-default-company" class="form-control"
                                placeholder="ACME Inc." aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe"
                                aria-label="john.doe" aria-describedby="basic-icon-default-email2">
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                        </div>
                        <div class="form-text"> You can use letters, numbers &amp; periods </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
