@extends('layouts.master')
@section('title', 'Proposal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('style')
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .timeline .timeline-item .timeline-indicator i,
        .timeline .timeline-item .timeline-indicator-advanced i {
            color: #696cff;
        }

        .timeline .timeline-indicator-primary i {
            color: #696cff !important;
        }

        .bx {
            vertical-align: middle;
            font-size: 1.15rem;
            line-height: 1;
        }

        .bx {
            font-family: "boxicons" !important;
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            line-height: 1;
            text-rendering: auto;
            display: inline-block;
            text-transform: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        user agent stylesheet i {
            font-style: italic;
        }

        .timeline .timeline-item .timeline-indicator,
        .timeline .timeline-item .timeline-indicator-advanced {
            position: absolute;
            left: -0.75rem;
            top: 0;
            z-index: 2;
            height: 1.5rem;
            width: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 50%;
        }

        user agent stylesheet li {
            text-align: -webkit-match-parent;
        }

        .timeline {
            position: relative;
            height: 100%;
            width: 100%;
            padding: 0;
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="order-4 mb-4 full-width">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0">
                            <img src="../../assets/img/sitting-girl-with-laptop-light.png" height="140" alt="Target User"
                                data-app-dark-img="/sitting-girl-with-laptop-light.png"
                                data-app-light-img="/sitting-girl-with-laptop-light.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title">Hi {{ ucfirst(Auth::user()->username) }}!</h5>
                            <p class="mb-4">You have 12 task to finish today, Your already completed 189 task good
                                job.</p>

                            <span class="badge bg-label-primary">78% of target</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="../user-proposals"><i
                            class="bx bx-add-to-queue me-1"></i> Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="../user-proposals/create"><i
                            class="bx bx-line-chart me-1"></i> Progres </a></li>
            </ul>
        </div>


        <!-- Timeline Advanced-->
        <!-- <div class="col-xl-6"> -->
        <div class="card">
            {{-- <h5 class="card-header">Progres</h5> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <!--  -->
                    <div class="card border-0 shadow-sm rounded full-width">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">JENIS PENELITIAN</th>
                                    <th scope="col">TOPIK PENELITIAN</th>
                                    <th scope="col">JUDUL PENELITIAN</th>
                                    <th scope="col">TIM PENELITIAN</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="#modalToggle" data-bs-toggle="modal" data-bs-target="#modalToggle"
                                            class="bx bx-show-alt badge-dark"></a>
                                        <a class=" text-success" title="Edit" href=""><i
                                                class="bx bxs-edit"></i></a>
                                        <a class=" text-danger" title="Hapus" style="cursor:pointer" onclick=""><i
                                                class="bx bx-trash"></i></a>
                                        <a class=" text-danger" title="Reviewers" style="cursor:pointer" onclick=""><i
                                                class="bx bx-user-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="timeline-header mb-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#newrecord"
                        aria-controls="offcanvasEnd" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button"><span><i class="bx bx-plus me-sm-2"></i>
                            <span>Ajukan Hibah</span></span>
                    </button>
                    <span>

                </div>
                <div class="offcanvas offcanvas-end @if ($errors->all()) show @endif" tabindex="-1"
                    id="newrecord" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Dokumen</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                        <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                            id="form-add-new-record" method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label">Jenis Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select class="form-select @error('research_type') is-invalid @enderror select2-modal"
                                        name="research_type" id="research_type"
                                        data-placeholder="-- Pilih Jenis Penelitian--">
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
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label">Kategori
                                    Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select
                                        class="form-select @error('research_categories') is-invalid @enderror select2-modal"
                                        name="research_categories" id="research_categories"
                                        data-placeholder="-- Pilih Kategori Penelitian--">
                                        <option value="">-- Pilih Kategori Penelitian --</option>
                                        @foreach ($researchcategories as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('research_categories') ? 'selected' : '' }}>
                                                {{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label">Tema
                                    Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select
                                        class="form-select @error('research_themes') is-invalid @enderror select2-modal"
                                        name="research_themes" id="research_themes"
                                        data-placeholder="-- Pilih Tema Penelitian--">
                                        <option value="">-- Pilih Tema Penelitian --</option>
                                        @foreach ($researchthemes as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('research_themes') ? 'selected' : '' }}>
                                                {{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_themes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label for="" class="form-label">Topik
                                    Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select
                                        class="form-select @error('research_topics') is-invalid @enderror select2-modal"
                                        name="research_topics" id="research_topics"
                                        data-placeholder="-- Pilih Topik Penelitian--">
                                        <option value="">-- Pilih Topik Penelitian --</option>
                                        @foreach ($researchtopics as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('research_topics') ? 'selected' : '' }}>
                                                {{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_topics')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="title">Judul Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text"
                                        class="form-control @error('research_title') is-invalid @enderror"
                                        name="research_title" placeholder=" Judul Penelitian"
                                        value="{{ old('research_title') }}">
                                    @error('research_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label for="" class="form-label">Jenis
                                    TKT</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select class="form-select @error('tkt_type') is-invalid @enderror select2-modal"
                                        name="tkt_type" id="tkt_type" data-placeholder="-- Pilih Jenis TKT--">
                                        <option value="">-- Pilih Jenis TKT --</option>
                                        @foreach ($tkttype as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('tkt_type') ? 'selected' : '' }}>
                                                {{ $d->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('tkt_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label for="" class="form-label">Target Utama
                                    Riset</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select
                                        class="form-select @error('main_research_target') is-invalid @enderror select2-modal"
                                        name="main_research_target" id="main_research_target"
                                        data-placeholder="-- Pilih Target Utama Riset--">
                                        <option value="">-- Target Utama Riset --</option>
                                        @foreach ($mainresearch as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('main_research_target') ? 'selected' : '' }}>
                                                {{ $d->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('main_research_target')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Upload Images<i class="text-danger">*</i></label>
                                <div class="input-group mb-3">
                                    <input class="form-control @error('document') is-invalid @enderror" name="document"
                                        type="file" accept=".pdf" title="PDF">
                                    @error('document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Catatan</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text" class="form-control @error('notes') is-invalid @enderror"
                                        name="notes" value="{{ old('notes') }}">
                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                    data-bs-dismiss="offcanvas">Batal</button>
                            </div>
                            <div></div><input type="hidden">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Timeline Advanced-->
    </div>

    <!-- </div> -->

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        $(document).ready(function() {
            // ketika category dirubah, theme di isi
            $('#research_categories').change(function() {
                var categoryId = this.value;
                $("#research_themes").html('');
                $("#research_topics").html('');
                $.ajax({
                    url: "{{ route('DOC.get_research_themes_by_id') }}",
                    type: "GET",
                    data: {
                        id: categoryId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#research_themes').html('<option value="">Select Theme</option>');
                        $.each(result, function(key, value) {
                            $("#research_themes").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
            // ketika tema dirubah, topic di isi
            $('#research_themes').change(function() {
                var themeId = this.value;
                $("#research_topics").html('');
                $.ajax({
                    url: "{{ route('DOC.get_research_topics_by_id') }}",
                    type: "GET",
                    data: {
                        id: themeId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#research_topics').html('<option value="">Select Topic</option>');
                        $.each(result, function(key, value) {
                            $("#research_topics").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
