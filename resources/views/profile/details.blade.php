@extends('layouts.master')
@section('title', 'Profil')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Akun /</span>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('style')
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTable td:nth-child(2) {
            max-width: 200px;
        }

        table.dataTable td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .user-profile-header-banner img {
            width: 100%;
            object-fit: cover;
            height: 250px;
        }

        .rounded-top {
            border-top-left-radius: .375rem !important;
            border-top-right-radius: .375rem !important;
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

    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            <img src="{{ asset('assets/img/background.png') }}" class="rounded-top" width="100%"
                                height="250px" style="object-fit: cover;">
                        </div>
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                <img src="{{ Auth::user()->image() }}"
                                    class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" width="100px">
                            </div>
                            <div class="flex-grow-1 mt-4">
                                <div
                                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h4><strong>{{ strtoupper(Auth::user()->name) }}</strong></h4>
                                        <ul
                                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item fw-semibold">
                                                {{ Auth::user()->email }}
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('profile.edit', ['id' => Crypt::encrypt(Auth::user()->id)]) }}"
                                        class="btn btn-primary text-nowrap">
                                        <i class='bx bx-user-check'></i> {{ Auth::user()->username }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Header -->

            <div class="row mb-3 g-4">
                <div class="col-12 col-xl-8">
                    <div class="card p-3">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex justify-content-start align-items-center mt-lg-4">
                               
                               
                            </div>
                        </div>
        
                        <div class="card-body mb-4">
                            <p>
                                @if ($proposals->documents->isNotEmpty() && $documentUrl)
                                    <iframe src="{{ $documentUrl }}" class="iframe mb-3"
                                        onerror="this.onerror=null; this.outerHTML='Cannot load PDF.';"></iframe><br>
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
                                    <input type="text" class="form-control"
                                        value=" {{ $proposals->mainResearchTarget->title }}" readonly disabled>
                                </div>
                                <div class="col-sm mb-2">
                                    <span for="inputAddress2" class="form-label mb-0">JENIS TKT</span>
                                    <input type="text" class="form-control" value=" {{ $proposals->tktType->title }}"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label mb-0">CATATAN</label>
                                <p>{!! $proposals->notes !!}</p>
                            </div>
        
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-xl-4 col-md-6">
                    <div class="card mb-4 p-4 " data-aos="fade-left" data-aos-duration="2000">
                        <div class="table">
                            <table class="table table-borderless border-top">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>Tim Peneliti</th>
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
                                                <p>-</p>
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
                        {{-- <div class="table-responsive">
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
                </div> --}}
                        <div class="table">
                            <table class="table table-borderless border-top">
                                <thead class="border-bottom">
                                    <tr>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Review Pengajuan
                                        </td>
                                        <td class="text-end">
                                            <div class="user-progress">
                                                <h6 class="mb-0">
                                                    @if ($proposals->approval_reviewer)
                                                        <span class="badge bg-label-success">Lolos</span>
                                                    @elseif ($proposals->status_id == 'S04')
                                                        <span class="badge bg-label-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-label-secondary">-</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                    </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Verifikasi Warek I
                                        </td>
                                        <td class="text-end">
                                            <div class="user-progress">
                                                <h6 class="mb-0">
                                                    @if ($proposals->approval_vice_rector_1)
                                                        <span class="badge bg-label-success">Telah Terverifikasi</span>
                                                    @else
                                                        <span class="badge bg-label-secondary">-</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>
                                            Verifikasi Warek II
                                        </td>
                                        <td class="text-end">
                                            <div class="user-progress">
                                                <h6 class="mb-0">
                                                    @if ($proposals->approval_vice_rector_2)
                                                        <span class="badge bg-label-success">Telah Terverifikasi</span>
                                                    @else
                                                        <span class="badge bg-label-secondary">-</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                       
                    </div>
        
                    <!--  -->
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- / Content -->
@endsection
