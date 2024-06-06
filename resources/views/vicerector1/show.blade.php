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
    

<div class="row mb-4 g-4">
  <div class="col-12 col-xl-8">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Data Proposal</h5>
      </div>
      <div class="card-body row g-3">
      <p>
        <iframe src="../announcement/img/surat_pemberitahuan_mekanisma_praktikum_departemen_laboratorium_jgu_-_genap_2023-2004.pdf" style="height: 350px;width: 100%"></iframe><br>
            <a class="btn btn-primary" href="../announcement/img/surat_pemberitahuan_mekanisma_praktikum_departemen_laboratorium_jgu_-_genap_2023-2004.pdf"> 
            <i class="bx bx-import align-middle me-2" style="cursor:pointer"></i>
            <span>Download</span>
            </a>
    </p>

    <div class="row g-3">
        <div class="col-sm">
            <span for="inputAddress2" class="form-label"> JENIS PENELITIAN</span>
            <input type="text" class="form-control">
        </div>
        <div class="col-sm">
            <span for="inputAddress2" class="form-label">TOTAL DANA</span>
            <input type="text" class="form-control">
        </div>
    </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label"> KETEGORI PENELITIAN</label>
            <input type="text" class="form-control" id="inputAddress2">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">TEMA PENELITIAN</label>
            <input type="text" class="form-control" id="inputAddress2">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">TOPIK PENELITIAN</label>
            <input type="text" class="form-control" id="inputAddress2">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">JUDUL PENELITIAN</label>
            <input type="text" class="form-control" id="inputAddress2">
        </div>
    <div class="row g-3">
        <div class="col-sm">
            <span for="inputAddress2" class="form-label">TARGET UTAMA RISET</span>
            <input type="text" class="form-control">
        </div>
        <div class="col-sm">
            <span for="inputAddress2" class="form-label">JENIS TKT</span>
            <input type="text" class="form-control">
        </div>
    </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">CATATAN</label>
            <input type="text" class="form-control" id="inputAddress2">
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-xl-4 col-md-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Popular Instructors</h5>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless border-top">
          <thead class="border-bottom">
            <tr>
              <th>Instructors</th>
              <th class="text-end">courses</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center mt-lg-4">
                  <div class="avatar me-3">
                    <img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-truncate">Nama peneliti/</h6>
                    <small class="text-truncate text-muted">Business Intelligence</small>
                  </div>
                </div>
              </td>
              <td class="text-end">
                <div class="user-progress mt-lg-4">
                  <h6 class="mb-0">33</h6>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!--  -->

  
<!--  -->

       

@endsection

@section('script')
    
@endsection
