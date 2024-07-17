@extends('layouts.master')
@section('title', 'Dashboard')
@section('css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection
@section('style')
    <style>
        .card-border-shadow-primary {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #e1a440;
        }

        .card-border-shadow-primary:hover {
            border-bottom: 3px solid #e1a440;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .card-border-shadow-warning {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #FFFF00;
        }

        .card-border-shadow-warning:hover {
            border-bottom: 3px solid #FFFF00;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .card-border-shadow-danger {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #FF0000;
        }

        .card-border-shadow-danger:hover {
            border-bottom: 3px solid #FF0000;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .card-border-shadow-info {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #00FFFF;
        }

        .card-border-shadow-info:hover {
            border-bottom: 3px solid #00FFFF;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .card-border-shadow-success {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #008000;
        }

        .card-border-shadow-success:hover {
            border-bottom: 3px solid #008000;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .card-border-shadow-dark {
            transition: all 0.3s ease-in-out;
            border-bottom: 1px solid #000000;
        }

        .card-border-shadow-dark:hover {
            border-bottom: 3px solid #000000;
            /* Warna border (biru) */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            /* Shadow di bagian bawah */
            transition: all 0.3s ease-in-out;
        }
        .img {
            width: 15%;
            object-fit: cover;

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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title mb-1"><span id="greeting">Selamat Pagi,</span> <strong><span
                                        style="text-transform: capitalize; font-size: 30px;">{{ Auth::user()->name }}
                                        👋🏻</span></strong>
                            </h3>
                            <p>Kamu memiliki akses sebagai @foreach (Auth::user()->roles as $x)
                                    <i class="badge rounded-pill bg-label"
                                        style="background-color:{{ $x->color }}">{{ $x->name }}</i>
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-end">
                                <img src="{{ asset('/assets/img/dashboard/Day.svg') }}" alt="" class="img">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="col-md-12 mb-1">
        <h4 class="responsive-text"> <strong>Rekaputulasi usulan Hibah Internal di Jakarta Global University</strong>
        </h4>
    </div>
    <div class="row g-6">
        <!-- Card Border Shadow -->
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-primary"><i
                                    class="bx bx-baguette bx-md"></i></span>
                        </div>
                        <h3 class="mb-0"><strong>{{ $panganCount }}</strong></h3>
                    </div>
                    <p class="mb-2" style="font-size: large;">Pangan</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">+18.2%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-warning"><i class='bx bxl-react bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">8</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Energi</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-8.7%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-danger"><i
                                    class='bx bx-heart bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">27</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Kesehatan</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">+4.3%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-info"><i class='bx bx-car bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Transportasi</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-success"><i class='bx bx-shield-quarter bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Pertahanan dan keamanan</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-dark h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-dark"><i class='bx bx-git-repo-forked bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Material maju</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-info"><i class='bx bxl-digitalocean bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Kemaritiman</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-error bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Kebencanaan</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-laptop bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Teknologi informasi dan komunikasi</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-street-view bx-md'></i></span>
                        </div>
                        <h4 class="mb-0">13</h4>
                    </div>
                    <p class="mb-2" style="font-size: large;">Sosial humaniora, seni budaya, pendidikan</p>
                    <p class="mb-0">
                        <span class="text-heading fw-medium me-2">-2.5%</span>
                        <span class="text-muted">than last week</span>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="row">
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
                                                <div
                                                    class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                    <div class="me-4">
                                                        <h5 class="mb-0">{{ ucfirst(Auth::user()->username) }}
                                                            Shared Post</h5>
                                                        <small
                                                            class="text-muted">{{ $anc->created_at->format('d M Y \a\t h:i A') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset($anc->file_path) }}" class="img-fluid" alt=""
                                            width="500px" height="500px">
                                        <div
                                            class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                            <h5 class="mb-0 text-dark">{{ date('d', strtotime($anc->date)) }}
                                            </h5>
                                            <span class="text-primary">{{ date('F', strtotime($anc->date)) }}</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="text-truncate">{{ $anc->title }}</h5>
                                            <div class="d-flex gap-2"></div>
                                            <div class="d-flex my-3">
                                                <button type="button" class="btn btn-primary ms-auto"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $anc->id }}">
                                                    Show Description
                                                </button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="card-actions">
                                                    <a href="javascript:;" class="text-muted me-3"><i
                                                            class="bx bx-heart me-1"></i> 236</a>
                                                    <a href="javascript:;" class="text-muted"><i
                                                            class="bx bx-comment me-1"></i> 5</a>
                                                </div>
                                                <div class="d-flex align-items-center avatar-group">
                                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Lilian Fuller"
                                                        data-bs-original-title="Lilian Fuller">
                                                        <img src="../../assets/img/avatars/user.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Sophia Wilkerson"
                                                        data-bs-original-title="Sophia Wilkerson">
                                                        <img src="../../assets/img/avatars/user.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Christina Parker"
                                                        data-bs-original-title="Christina Parker">
                                                        <img src="../../assets/img/avatars/user.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div class="avatar avatar-sm pull-up">
                                                        <span class="avatar-initial rounded-circle bg-dark text-white"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            aria-label="John Doe"
                                                            data-bs-original-title="John Doe">+42</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal{{ $anc->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Description</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ $anc->description }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
    </div>

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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // greeting
        var today = new Date()
        var curHr = today.getHours()

        if (curHr >= 0 && curHr < 4) {
            document.getElementById("greeting").innerHTML = 'Selamat Malam,';
        } else if (curHr >= 4 && curHr < 12) {
            document.getElementById("greeting").innerHTML = 'Selamat Pagi,';
        } else if (curHr >= 12 && curHr < 16) {
            document.getElementById("greeting").innerHTML = 'Selamat Siang,';
        } else {
            document.getElementById("greeting").innerHTML = 'Selamat Sore,';
        }
        // time
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            // var s = today.getSeconds();
            var ampm = h >= 12 ? 'PM' : 'AM';
            h = h % 12;
            h = h ? h : 12;
            m = checkTime(m);
            // s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ' ' + ampm;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        startTime();
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection
