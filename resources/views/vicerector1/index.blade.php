@extends('layouts.master')

@section('title', 'Reviewers')
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
        .full-width {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Gamifications
            </h4>

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 order-lg-1 order-2">
                    <div class="card">
                    </div>
                </div>
                <div class="col-lg-8 order-lg-3 col-12 align-self-end order-4 mb-4 full-width">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0">
                                <img src="../../assets/img/man-with-laptop-light.png" height="140" alt="View Badge User" 
                                    data-app-light-img="man-with-laptop-light.png" 
                                        data-app-dark-img="man-with-laptop-dark.png">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Hi Vice Rector 1!</h5>
                                    <p class="mb-4">You have 12 task to finish today, Your already completed 189 task good
                                        job.</p>

                                    <span class="badge bg-label-primary">78% of target</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card full-width">
            <div class="container">
                <table class="table table-hover table-sm" id="datatable" width="50%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Jenis Penelitian</th>
                            <th>Bidang Penelitian</th>
                            <th>Judul Penelitian</th>
                            <th>Tim Peneliti</th>
                            <th>Jenis TKT</th>
                            <th>Target Utama Riset</th>
                            <th>Lampiran Dokumen</th>
                            <th>Status</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
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
                    url: "{{ route('dept.data') }}",
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
                            var html = row.name_dept;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<a class=" text-success" title="Edit" href="{{ url('setting/manage_studyprogram/studyprogram/edit/` +
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                row.id + `') }}"><i class="bx bxs-edit"></i></a> 
                            <a class=" text-danger" title="Hapus" style="cursor:pointer" onclick="DeleteId(\'` + row
                                .id + `\',\'` + row.name + `\')" ><i class="bx bx-trash"></i></a>`;
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
                            url: "{{ route('dept.delete') }}",
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
