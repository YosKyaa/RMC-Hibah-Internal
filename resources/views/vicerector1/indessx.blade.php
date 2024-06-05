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
    <div class="container-xxl flex-grow-1 container-p-y" data-select2-id="9">



        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Academy/</span> My Courses</h4>

        <div class="app-academy" data-select2-id="8">
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

            <div class="card mb-4" data-select2-id="7">
                <div class="card-header d-flex flex-wrap justify-content-between gap-3" data-select2-id="6">
                    <div class="card-title mb-0 me-1">
                        <h5 class="mb-1">My Courses</h5>
                        <p class="text-muted mb-0">Total 6 course you have purchased</p>
                    </div>
                    <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap" data-select2-id="5">
                        <div class="position-relative" data-select2-id="4"><select id="select2_course_select"
                                class="select2 form-select select2-hidden-accessible" data-placeholder="All Courses"
                                data-select2-id="select2_course_select" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">All Courses</option>
                                <option value="all courses" data-select2-id="15">All Courses</option>
                                <option value="ui/ux" data-select2-id="16">UI/UX</option>
                                <option value="seo" data-select2-id="17">SEO</option>
                                <option value="web" data-select2-id="18">Web</option>
                                <option value="music" data-select2-id="19">Music</option>
                                <option value="painting" data-select2-id="20">Painting</option>
                            </select><span
                                class="select2 select2-container select2-container--default select2-container--below"
                                dir="ltr" data-select2-id="1" style="width: 127.326px;"><span class="selection"><span
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
                        @foreach ($proposals as $p)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card p-2 h-100 shadow-none border">
                                    <div class="card-body p-3 pt-2">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span
                                                class="badge bg-label-primary">{{ $p->researchTopic->researchTheme->researchCategory->name }}</span>
                                            <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                                4.4 <span class="text-warning"><i
                                                        class="bx bxs-star me-1"></i></span><span
                                                    class="text-muted">(1.23k)</span>
                                            </h6>
                                        </div>
                                        <a href="app-academy-course-details.html" class="h5">
                                            {{ ucfirst($p->users->name) }}</a>
                                        <p class="mt-2">{{ $p->research_title }}</p>
                                        <p class="d-flex align-items-center"><i class="bx bx-time-five me-2"></i>30
                                            minutes</p>
                                        <div class="progress mb-4" style="height: 8px">
                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row gap-2 text-nowrap pe-xl-3 pe-xxl-0">
                                            <form action="{{ route('vicerector1.approve', $p->id) }}" method="POST">
                                                @csrf
                                                <button type="button" onclick="approveProposal(event)"
                                                    data-proposal-id="{{ $p->id }}"
                                                    class="app-academy-md-50 btn btn-label-primary btn-success d-flex align-items-center">
                                                    <span class="me-2">Approve</span><i
                                                        class="bx bx-chevron-right lh-1 scaleX-n1-rtl"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('vicerector1.reject', $p->id) }}" method="POST">
                                                @csrf
                                                <button type="button" onclick="rejectProposal(event)"
                                                    data-proposal-id="{{ $p->id }}"
                                                    class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center">
                                                    <i class="bx bx-sync align-middle me-2 "></i><span>Disapprove</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach

            <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                <ul class="pagination">
                    <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
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
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
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
    <script>
        function approveProposal(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tombol submit

            var proposalId = event.target.getAttribute('data-proposal-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You want to approve this proposal?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approve it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Melakukan aksi persetujuan di sini
                    window.location.href = "/vicerector1/approve/" + proposalId;
                }
            });
        }

        function rejectProposal(event) {
            event.preventDefault(); // Menghentikan perilaku default dari tombol submit

            var proposalId = event.target.getAttribute('data-proposal-id');

            Swal.fire({
                title: "Are you sure?",
                text: "You want to reject this proposal?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, reject it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Melakukan aksi penolakan di sini
                    window.location.href = "/vicerector1/reject/" + proposalId;
                }
            });
        }
    </script>
@endsection
