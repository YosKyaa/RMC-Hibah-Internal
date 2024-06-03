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
                                    <img src="../../assets/img/sitting-girl-with-laptop-light.png" height="140"
                                        alt="Target User" data-app-dark-img="/sitting-girl-with-laptop-light.png"
                                        data-app-light-img="/sitting-girl-with-laptop-light.png">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Hi Reviewers!</h5>
                                    <p class="mb-4">You have {{ $dataCount }} tasks to finish today, you have already
                                        completed {{ $dataCount2 }} tasks. Good job.</p>

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
                                <th data-priority="1">No</th>
                                <th>Nama Peneliti</th>
                                <th>Tim Peneliti</th>
                                <th>Judul Penelitian</th>
                                <th>Tanggal Mulai Review</th>
                                <th>Tanggal Selesai Review</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th data-priority="2">Action</th>
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
                    url: "{{ route('reviewers.data') }}",
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
                            var html = row.users.username;
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
                            var html = row.research_title;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.review_date_start;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = row.review_date_end;
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
                            var html = row.notes;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '';
                            if (row.statuses.id === 'S06') {
                                html +=
                                    `<a class="text-success" title="Approve" style="cursor:pointer" onclick="approveId(\'` +
                                    row.id +
                                    `\')"><i class="bx bx-check"></i></a>
                                         <a class="text-danger" title="Disapprove" style="cursor:pointer" onclick="disapproveId(\'` +
                                    row.id + `\')"><i class="bx bx-x"></i></a>`;
                            } else {
                                if (row.documents && row.documents.length > 0) {
                                row.documents.forEach(function(document) {
                                    html +=
                                        `<a href="${document.proposal_doc}" class="bx bx-import" title="Download"></a><br>`;
                                });
                            }
                                html +=
                                    `<a class="text-success" title="Edit" style="cursor:pointer" onclick="editId(\'` +
                                    row.id +
                                    `\')"><i class="bx bxs-edit"></i></a>
                                         <a class="text-danger" title="Hapus" style="cursor:pointer" onclick="deleteId(\'` +
                                    row
                                    .id +
                                    `\')"><i class="bx bx-trash"></i></a>
                                         <a class="text-primary" title="Diterima" style="cursor:pointer" onclick="markAsReviewed(\'` +
                                    row.id + `\')"><i class="bx bx-check"></i></a>`;
                            }
                            return html;
                        },
                        "orderable": false,
                        className: "text-md-center"
                    }
                ]
            });

        });

        function deleteId(id) {
            swal({
                    title: "Apakah Pengajuan Ini ditolak?",
                    text: "Jika pengajuan ditolak data tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('reviewers.delete') }}",
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

        function markAsReviewed(id) {
            swal({
                    title: "Apakah ingin melanjutkan presentasi?",
                    icon: "warning",
                    buttons: ["Batal", "Ya"],
                    dangerMode: true,
                })
                .then((confirmed) => {
                    if (confirmed) {
                        $.ajax({
                            url: "{{ route('reviewers.presentation') }}",
                            type: 'POST',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    swal('Status berhasil diubah!', {
                                        icon: "success",
                                    });
                                    // Reload the DataTable to reflect the changes
                                    $('#datatable').DataTable().ajax.reload();
                                } else {
                                    swal('Gagal mengubah status!', {
                                        icon: "error",
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal('Terjadi kesalahan saat mengubah status!', {
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
        }
    </script>
@endsection
