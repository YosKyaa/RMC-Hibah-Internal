@extends('layouts.master')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Manage /</span>
@endsection
@section('title', 'Annoucements')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}">
@endsection

@section('style')
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTable td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            word-wrap: break-word;
        }
        .layout-page,
        .content-wrapper,
        .content-wrapper>*,
        .layout-menu {
            min-height: unset;
        }
    </style>
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-3 ">
        <div class="card-body">
            <div class="card-header justify-content-between align-items-center">
                <h2 class="mb-0"><strong>Halaman Manajemen Pengumuman</strong></h2>
                    <span class="text-muted">Ini adalah halaman untuk mengelola Informasi & Pengumuman.</span>
            </div>
        </div>
    </div>

    <div class="card p-5">
        <div class="card-datatable table-responsive">
            <div class="card-header flex-column flex-md-row pb-0">
                <div class="row">
                    <div class="col-12 pt-3 pt-md-0">
                        <div class="col-12">
                            <div class="row">
                                <div class=" col-md-3">
                                    {{-- <select id="select_guard_name" class="select2 form-select"
                                        data-placeholder="Guard Name">
                                        <option value="">Guard Name</option>

                                    </select> --}}
                                </div>
                                <div class=" col-md-4">
                                    {{-- <select id="select_permission" class="select2 form-select"
                                        data-placeholder="Permissions">
                                        <option value="">Permissions</option>

                                    </select> --}}
                                </div>
                                <div class="offset-md-2 col-md-3 text-md-end text-center pt-3 pt-md-0">

                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#newrecord" aria-controls="offcanvasEnd" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span><i
                                                class="bx bx-plus me-sm-2"></i>
                                            <span>Tambah Pengumuman</span></span>
                                    </button>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="offcanvas offcanvas-end @if ($errors->all()) show @endif" tabindex="-1"
                        id="newrecord" aria-labelledby="offcanvasEndLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Pengumuman</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                            <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                                id="form-add-new-record" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12 fv-plugins-icon-container mb-3">
                                    <label class="form-label mb-1" for="title">Judul</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" placeholder="Input your title" value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label mb-1">Unggah Foto/dokumen<i class="text-danger">*</i></label>
                                    <div class="input-group">
                                        <input class="form-control @error('file_path') is-invalid @enderror"
                                            name="file_path" type="file" accept=".jpg, .jpeg, .png, .pdf" title="JPG/PNG/PDF">
                                        @error('file_path')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-text">Silahkan unggah foto/dokumen Max 5mb.
                                    </div>
                                </div>
                                <div class="col-sm-12 fv-plugins-icon-container mb-3">
                                    <label class="form-label mb-1" for="description">Deskripsi</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <div id="editor-container" class="form-control"></div>
                                        <textarea class="form-control d-none" id="description" name="description" placeholder="Tuliskan isi pikiranmu...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Kirim</button>
                                    <button type="reset" class="btn btn-outline-secondary"
                                        data-bs-dismiss="offcanvas">Batal</button>
                                </div>
                                <div></div><input type="hidden">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <table class="table table-hover table-sm" id="datatable" width="100%">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th >Tanggal</th>
                        <th data-priority="1">Judul</th>
                        <th data-priority="2">Description</th>
                        <th width="50px" data-priority="4">File Gambar</th>
                        <th width="40px" data-priority="3"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


    {{-- <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-1">Create Announcements!</h5>
                                <p class="mb-4"><span class="fw-medium">Notify all Users of your news</span></p>
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#newrecord" aria-controls="offcanvasEnd" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span><i
                                            class="bx bx-plus me-sm-2"></i>
                                        <span>Add New Announcement</span></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <img src="../../assets/img//ANNOUNCEMENT.png" height="140" alt="View Badge User"
                                data-app-light-img="ANNOUNCEMENT.png" data-app-dark-img="ANNOUNCEMENT.png">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <div class="card-header flex-column flex-md-row pb-0">
                            <div class="row">
                                <div class="col-12 pt-3 pt-md-0">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="offset-md-0 col-md-0 text-md-end text-center pt-3 pt-md-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end @if ($errors->all()) show @endif"
                                tabindex="-1" id="newrecord" aria-labelledby="offcanvasEndLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Pengumuman</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                                    <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                                        id="form-add-new-record" method="POST" action=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-12 fv-plugins-icon-container mb-3">
                                            <label class="form-label mb-1" for="title">Judul</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                                    placeholder="Input your title" value="{{ old('title') }}">
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label class="form-label mb-1">Unggah Foto/dokumen<i
                                                    class="text-danger">*</i></label>
                                            <div class="input-group">
                                                <input class="form-control @error('file_path') is-invalid @enderror"
                                                    name="file_path" type="file" accept=".jpg, .jpeg, .png"
                                                    title="JPG/PNG">
                                                @error('file_path')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-text">Silahkan unggah foto/dokumen Max 5mb.
                                            </div>
                                        </div>
                                        <div class="col-sm-12 fv-plugins-icon-container mb-3">
                                            <label class="form-label mb-1" for="description">Deskripsi</label>
                                            <div class="input-group input-group-merge has-validation">
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="editor" cols="1"
                                                    rows="8" placeholder="Tuliskan isi pikiranmu..." name="description" value="{{ old('description') }}"> </textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary data-submit me-sm-3 me-1">Kirim</button>
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="offcanvas">Batal</button>
                                        </div>
                                        <div></div><input type="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-sm" id="datatable" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th width="60px">Tanggal</th>
                                    <th width="60px">Judul</th>
                                    <th width="60px">File Gambar</th>
                                    <th width="40px"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($announcements as $anc)
        <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalToggleLabel">{{ $anc->title }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset($anc->file_path) }}" class="img-fluid" alt="" width="500px"
                            height="500px">
                        <h5 class="text-truncate"></h5>
                        <p class="teks">{{ $anc->description }}</p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
@section('script')
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-buttons.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/js/forms-editors.js') }}"></script>
    <script>
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Sync the content of the Quill editor with the textarea
        quill.on('text-change', function() {
            var description = document.querySelector('textarea[name=description]');
            description.value = quill.root.innerHTML;
        });

        // If the textarea already has content, load it into Quill
        var description = document.querySelector('textarea[name=description]').value;
        if (description) {
            quill.root.innerHTML = description;
        }
    </script>
    @if (session('msg'))
        <script type="text/javascript">
            //swall message notification
            $(document).ready(function() {
                swal(`{!! session('msg') !!}`, {
                    icon: "info",
                });
            });
        </script>
    @endif
    <script>
        "use strict";
        setTimeout(function() {
            (function($) {
                "use strict";
                $(".select2").select2({
                    allowClear: true,
                    minimumResultsForSearch: 7
                });
            })(jQuery);
        }, 350);
        setTimeout(function() {
            (function($) {
                "use strict";
                $(".select2-modal").select2({
                    dropdownParent: $('#newrecord'),
                    allowClear: true,
                    minimumResultsForSearch: 5
                });
            })(jQuery);
        }, 350);
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ordering: false,
                searching: true,
                language: {
                    searchPlaceholder: 'Search..',
                    // url: "{{ asset('assets/vendor/libs/datatables/id.json') }}"
                },
                ajax: {
                    url: "{{ route('announcements.data') }}",
                    data: function(d) {
                        d.search = $('#datatable_filter input[type="search"]').val()
                    },
                },
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                columns: [{
                        render: function(data, type, row, meta) {
                            var no = (meta.row + meta.settings._iDisplayStart + 1);
                            return no;
                        },
                        className: "text-center"
                    },
                    {
                        render: function(data, type, row, meta) {
                            var date = new Date(row.created_at);
                            var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                            var formattedDate = date.toLocaleDateString('id-ID', options);
                            var html = formattedDate;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.title;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.description;
                            var div = document.createElement('div');
                            div.innerHTML = html;
                            var text = div.textContent || div.innerText;
                            return text;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.file_path;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<a href="{{ url('user-announcements') }}" class="badge badge-center rounded-pill bg-warning" title="Lihat"><i class="bx bx-show-alt badge-dark"></i></a>
                                <a class="badge badge-center rounded-pill bg-success" title="Edit" href="{{ url('announcements/edit/` + row.id + `') }}"><i class="bx bxs-edit"></i></a>
                            <a class="badge badge-center rounded-pill bg-danger" title="Hapus" style="cursor:pointer" onclick="DeleteId(\'` +
                                row
                                .id + `\',\'` + row.name +
                                `\')" ><i class="bx bxs-trash" style="color: #ffff;"></i></a>`;
                            return html;
                        },
                        "orderable": false,
                        className: "text-md-center"
                    }
                ]
            });
        });

        function DeleteId(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, data can't be recovered!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('announcements.delete') }}",
                            type: "DELETE",
                            data: {
                                "id": id,
                                "_token": $("meta[name='csrf-token']").attr("content"),
                            },
                            success: function(data) {
                                if (data['success']) {
                                    swal(data['message'], {
                                        icon: "success",
                                    });
                                    $('#datatable').DataTable().ajax.reload();
                                } else {
                                    swal(data['message'], {
                                        icon: "error",
                                    });
                                }
                            }
                        })
                    }
                })
        }
    </script>
@endsection
