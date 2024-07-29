@extends('layouts.master')
@section('title', 'Annoucements')
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

        .iframe {
            height: 500px;
            width: 100%;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
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
                            <p>
                                Halaman ini menampilkan pengumuman dan informasi terbaru.
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
    <div class="row mb-12 g-6">
        @foreach ($announcements as $anc)
            <div class="col-md-6 col-xl-6 mb-3">
                <div class="card">
                    <div class="card-header flex-grow-0">
                        <div class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                @if ($anc->users->image)
                                    <img src="{{ asset($anc->users->image) }}" class="w-100 rounded-circle">
                                @else
                                    <img src="{{ asset('/assets/img/avatars/user.png') }}" class="w-100 rounded-circle"
                                        id="uploadedAvatar">
                                @endif
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                <div class="me-4">
                                    <h5 class="mb-0">{{ ucfirst($anc->users->name) }}</h5>
                                    <small class="text-muted">{{ $anc->created_at->format('d M Y \a\t h:i A') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        @if (pathinfo($anc->file_path, PATHINFO_EXTENSION) === 'pdf')
                            <iframe src="{{ asset($anc->file_path) }}" class="iframe"></iframe>
                        @else
                            <img src="{{ asset($anc->file_path) }}" class="iframe" alt="">
                        @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($anc->title) }}</h5>
                        <p class="card-text">
                            {{ $anc->description }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Terakhir diperbarui {{ $anc->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    {{--
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
    </div> --}}

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
