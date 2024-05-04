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
            Update Account
            </h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        @csrf
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $data->name }}" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="user" class="form-label">Username</label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror"
                                id="user" name="username" value="{{ $data->username  }}"
                                placeholder="Username" />
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ (old('email') == null ? $data->email : old('email')) }}" placeholder="Email"  />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror select2"
                                    name="gender" data-placeholder="-- Select --">
                                    <option value="">-- Select --</option>
                                    <option value="M" {{ ("M"==$data->gender ? "selected": "") }}>Male</option>
                                    <option value="F" {{ ("F"==$data->gender ? "selected": "") }}>Female</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Roles</label>
                            <select class="select2 form-select" multiple="multiple" name="roles[]" id="select2Dark">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" {{ $data->hasRole($role->id) ? 'selected' : '' }}>
                                    {{$role->name}}</option>
                                @endforeach
                            </select>
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
