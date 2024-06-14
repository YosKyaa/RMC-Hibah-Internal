{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}
@extends('layouts.master')
@section('title', 'Dashboard')
@section('css')
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            flex: 1 0 30%;
            /* Atur lebar kartu di sini */
            margin: 2.5%;
            /* Atur jarak antar kartu di sini */
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>Hi, <b>{{ Auth::user()->name }}</b>!</h1>
                        {{ __("You're logged in!") }}
                        <br>
                        @if (Auth::user()->roles->count() == 0)
                            <p class="p-0 mb-0 text-danger">Sorry, you don't have access rights, please contact
                                administrator!
                            </p>
                        @else
                            <p class="mb-2">You have access rights as
                                @foreach (Auth::user()->roles as $x)
                                    <i class="badge rounded-pill m-0"
                                        style="background-color:{{ $x->color }}">{{ $x->name }}</i>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  -->
    <head>
  <!-- Pustaka Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
              <span class="avatar-initial rounded bg-warning"><i class="fas fa-apple-alt"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Pangan</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
          <span class="avatar-initial rounded bg-warning"><i class="fas fa-solar-panel"></i></span>
        </div>
        <h4 class="mb-0">0</h4>
      </div>
      <p class="mb-1">Energi</p>
    </div>
  </div>
</div>

<div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-heartbeat"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Kesehatan</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-bus"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Transportasi</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-laptop-code"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Teknologi informasi dan komunikasi</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-shield-alt"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Pertahan dan keamanan</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="bx bx-git-repo-forked"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Material maju</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
              <span class="avatar-initial rounded bg-warning"><i class="fas fa-ship"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Kemaritiman</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-exclamation-triangle"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Kebencanaan</p>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-2 mb-4 me-4.0">
  <div class="card card-border-shadow-warning h-100">
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <div class="avatar me-2">
            <span class="avatar-initial rounded bg-warning"><i class="fas fa-users"></i></span>
          </div>
          <h4 class="ms-1 mb-0">0</h4>
        </div>
        <p class="mb-1">Sosial humaniora, seni budaya, pendidikan</p>
        </p>
      </div>
    </div>
  </div>
    </div>
</div>



    
    <!--  -->
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th>Announcements</th>
            </tr>
        </thead>
    </table>
    @foreach ($announcements as $anc)
        <ul class="list-group">
            <div class="card-container">
                <li class="list-group-item">
                    <br>
                    <div class="card" data-aos="fade-down">
                        <div class="card h-100">
                            <div class="card-header flex-grow-0">
                                <div class="d-flex">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../../assets/img/avatars/user.png" alt="User"
                                            class="w-100 rounded-circle">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                        <div class="me-4">
                                            <h5 class="mb-0">{{ ucfirst(Auth::user()->username) }} Shared Post</h5>
                                            <small
                                                class="text-muted">{{ $anc->created_at->format('d M Y \a\t h:i A') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset($anc->file_path) }}" class="img-fluid" alt="" width="500px"
                                height="500px">
                            <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                <h5 class="mb-0 text-dark">{{ date('d', strtotime($anc->date)) }}</h5>
                                <span class="text-primary">{{ date('F', strtotime($anc->date)) }}</span>
                            </div>
                            <div class="card-body">
                                <h5 class="text-truncate">{{ $anc->title }}</h5>
                                <div class="d-flex gap-2">
                                </div>
                                <div class="d-flex my-3">
                                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $anc->id }}">
                                        Show Description
                                    </button>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="card-actions">
                                        <a href="javascript:;" class="text-muted me-3"><i class="bx bx-heart me-1"></i>
                                            236</a>
                                        <a href="javascript:;" class="text-muted"><i class="bx bx-message me-1"></i> 12</a>
                                    </div>
                                    <div class="dropup d-none d-sm-block">
                                        <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $anc->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $anc->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $anc->id }}">
                                        <p>{{ $anc->title }}</p>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $anc->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
    @endforeach
    </li>
    </div>
    </ul>
@endsection
@section('script')
    <script>
        // Misalkan $anc->date adalah string tanggal dalam format YYYY-MM-DD

        var dateObj = new Date(dateString);

        var day = dateObj.getDate();
        var monthIndex = dateObj.getMonth();
        var year = dateObj.getFullYear();

        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var formattedDate = day + ' ' + monthNames[monthIndex];

        document.write('<h5 class="mb-0 text-dark">' + formattedDate + '</h5>');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-aXFN7iyM3B0A6Bwl4NChKtHd3Y24xigMQ9vpC+k6oNX0w6cklgV+BAGWDqjcpP1r" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
