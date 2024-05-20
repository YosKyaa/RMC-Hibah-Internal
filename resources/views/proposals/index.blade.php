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

        <h4 class="py-3 mb-4">
            Submit Proposal
        </h4>

        <!-- Timeline Advanced-->
        <!-- <div class="col-xl-6"> -->
        <div class="card">
            <h5 class="card-header">Progres</h5>
            <div class="card-body">
                <ul class="timeline pt-3">
                    <li class="timeline-item pb-4 timeline-item-primary border-left-dashed">
                        <span class="timeline-indicator-advanced timeline-indicator-primary">
                            <i class="bx bx-paper-plane"></i>
                        </span>
                        <div class="timeline-event">
                            <div class="timeline-header border-bottom mb-3">
                                <h6 class="mb-0">Ajukan Proposal</h6>
                                <span>3rd October</span>
                            </div>
                            <!--  -->
                            <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">JENIS PENELITIAN</th>
                                <th scope="col">KATEGORI PENELITIAN</th>
                                <th scope="col">TEMA PENELITIAN</th>
                                <th scope="col">TOPIK PENELITIAN</th>
                                <th scope="col">JUDUL PENELITIAN</th>
                                <th scope="col">JENIS TKT</th>
                                <th scope="col">TARGET UTAMA RISET</th>
                                <!-- <th scope="col">FILE</th> -->
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <img src="" class="rounded" style="width: 150px">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- <td></td> -->
                                    <td class="text-center">
                                    <a href="#modalToggle" data-bs-toggle="modal" data-bs-target="#modalToggle" class="bx bx-show-alt badge-dark"></a>
                                        <a class=" text-success" title="Edit" href=""><i class="bx bxs-edit"></i></a> 
                                            <a class=" text-danger" title="Hapus" style="cursor:pointer" onclick="" ><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                          </table>  
                    </div>
                </div>
                <br>
                            <div class="timeline-header mb-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#newrecord" aria-controls="offcanvasEnd" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span><i
                                            class="bx bx-plus me-sm-2"></i>
                                        <span>Ajukan Hibah</span></span>
                                </button>
                                <span>
                                    <div>
                                        <span>6:30 AM</span>
                                    </div>
                            </div>
                            <div class="offcanvas offcanvas-end @if ($errors->all()) show @endif"
                                tabindex="-1" id="newrecord" aria-labelledby="offcanvasEndLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Dokumen</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                                    <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                                        id="form-add-new-record" method="POST" action=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-12 fv-plugins-icon-container">
                                            <label for="research_types_id" class="form-label">Jenis Penelitian</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('research_type_id') is-invalid @enderror select2-modal"
                                                    name="research_type_id" id="research_type_id"
                                                    data-placeholder="-- Pilih Jenis Penelitian--">
                                                    <option value="">-- Pilih Jenis Penelitian --</option>
                                                    @foreach ($researchtypes as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('research_type_id') ? 'selected' : '' }}>
                                                            {{ $d->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('research_type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fv-plugins-icon-container">
                                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Kategori
                                                Penelitian</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('field_focus_research_id') is-invalid @enderror select2-modal"
                                                    name="field_focus_research_id" id="field_focus_research_id"
                                                    data-placeholder="-- Pilih Kategori Penelitian--">
                                                    <option value="">-- Pilih Kategori Penelitian --</option>
                                                    @foreach ($categoryresearch as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('field_focus_research_id') ? 'selected' : '' }}>
                                                            {{ $d->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('field_focus_research_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fv-plugins-icon-container">
                                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Tema
                                                Penelitian</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('field_focus_research_id') is-invalid @enderror select2-modal"
                                                    name="field_focus_research_id" id="category_research_id"
                                                    data-placeholder="-- Pilih Tema Penelitian--">
                                                    <option value="">-- Pilih Tema Penelitian --</option>
                                                    @foreach ($fieldfocusresearch as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('field_focus_research_id') ? 'selected' : '' }}>
                                                            {{ $d->research_theme }}</option>
                                                    @endforeach
                                                </select>
                                                @error('field_focus_research_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fv-plugins-icon-container">
                                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Topik
                                                Penelitian</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('field_focus_research_id') is-invalid @enderror select2-modal"
                                                    name="field_focus_research_id" id="field_focus_research"
                                                    data-placeholder="-- Pilih Topik Penelitian--">
                                                    <option value="">-- Pilih Topik Penelitian --</option>
                                                    @foreach ($fieldfocusresearch as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('field_focus_research_id') ? 'selected' : '' }}>
                                                            {{ $d->research_topic }}</option>
                                                    @endforeach
                                                </select>
                                                @error('field_focus_research_id')
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
                                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Jenis
                                                TKT</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('tkt_types_id') is-invalid @enderror select2-modal"
                                                    name="tkt_types_id" id="tkt_types_id"
                                                    data-placeholder="-- Pilih Jenis TKT--">
                                                    <option value="">-- Pilih Jenis TKT --</option>
                                                    @foreach ($tkttype as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('tkt_types_id') ? 'selected' : '' }}>
                                                            {{ $d->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tkt_types_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fv-plugins-icon-container">
                                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Target Utama
                                                Riset</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <select
                                                    class="form-select @error('main_research_targets_id') is-invalid @enderror select2-modal"
                                                    name="main_research_targets_id" id="main_research_targets_id"
                                                    data-placeholder="-- Pilih Target Utama Riset--">
                                                    <option value="">-- Target Utama Riset --</option>
                                                    @foreach ($mainresearch as $d)
                                                        <option value="{{ $d->id }}"
                                                            {{ $d->id == old('main_research_targets_id') ? 'selected' : '' }}>
                                                            {{ $d->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('main_research_targets_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="form-label">Upload Images<i class="text-danger">*</i></label>
                                            <div class="input-group mb-3">
                                                <input class="form-control @error('document') is-invalid @enderror"
                                                    name="document" type="file" accept=".pdf" title="PDF">
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
                                                <input type="text"
                                                    class="form-control @error('note') is-invalid @enderror"
                                                    name="note" value="{{ old('note') }}">
                                                @error('note')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="offcanvas">Batal</button>
                                        </div>
                                        <div></div><input type="hidden">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item pb-4 timeline-item-success border-left-dashed">
                        <span class="timeline-indicator-advanced timeline-indicator-success">
                            <i class="bx bx-paint"></i>
                        </span>
                        <div class="timeline-event">
                            <div class="timeline-header mb-sm-0 mb-3">
                                <h6 class="mb-0">Design Review</h6>
                                <span class="text-muted">4th October</span>
                            </div>
                            <p>
                                Weekly review of freshly prepared design for our new
                                application.
                            </p>
                            <div class="d-flex justify-content-between">
                                <h6>New Application</h6>
                                <div class="d-flex">
                                    <div class="avatar avatar-xs me-2">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                            alt="Avatar" class="rounded-circle">
                                    </div>
                                    <div class="avatar avatar-xs">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                            alt="Avatar" class="rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item pb-4 timeline-item-danger border-left-dashed">
                        <span class="timeline-indicator-advanced timeline-indicator-danger">
                            <i class="bx bx-shopping-bag"></i>
                        </span>
                        <div class="timeline-event">
                            <div class="d-flex flex-sm-row flex-column">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/elements/16.jpg"
                                    class="rounded me-3" alt="Shoe img" height="62" width="62">
                                <div>
                                    <div class="timeline-header flex-wrap mb-2 mt-3 mt-sm-0">
                                        <h6 class="mb-0">Sold Puma POPX Blue Color</h6>
                                        <span class="text-muted">5th October</span>
                                    </div>
                                    <p>
                                        PUMA presents the latest shoes from its collection. Light &amp;
                                        comfortable made with highly durable material.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column text-center">
                                <div class="mb-sm-0 mb-2">
                                    <p class="mb-0">Customer</p>
                                    <span class="text-muted">Micheal Scott</span>
                                </div>
                                <div class="mb-sm-0 mb-2">
                                    <p class="mb-0">Price</p>
                                    <span class="text-muted">$375.00</span>
                                </div>
                                <div>
                                    <p class="mb-0">Quantity</p>
                                    <span class="text-muted">1</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item pb-4 timeline-item-info border-left-dashed">
                        <span class="timeline-indicator-advanced timeline-indicator-info">
                            <i class="bx bx-user-circle"></i>
                        </span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">Interview Schedule</h6>
                                <span class="text-muted">6th October</span>
                            </div>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Possimus quos, voluptates voluptas rem veniam expedita.
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-3">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                            alt="Avatar" class="rounded-circle">
                                    </div>
                                    <div>
                                        <p class="mb-0">Rebecca Godman</p>
                                        <span class="text-muted">Javascript Developer</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                    <i class="bx bx-message-rounded-dots me-2"></i>
                                    <i class="bx bx-phone-call"></i>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item pb-4 timeline-item-dark border-left-dashed">
                        <span class="timeline-indicator-advanced timeline-indicator-dark">
                            <i class="bx bx-bell"></i>
                        </span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 class="mb-0">2 Notifications</h6>
                                <span class="text-muted">7th October</span>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <ul
                                            class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                                                <img class="rounded-circle"
                                                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                    alt="Avatar">
                                            </li>
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                <img class="rounded-circle"
                                                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png"
                                                    alt="Avatar">
                                            </li>
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                aria-label="Julee Rossignol" data-bs-original-title="Julee Rossignol">
                                                <img class="rounded-circle"
                                                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                                    alt="Avatar">
                                            </li>
                                        </ul>
                                        <span>Commented on your post.</span>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm my-sm-0 my-3">
                                        View
                                    </button>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                    <div class="d-flex flex-sm-row flex-column align-items-center">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                            class="rounded-circle me-3" alt="avatar" height="24" width="24">
                                        <div class="user-info">
                                            <p class="my-0">Dwight repaid you</p>
                                            <span class="text-muted">30 minutes ago</span>
                                        </div>
                                    </div>
                                    <h5 class="mb-0">$20</h5>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="timeline-end-indicator">
                        <i class="bx bx-check-circle"></i>
                    </li>
                </ul>
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
        
        $('#category_research_id').change(function() {
            var id = this.value;
            $("#research_theme").html('');
            $("#research_topic").html('');
            $.ajax({
                url: "{{ route('DOC.get_field_focus_research_by_id') }}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.length != 0) {
                        $('#research_theme').html(
                            '<option value="">Kategori</option>'
                        );
                        $.each(result, function(key, value) {
                            $("#research_theme").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#research_topic').html(
                            '<option value="">Kategori</option>'
                        );
                        $.each(result, function(key, value) {
                            $("#research_topic").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        });
    </script>
@endsection
