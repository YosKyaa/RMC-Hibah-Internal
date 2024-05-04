@extends('layouts.master')
@section('breadcrumb-items')
<span class="text-muted fw-light">Setting /</span>
<span class="text-muted fw-light">Manage Account /</span>
<span class="text-muted fw-light">Users /</span>
@endsection
@section('title', $data->username)

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('style')
<style>

</style>
@endsection

@section('content')
<!-- User Profile Content -->
<div class="row">
    <div class="col-md-12">
        @if(session('msg'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{session('msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card mb-4">
            <h5 class="card-header"><img src="{{ $data->image() }}" class="w-40 h-40 rounded-circle" style="width:40px; height:40px;object-fit: cover; margin-right:10px;">
            Reset Password <b class="text-uppercase"> {{ $data->name }} </b>
            </h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-md-6">
                            {{-- <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Current Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="current_password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">New Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="new_password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" >Confirm Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="confirm_password"
                                        class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="confirm_password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="text-danger">
                                <b>Attention!</b><br>
                                Ensure your account is using a long, random password to stay secure.<br>
                                password changes on this form only apply to this system,<br>will not affect users who log in using Single Sign-On or Google..
                            </span><br><br>
                            <span>
                                <b>Password Recommendations:</b>
                                <ul>
                                    <li>The minimum length is 8 characters, more than is better</li>
                                    <li>There is at least one uppercase and lowercase character</li>
                                    <li>There is at least one number, symbol, or space character</li>
                                </ul>
                            </span>
                        </div>
                       
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">Back</a>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

<!--/ User Profile Content -->
@endsection
@section('script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script>
    "use strict";
    $(function () {
        const e = $(".selectpicker"),
            t = $(".select2"),
            c = $(".select2-icons");

        function i(e) {
            return e.id ? "<i class='bx bxl-" + $(e.element).data("icon") + " me-2'></i>" + e.text : e.text
        }
        e.length && e.selectpicker(), t.length && t.each(function () {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: e.parent()
            })
        }), c.length && c.wrap('<div class="position-relative"></div>').select2({
            templateResult: i,
            templateSelection: i,
            escapeMarkup: function (e) {
                return e
            }
        })
    });

</script>
@endsection
