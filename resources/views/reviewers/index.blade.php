@extends('layouts.master')

@section('title', 'Review Proposal')
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


@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="flex-grow-1 container-p-y">
            <!-- Hour chart  -->
            <div class="card">
                <div class="card-body">
                    <div class="col-12 col-md-12 p-3">
                        <h2><strong>Halaman Review Proposal</strong></h2>
                        <div class="col-12 col-lg-7">
                            <p>Your progress this week is Awesome. let's keep it up and get a lot of points reward !</p>
                        </div>
                        <div class="d-flex justify-content-between flex-wrap gap-3 me-5">
                            <div class="d-flex align-items-center gap-3 me-4 me-sm-0">
                                <span class=" bg-label-primary p-2 rounded">
                                    <i class="bx bx-laptop bx-sm"></i>
                                </span>
                                <div class="content-right">
                                    <p class="mb-0">Jumlah Proposal yang Belum Direview</p>
                                    <h4 class="text-primary mb-0">{{$dataCount}}</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="bg-label-warning p-2 rounded">
                                    <i class="bx bx-check-circle bx-sm"></i>
                                </span>
                                <div class="content-right">
                                    <p class="mb-0">Jumlah Proposal yang Telah Direview</p>
                                    <h4 class="text-warning mb-0">{{$dataCount2}}</h4>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="bg-label-info p-2 rounded">
                                    <i class="bx bx-bulb bx-sm"></i>
                                </span>
                                <div class="content-right">
                                    <p class="mb-0">Total Proposal</p>
                                    <h4 class="text-info mb-0">{{$totalData}}</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



















        {{-- <div class="row">
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
            </div> --}}
        <div class="card p-3 mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">List Pengajuan Proposal</h3>
            </div>
            <div class="container mb-3">
                <table class="table table-hover table-sm" id="datatable" width="100%">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th>Nama Peneliti</th>
                            <th>Tim Peneliti</th>
                            <th>Judul Penelitian</th>
                            <th>Tanggal Mulai Review</th>
                            <th>Tanggal Selesai Review</th>
                            <th>Status</th>
                            <th data-priority="2" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    url: "{{ asset('assets/vendor/libs/datatables/id.json') }}"
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
                            var html = '<strong>' + row.users.username.charAt(0).toUpperCase() + row
                                .users.username.slice(1) + '</strong>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '';
                            if (row.proposal_teams && row.proposal_teams.length > 0) {
                                row.proposal_teams.forEach(function(team) {
                                    if (team.researcher) {
                                        html += '<span class="badge bg-label-dark">' +
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
                                `<a href="${row.documents[0].proposal_doc}" style="color: primary;">${row.research_title}</a>`;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '<em>' + row.review_date_start + '</em>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '<em>' + row.review_date_end + '</em>';
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<span class="badge rounded-pill bg-label-${row.statuses.color}">
                                <span class="badge badge-dot bg-${row.statuses.color} me-1"></span>${row.statuses.status} </span>`;
                            return html;
                        }
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = '';
                            if (row.statuses.id === 'S06') {
                                html +=
                                    `<a class="badge badge-center rounded-pill bg-success" title="Approve" style="cursor:pointer" onclick="approveId(\'` +
                                    row.id +
                                    `\')"><i class="bx bx-check"></i></a>
                                     <a class="badge badge-center rounded-pill bg-danger" title="Disapprove" style="cursor:pointer" onclick="disapproveId(\'` +
                                    row.id + `\')"><i class="bx bx-x"></i></a>`;
                            } else if (row.statuses.id === 'S05' || row.statuses.id === 'S07' || row
                                .statuses.id === 'S03' || row.statuses.id === 'S04') {
                                html +=
                                    `<a class="text-warning" title="Show" href="{{ url('reviewers/show/${row.id}') }}"><i class="bx bx-show"></i></a>`;
                            } else {
                                html +=
                                    `<a class="badge badge-center rounded-pill bg-warning"title="Edit" href="{{ url('reviewer/revision/${row.id}') }}"><i class="bx bx-revision"  style="color:#ffff"></i></a>
                                     <a class="badge badge-center rounded-pill bg-danger" title="Hapus" style="cursor:pointer" onclick="rejectId(\'` +
                                    row.id +
                                    `\')"><i class="bx bx-x" style="color:#ffff"></i></a>
                                                                         <a class="badge badge-center rounded-pill bg-success" title="Approve" style="cursor:pointer" onclick="markAsReviewed(\'${row.id}\')"><i class="bx bx-check" style="color:#ffff"></i></a>`;
                            }
                            return html;
                        },
                        "orderable": false,
                        className: "text-md-center"
                    }
                ]
            });

        });


        function markAsReviewed(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You will Approve this proposal for presentation!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!',
                customClass: {
                    confirmButton: 'btn btn-primary me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('reviewers.presentation') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Approved!',
                                    text: 'The proposal has been Approved.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                                $('#datatable').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.error,
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }

        function approveId(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to approve this Proposals!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                customClass: {
                    confirmButton: 'btn btn-primary me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('reviewers.approve') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Approved!',
                                    text: 'The Proposals has been approved.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.reload(); // Reload the page after approval
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while approving the Proposals.',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    });
                }
            });
        }

        function rejectId(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to reject this Proposal!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, reject it!',
                customClass: {
                    confirmButton: 'btn btn-danger me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('reviewers.reject') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Rejected!',
                                    text: 'The Proposal has been rejected.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.reload(); // Reload the page after rejection
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while rejecting the Proposal.',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    });
                }
            });
        }

        function disapproveId(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to disapprove this Proposals!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, disapprove it!',
                customClass: {
                    confirmButton: 'btn btn-danger me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('reviewers.disapprove') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}" // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Disapproved!',
                                    text: 'The Proposals has been disapproved.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.reload(); // Reload the page after disapproval
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message,
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while disapproving the Proposals.',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>

@endsection
