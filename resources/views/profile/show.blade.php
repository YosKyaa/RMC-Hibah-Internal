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

     <!-- User Profile Content -->
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- About User -->
      <div class="card mb-4">
        <div class="card-body">
            <small class="text-muted text-uppercase">Tentang saya</small>
            <ul class="list-unstyled mb-4 mt-3">
                <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                        class="fw-semibold mx-2">Nama:</span>
                    <span>{{ Auth::user()->name }}</span>
                </li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-user-check"></i><span
                        class="fw-semibold mx-2">Username:</span>
                    <span>{{ Auth::user()->username }}</span>
                </li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-mail-send"></i><span
                        class="fw-semibold mx-2">Email:</span>
                    <span>{{ Auth::user()->email }}</span>
                </li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-briefcase"></i><span
                        class="fw-semibold mx-2">NIDN:</span>
                    <span>{{ Auth::user()->nidn }}</span>
                </li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-home"></i><span
                        class="fw-semibold mx-2">Department:</span>
                    <span>{{ Auth::user()->department }}</span>
                </li>
                <li class="d-flex align-items-center mb-3"><i class="bx bx-home"></i><span
                        class="fw-semibold mx-2">Study Program:</span>
                    <span>{{ Auth::user()->study_program }}</span>
                </li>
            </ul>
        </div>
      </div>
    <!--/ About User -->
    </div>
    
    <div class="col-xl col-lg-5 col-md-5">
      <!-- About User -->
        <div class="card mb-4">
            <div class="card-body">
            @foreach ($proposals as $pr)
                
                        {{-- <div class="card-body">
                            <div class=" justify-content-between align-items-left mb-3">
                                <span
                                    class="badge bg-label-primary">{{ $pr->researchTopic->researchTheme->researchCategory->name }}</span>
                                <span class="badge bg-label-primary">{{ $pr->tktType->title }}</span>
                                <span class="badge bg-label-primary">{{ $pr->mainResearchTarget->title }}</span>
                            </div>
                            <a href="{{ route('user-proposals.show', $pr->id) }}">
                                <p class="mb-3 pb-1"><strong>{{ $pr->research_title }}</strong></p>
                            </a>
                           
                            
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($pr->proposalTeams as $r)
                                            @if ($r->researcher->image)
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                                    <img class="rounded-circle" src="{{ asset($r->researcher->image) }}" alt="Avatar">
                                                </li>
                                            @else
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/user.png" alt="Avatar">
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                
                                <div class="ms-auto">
                                    @if ($pr->status_id == 'S10')
                                    <a href="javascript:;"><span class="badge bg-label-success">Diterima</span></a>
                                    @elseif ($pr->status_id == 'S04')
                                    <a href="javascript:;"><span class="badge bg-label-danger">Ditolak</span></a>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-3">{{ $pr->created_at->diffforhumans() }}</p>
                        </div> --}}
                            <br>
                            <a class="badge bg-label-primary">{{ $pr->researchTopic->researchTheme->researchCategory->name }}</a>
                                <a class="badge bg-label-primary">{{ $pr->tktType->title }}</a>
                                <a class="badge bg-label-primary">{{ $pr->mainResearchTarget->title }}</a>
                                <br> <br>
                                  <div class="rounded-2 text-center">
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($pr->proposalTeams as $r)
                                            @if ($r->researcher->image)
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title=" {{ ucfirst($r->researcher->username) }}" class="avatar avatar-sm pull-up">
                                                    <img class="rounded-circle" src="{{ asset($r->researcher->image) }}" alt="Avatar">
                                                </li>
                                            @else
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title=" {{ ucfirst($r->researcher->username) }}" class="avatar avatar-sm pull-up">
                                                    <img class="rounded-circle" src="../../assets/img/avatars/user.png" alt="Avatar">
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                  </div>
                                  <!-- <div class="card-body"> -->
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                      {{-- <span class="badge bg-label-primary">Web</span> --}}
                                     
                                    </div>
                                    <a href="app-academy-course-details.html" class="h5">  <p class="mb-3 pb-1"><strong>{{ $pr->research_title }}</strong></p></a>
                                    @if ($pr->status_id == 'S10')
                                    <a href="javascript:;"><span class="badge bg-label-success col-lg-12 mb-3">Diterima</span></a>
                                    @elseif ($pr->status_id == 'S04')
                                    <a href="javascript:;"><span class="badge bg-label-danger col-lg-12 mb-3">Ditolak</span></a>
                                    @elseif ($pr->status_id == 'S01')
                                    <a href="javascript:;"><span class="badge bg-label-warning col-lg-12 mb-3">Menunggu</span></a>
                                    @endif
                                    
                                    <br> <br>
                                    <!-- </div> -->
                                    <p class="d-flex align-items-center mb-1"><i class="bx bx-time-five me-1"></i>{{ $pr->created_at->diffforhumans() }}</p>
                                    <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                      <a class="w-100 btn btn-label-secondary d-flex align-items-center" href="{{ route('profile.details', encrypt($pr->id)) }}">
                                        <i class="bx bx-rotate-right bx-sm align-middle scaleX-n1-rtl me-2"></i><span>Lihat Proposal</span>
                                      </a>
                                    
                                    </div>
                               
            @endforeach
        </div>
    </div>

</div>
        <!-- / Content -->
</div>
@endsection
