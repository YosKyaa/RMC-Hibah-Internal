@extends('layouts.master')

@section('title', 'Edit Profil')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Akun / </span>
@endsection

@section('style')
    <style>
        .img {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            object-fit: cover;
            background: #dfdfdf
        }
    </style>
@section('content')
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            {{ session('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if ($user->image)
                            <img src="{{ asset($user->image) }}" alt="user-avatar" class="img"  id="uploadedAvatar">
                        @else
                            <img src="../../assets/img/avatars/user.png" alt="user-avatar" class="img" id="uploadedAvatar">
                        @endif
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="button-wrapper">
                                <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="image" name="image" class="account-file-input"
                                        hidden="" accept="image/png, image/jpeg">
                                </label>

                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                            </div>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>

                            <div class="row">
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ Auth::user()->name }}" placeholder="Nama Lengkap"
                                        autofocus />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6 fv-plugins-icon-container">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" value="{{ Auth::user()->username }}" placeholder="NIK/NIM"
                                        @if (Auth::user()->username != null) readonly title="Silahkan hubungi Admin" @endif />
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (Auth::user()->username == null)
                                        <span class="text-danger">
                                            <strong>Isi Username/NIM Anda</strong>
                                        </span>
                                    @endif
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gelar Depan</label>
                                    <input type="text" class="form-control @error('front_title') is-invalid @enderror"
                                        name="front_title" value="{{ Auth::user()->front_title }}" />
                                    @error('front_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gelar Belakang</label>
                                    <input type="text" class="form-control @error('back_title') is-invalid @enderror"
                                        name="back_title" value="{{ Auth::user()->back_title }}" />
                                    @error('back_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email"
                                        value="{{ old('email') == null ? Auth::user()->email : old('email') }}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="nidn" class="form-label">NIDN</label>
                                    <input type="nidn" class="form-control @error('nidn') is-invalid @enderror"
                                        id="nidn" name="nidn"
                                        value="{{ old('nidn') == null ? Auth::user()->nidn : old('nidn') }}" />
                                    @error('nidn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Program Studi</label>
                                    <select
                                        class="select2 form-select col-sm-12 @error('study_programs') is-invalid @enderror"
                                        name="study_programs">
                                        <option value="" {{ Auth::user()->studyProgram == null ? 'selected' : '' }}
                                            disabled>
                                            Select</option>
                                        @foreach ($studiprogram as $g)
                                            <option value="{{ $g->id }}"
                                                {{ Auth::user()->study_program_id == $g->id ? 'selected' : '' }}>
                                                {{ $g->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('study_programs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Department</label>
                                    <select
                                        class="select2 form-select col-sm-12 @error('departement') is-invalid @enderror"
                                        name="department">
                                        <option value="" {{ Auth::user()->department == null ? 'selected' : '' }}
                                            disabled>
                                            Select</option>
                                        @foreach ($dept as $g)
                                            <option value="{{ $g->id }}"
                                                {{ Auth::user()->departments_id == $g->id ? 'selected' : '' }}>
                                                {{ $g->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('departement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <a class="btn btn-outline-secondary" href="{{ route('dashboard') }}">Back</a>
                            </div>
                            <input type="hidden">
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>



        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const image = document.getElementById('uploadedAvatar');
            const input = document.querySelector('input[type="file"]');
            input.addEventListener('change', () => {
                image.src = URL.createObjectURL(input.files[0]);
            });
        });
    </script>
@endsection
