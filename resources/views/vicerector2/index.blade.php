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
@endsection

@section('content')
        <div class="app-academy">
            <div class="card p-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                    <div class="app-academy-md-25 card-body py-0">
                        <img src="../../assets/img/illustrations/bulb-light.png"
                            class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                            data-app-light-img="illustrations/bulb-light.png"
                            data-app-dark-img="illustrations/bulb-dark.png" height="90">
                    </div>
                    <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                        <h3 class="card-title mb-4 lh-sm px-md-5 text-center">
                            Education, talents, and career opportunities.
                            <span class="text-primary fw-medium text-nowrap">All in one place</span>.
                        </h3>
                        <p class="mb-4">
                            Grow your skill with the most reliable online courses and certifications in marketing,
                            information technology,
                            programming, and data science.
                        </p>
                        <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                            <input type="search" placeholder="Find your course" class="form-control me-2">
                            <button type="submit" class="btn btn-primary btn-icon"><i class="bx bx-search"></i></button>
                        </div>
                    </div>
                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                        <img src="../../assets/img/illustrations/pencil-rocket.png" alt="pencil rocket" height="188"
                            class="scaleX-n1-rtl">
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">Proposals List</h5>
                        <p class="text-muted mb-0">Total 6 course you have purchased</p>
                    </div>
                    <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                        <div class="position-relative"><select id="select2_course_select"
                                class="select2 form-select select2-hidden-accessible" data-placeholder="All Courses"
                                data-select2-id="select2_course_select" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">All Courses</option>
                                <option value="all courses">All Courses</option>
                                <option value="ui/ux">UI/UX</option>
                                <option value="seo">SEO</option>
                                <option value="web">Web</option>
                                <option value="music">Music</option>
                                <option value="painting">Painting</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="1" style="width: 127.326px;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-select2_course_select-container"><span
                                            class="select2-selection__rendered w-px-150"
                                            id="select2-select2_course_select-container" role="textbox"
                                            aria-readonly="true"><span class="select2-selection__placeholder">All
                                                Courses</span></span><span class="select2-selection__arrow"
                                            role="presentation"><b role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span></div>

                        <label class="switch">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label text-nowrap mb-0">Hide completed</span>
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4 mb-4">
                        @foreach ($proposals2 as $p)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="rounded-2 text-center mb-3">
                                        {{-- <a href="app-academy-course-details.html"><img class="img-fluid"
                                            src="../../assets/img/pages/app-academy-tutor-1.png" alt="tutor image 1"></a> --}}
                                    </div>
                                    <div class="card-body p-3 pt-2">
                                        <div class=" justify-content-between align-items-left mb-3">
                                            <span
                                                class="badge bg-label-primary">{{ $p->researchTopic->researchTheme->researchCategory->name }}</span>
                                            <span class="badge bg-label-primary">{{ $p->tktType->title }}</span>
                                            <span class="badge bg-label-primary">{{ $p->mainResearchTarget->title }}</span>
                                        </div>
                                        <a href="app-academy-course-details.html" class="h5">
                                            {{ ucfirst($p->users->username) }}</a>
                                        <p href="app-academy-course-details.html" class="mt-2">{{ $p->research_title }}
                                        </p>
                                        @if ($p->approval_vice_rector_2 === null)
                                            <p class="d-flex align-items-center text-secondary"><i
                                                    class="bx bx-info-circle me-2"></i>Not Confirmed</p>
                                        @elseif ($p->approval_vice_rector_2 === 0)
                                            <p class="d-flex align-items-center text-danger"><i
                                                    class="bx bx-x-circle me-2"></i>Disapproved</p>
                                        @else
                                            <p class="d-flex align-items-center text-success"><i
                                                    class="bx bx-check-double me-2"></i>Approved</p>
                                        @endif
                                        @if ($p->approval_vice_rector_2 === null)
                                            <div class="progress mb-4" style="height: 8px">
                                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @elseif ($p->approval_vice_rector_2 === 0)
                                            <div class="progress mb-4" style="height: 8px">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                            </div>
                                        @else
                                            <div class="progress mb-4" style="height: 8px">
                                                <div class="progress-bar w-100" role="progressbar" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if ($p->documents->contains('doc_type_id', 'DC4'))
                                            <a class="w-100 btn btn-label-primary"><i class="bx bx-sync me-2"></i>Laporan
                                                Akhir</a>
                                        @elseif ($p->documents->contains('doc_type_id', 'DC5'))
                                            <a class="w-100 btn btn-label-primary"
                                                href="{{ route('vicerector2.transfer_receipt2', $p->id) }}"><i
                                                    class="bx bx-sync me-2"></i>Pencairan Dana Tahap 2</a>
                                        @elseif ($p->documents->contains('doc_type_id', 'DC3'))
                                            <a class="w-100 btn btn-label-primary"><i class="bx bx-sync me-2"></i>Laporan
                                                Kemajuan</a>
                                        @elseif ($p->bank_id)
                                            <a class="w-100 btn btn-label-primary"
                                                href="{{ route('vicerector2.transfer_receipt', $p->id) }}"><i
                                                    class="bx bx-sync me-2"></i>Pencairan Dana Tahap 1</a>
                                        @elseif ($p->approval_vice_rector_2 === 1)
                                            <a class="w-100 btn btn-label-primary"><i
                                                    class="bx bx-sync me-2"></i>Penerbitan LOA dan Kontrak</a>
                                        @elseif ($p->approval_vice_rector_2 === null)
                                            <div class="d-flex flex-column flex-md-row gap-2 text-nowrap pe-xl-3 pe-xxl-0">
                                                <a class="app-academy-md-50 btn btn-label-danger me-md-2 d-flex align-items-center"
                                                    onclick="disapproveId('{{ $p->id }}')">
                                                    <i class="bx bx-x align-middle me-2" style="cursor:pointer"></i>
                                                    <span>Disapprove</span>
                                                </a>
                                                </a>
                                                <a class="app-academy-md-50 btn btn-label-success me-md-2 d-flex align-items-center"
                                                    onclick="approveId('{{ $p->id }}')">
                                                    <i class="bx bx-check align-middle me-2" style="cursor:pointer"></i>
                                                    <span>Approve</span>
                                                </a>
                                            </div>
                                        @else
                                            <a class="w-100 btn btn-label-danger"><i class="bx bx-x me-2"></i>Ditolak</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        @endforeach

                        <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                            <ul class="pagination">
                                <li class="page-item prev">
                                    <a class="page-link" href="javascript:void(0);"><i
                                            class="tf-icon bx bx-chevron-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="javascript:void(0);">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">5</a>
                                </li>
                                <li class="page-item next">
                                    <a class="page-link" href="javascript:void(0);"><i
                                            class="tf-icon bx bx-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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
                            url: "{{ route('vicerector2.approve') }}",
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
        </script>

        <script>
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
                            url: "{{ route('vicerector2.disapprove') }}",
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

        <script>
            function disappsdadaeId(id) {
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
                            url: "{{ route('vicerector1.disapprove') }}",
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
