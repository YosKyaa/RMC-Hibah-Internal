@extends('layouts.master')

@section('title', 'Vicerector2')
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
        .margin-right {
            margin-right: 20px;
        }

        .margin-left {
            margin-left: 20px;
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
    <div class="app-academy">
        <div class="card p-0 mb-2">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                    {{-- <img src="" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                    data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png"
                    height="90"> --}}
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                    <h2 class="card-title mb-4 lh-sm px-md-5 text-center ">
                        <strong>Halaman Approval.</strong>
                        <span class="text-primary fw-medium text-nowrap">Wakil Rektor II</span>.
                    </h2>
                    <p class="mb-4">
                        Proses persetujuan untuk Wakil Rektor I melibatkan pengelolaan dan peninjauan proposal. Sebagai
                        Wakil Rektor I, Anda memiliki wewenang untuk menyetujui atau menolak proposal penelitian.
                    </p>
                    <form action="/vicerector2" method="GET">
                        <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                            <input type="search" placeholder="Temukan Proposal" name="search" class="form-control me-2"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary btn-icon"><i class="bx bx-search"></i></button>
                        </div>
                    </form>
                </div>
                {{-- <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img src="" alt="pencil rocket" height="188" class="scaleX-n1-rtl">
            </div> --}}
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <div class="col-12 col-md-12 p-3">
                    <div class="col-12 col-lg-7">
                    </div>
                    <div class="d-flex justify-content-between flex-wrap gap-3 me-5">
                        <div class="d-flex align-items-center gap-3 me-4 me-sm-0">
                            <span class=" bg-label-primary p-2 rounded">
                                <i class="bx bx-laptop bx-sm"></i>
                            </span>
                            <div class="content-right">
                                <p class="mb-0">Jumlah Proposal yang <strong>Belum diverifikasi
                                        {{ $NonVerifCount }}</strong> </p>
                                <h4 class="text-primary mb-0"></h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="bg-label-warning p-2 rounded">
                                <i class="bx bx-check-circle bx-sm"></i>
                            </span>
                            <div class="content-right">
                                <p class="mb-0">Jumlah Proposal yang <strong>Telah diverifikasi
                                        {{ $VerifCount }}</strong> </p>
                                <h4 class="text-warning mb-0"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-2 mb-4">
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">List Proposal</h5>
                    <p class="text-muted mb-0">Total <strong>{{ $Total }}</strong> proposal pengajuan yang tersedia.
                    </p>
                </div>
                {{-- <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
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
                                    class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                    aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-select2_course_select-container"><span
                                        class="select2-selection__rendered w-px-150"
                                        id="select2-select2_course_select-container" role="textbox"
                                        aria-readonly="true"><span class="select2-selection__placeholder">All
                                            Courses</span></span><span class="select2-selection__arrow"
                                        role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                </div> --}}
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
                                    <div class="d-flex justify-content-start align-items-center mt-lg-4 mb-3">
                                        <div class="avatar me-3" style="width: 40px; height: 40px;">
                                            @if ($p->users->image)
                                                <img src="{{ asset($p->users->image) }}" alt="Avatar"
                                                    class="rounded-circle" style="width: 100%; height: 100%;">
                                            @else
                                                <img src="{{ asset('/assets/img/avatars/user.png') }}" alt="Avatar"
                                                    class="rounded-circle" style="width: 100%; height: 100%;">
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-truncate" style="font-size: 20px;">
                                                {{ ucfirst($p->users->name) }}
                                            </h6>
                                            @if ($p->users->roles->isNotEmpty())
                                                <small class="text-truncate text-muted"
                                                    style="font-size: 15px;"><em>{{ $p->users->roles->first()->name }}</em></small>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <p href="app-academy-course-details.html" class="mt-2">
                                        <strong>{{ $p->research_title }}</strong></p>
                                    </p>
                                    <hr>
                                    @if ($p->approval_vice_rector_2 === 0)
                                        <span class="text-secondary margin-right"><i
                                                class="bx bx-info-circle me-2"></i><strong>Belum diverifikasi </strong>
                                        </span>
                                    @else
                                        <span class="text-success margin-right"><i
                                                class="bx bx-check-double me-2"></i><strong>Telah
                                                diverifikasi</strong></span>
                                    @endif
                                    <a class="text-warning margin-left" href="../vicerector2/show/{{ $p->id }}"><i
                                            class="bx bx-link me-2"></i>Proposal</a> <br><br>

                                    @if ($p->approval_vice_rector_2 === 0)
                                        <div class="progress mb-4" style="height: 8px">
                                            <div class="progress-bar w-25" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @else
                                        <div class="progress mb-4" style="height: 8px">
                                            <div class="progress-bar w-50" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                    @if ($p->documents->contains('doc_type_id', 'DC4'))
                                        <a class="w-100 btn btn-label-primary"><i class="bx bx-sync me-2"></i>Laporan
                                            Akhir</a>
                                    @elseif ($p->documents->contains('doc_type_id', 'DC5'))
                                        <a class="w-100 btn btn-label-warning"
                                            href="{{ route('vicerector2.transfer_receipt2', $p->id) }}"><i
                                                class="bx bx-upload me-2"></i>Pencairan Dana Tahap 2</a>
                                    @elseif ($p->documents->contains('doc_type_id', 'DC3'))
                                        <a class="w-100 btn btn-label-primary"><i class="bx bx-sync me-2"></i>Laporan
                                            Kemajuan</a>
                                    @elseif ($p->bank_id)
                                        <a class="w-100 btn btn-label-warning"
                                            href="{{ route('vicerector2.transfer_receipt', $p->id) }}"><i
                                                class="bx bx-upload me-2"></i> Pencairan Dana Tahap 1</a>
                                    @elseif ($p->approval_vice_rector_2 === 1)
                                        <a class="w-100 btn btn-label-primary"><i class="bx bx-sync me-2"></i>Menunggu
                                            Penerbitan Kontrak</a>
                                    @elseif ($p->approval_vice_rector_2 === 0)
                                        <a class="w-100 btn btn-label-success"
                                            onclick="approveId('{{ $p->id }}')"><i class="bx bx-check me-2"></i>
                                            Verifikasi</a>
                                    @else
                                        <a class="w-100 btn btn-label-danger"><i class="bx bx-x me-2"></i>Ditolak</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach

                    <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                        {{ $proposals2->links() }}
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
                title: 'Apakah Anda yakin?',
                text: "Anda ingin menyetujui Proposal ini!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, setujui!',
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
                            _token: "{{ csrf_token() }}" // Sertakan token CSRF untuk keamanan
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Disetujui!',
                                    text: 'Proposal telah disetujui.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.reload(); // Muat ulang halaman setelah persetujuan
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
                                text: 'Terjadi kesalahan saat menyetujui Proposal.',
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
