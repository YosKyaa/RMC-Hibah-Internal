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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

        i {
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

        li {
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

        .iframe {
            height: 350px;
            width: 100%;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .timeline .timeline-item .timeline-point-wrapper {
            position: absolute;
            top: 1rem;
            left: 0rem;
            z-index: 2;
            display: block;
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


    <div class="row mb-4 g-4">
        <div class="col-12 col-xl-8">
            <div class="card p-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex justify-content-start align-items-center mt-lg-4">
                        <div class="avatar me-3" style="width: 50px; height: 50px;">
                            @if ($proposals->users->image)
                                <img src="{{ asset($proposals->users->image) }}" alt="Avatar" class="rounded-circle"
                                    style="width: 100%; height: 100%;">
                            @else
                                <img src="{{ asset('/assets/img/avatars/user.png') }}" alt="Avatar" class="rounded-circle"
                                    style="width: 100%; height: 100%;">
                            @endif
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-truncate" style="font-size: 20px;">{{ ucfirst($proposals->users->name) }}
                            </h6>
                            @if ($proposals->users->roles->isNotEmpty())
                                <small class="text-truncate text-muted"
                                    style="font-size: 15px;">{{ $proposals->users->roles->first()->name }}</small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body mb-4">
                    <p>
                        @if ($proposals->documents->isNotEmpty() && $documentUrl)
                            <iframe src="{{ $documentUrl }}" class="iframe mb-3"
                                onerror="this.onerror=null; this.outerHTML='Cannot load PDF.';"></iframe><br>
                            <a class="btn btn-primary mb-2" href="{{ $documentUrl }}" target="_blank">
                                <i class="bx bx-import align-middle me-2" style="cursor:pointer"></i>
                                <span>Download</span>
                            </a>
                        @else
                            <p>Tidak ada dokumen yang tersedia.</p>
                        @endif
                    </p>
                    <div class="row g-2 mb-3">
                        <div class="col-sm">
                            <span for="inputAddress2" class="form-label"> JENIS PENELITIAN</span>
                            <input type="text" class="form-control" value="{{ $proposals->researchtype->title }}"
                                readonly disabled>
                        </div>
                        <div class="col-sm">
                            <span for="inputAddress2" class="form-label">TOTAL DANA</span>
                            <input type="text" class="form-control" value="{{ $proposals->researchtype->total_funds }}"
                                readonly disabled>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputAddress2" class="form-label mb-0"> KETEGORI PENELITIAN</label>
                        <input type="text" class="form-control"
                            value="{{ $proposals->researchTopic->researchTheme->researchCategory->name }}" readonly
                            disabled>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputAddress2" class="form-label mb-0">TEMA PENELITIAN</label>
                        <input type="text" class="form-control"
                            value=" {{ $proposals->researchTopic->researchTheme->name }}" readonly disabled>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputAddress2" class="form-label mb-0">TOPIK PENELITIAN</label>
                        <input type="text" class="form-control" value=" {{ $proposals->researchTopic->name }}" readonly
                            disabled>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="inputAddress2" class="form-label mb-0">JUDUL PENELITIAN</label>
                        <input type="text" class="form-control" value=" {{ $proposals->research_title }}" readonly
                            disabled>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-sm">
                            <span for="inputAddress2" class="form-label mb-0">TARGET UTAMA RISET</span>
                            <input type="text" class="form-control" value=" {{ $proposals->mainResearchTarget->title }}"
                                readonly disabled>
                        </div>
                        <div class="col-sm mb-2">
                            <span for="inputAddress2" class="form-label mb-0">JENIS TKT</span>
                            <input type="text" class="form-control" value=" {{ $proposals->tktType->title }}"
                                readonly disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label mb-0">CATATAN</label>
                        <textarea class="form-control" id="inputAddress2" readonly disabled>{{ $proposals->notes }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4 col-md-6">
            <div class="card mb-4 p-4 mt-2" data-aos="fade-left" data-aos-duration="3000">
                <div class="table">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                            <tr>
                                <th>Researcher Team</th>
                                <th class="text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($proposals->proposalTeams as $r)
                                        <div class="d-flex justify-content-start align-items-center mt-lg-2 mb-2">
                                            <div class="avatar me-3">
                                                @if ($r->researcher->image)
                                                    <img src="{{ asset($r->researcher->image) }}" alt="Avatar"
                                                        class="rounded-circle">
                                                @else
                                                    <img src="../../assets/img/avatars/user.png" alt="Avatar"
                                                        class="rounded-circle">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">
                                                    {{ ucfirst($r->researcher->username) }}
                                                </h6>
                                                @if ($r->researcher->roles->isNotEmpty())
                                                    <small
                                                        class="text-truncate text-muted">{{ $r->researcher->roles->first()->name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </td>
                                <td class="text-end">
                                    <div class="user-progress mt-lg-4">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <!--  -->
                <div class="table">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                            <tr>
                                <th>Reviewer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @if ($proposals->reviewer)
                                        <div class="d-flex justify-content-start align-items-center mt-lg-2 mb-2">
                                            <div class="avatar me-3">
                                                @if ($proposals->reviewer->image)
                                                    <img src="{{ asset($proposals->reviewer->image) }}" alt="Avatar"
                                                        class="rounded-circle">
                                                @else
                                                    <img src="../../assets/img/avatars/user.png" alt="Avatar"
                                                        class="rounded-circle">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-truncate">
                                                    {{ ucfirst($proposals->reviewer->username) }}
                                                </h6>
                                                @if ($proposals->reviewer->roles->isNotEmpty())
                                                    <small
                                                        class="text-truncate text-muted">{{ $proposals->reviewer->roles->first()->name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <p>Belum ada reviewer.</p>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="user-progress mt-lg-4">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                            <tr>
                                <th>Timeline</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul class="timeline">
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point-wrapper"><span
                                                    class="timeline-point timeline-point-success"></span></span>
                                            <div>
                                                <div class="timeline-header mb-sm-0 mb-3">
                                                    <h6 class="mb-0">Pengajuan</h6>
                                                    <span class="text-muted"> </span>
                                                    <span class="text-muted">21/2/2024</span>
                                                </div>
                                                <p>
                                                    Approved
                                                </p>
                                            </div>
                </div>
                </li>
                </ul>
                </td>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
    <!--  -->
    </div>
    </div>
    </div>

@endsection

@section('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
