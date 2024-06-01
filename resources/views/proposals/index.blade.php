@extends('layouts.master')
@section('title', 'Proposal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
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

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
    </style>
@endsection

@section('content')
    @if (session('proposals'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ session('proposals') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                            <p class="mb-4">Silahkan Upload Proposal Anda!</p>
                            @if ($proposals->isEmpty())
                                <a href="../user-proposals/create" class="btn btn-primary"><span><i
                                            class="bx bx-plus me-sm-2"></i>
                                        <span>Ajukan Hibah</span></span></a>
                            @else
                                @foreach ($proposals as $p)
                                    <p>Terimakasih Sudah Mengupload!</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($proposals as $p)
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="../user-proposals"><i
                            class="bx bx-add-to-queue me-1"></i>
                        Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="../user-proposals/timeline"><i
                            class="bx bx-line-chart me-1"></i>
                        Progres </a></li>
            </ul>
        </div>
    @endforeach
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
            </div>
            <table class="table table-hover table-sm" id="datatable" width="75%">
                <thead>
                    <tr>
                        <th>Jenis Penelitian</th>
                        <th>TopiK Penelitian</th>
                        <th>Judul Proposal</th>
                        <th>Tim Peneliti</th>
                        <th>Status</th>
                        <th>Reviewer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.responsive.js') }}"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @if (session('proposals'))
        <script type="text/javascript">
            //swall message notification
            $(document).ready(function() {
                swal(`{!! session('proposals') !!}`, {
                    icon: "info",
                });
            });
        </script>
    @endif
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
                    url: "{{ route('user-proposals.data') }}",
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
                            var html = row.research_type.title;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.research_topic.name;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.research_title;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '';
                            if (row.proposal_teams && row.proposal_teams.length > 0) {
                                row.proposal_teams.forEach(function(team) {
                                    if (team.researcher) {
                                        html += '<span class="badge bg-label-primary">' +
                                            team.researcher.username + '</span><br>';
                                    }
                                });
                            }
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<span class="badge bg-${row.statuses.color}">${row.statuses.status}</span>`;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = "Belum ada reviewer";
                            if (row.reviewer != null) {
                                html = row.reviewer.username;
                            }
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<a class=" text-success" title="Edit" href="{{ url('admin/proposals/edit/` + row.id + `') }}"><i class="bx bxs-edit"></i></a>
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
                            url: "{{ route('user-proposals.delete') }}",
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
