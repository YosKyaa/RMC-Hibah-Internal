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
            <div class="card p-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="card-title mb-1"><span id="greeting">Selamat Pagi,</span> <strong><span
                                        style="text-transform: capitalize; font-size: 30px;">{{ Auth::user()->name }}
                                        👋🏻</span></strong>
                            </h2>
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
    <div class="col-md-12 mb-1">
        <h4 class="responsive-text"> <strong>Rekaputulasi usulan Riset Mandiri berdasarkan Program Studi</strong>
        </h4>
    </div>
    <div class="row g-6 mb-3">
        <!-- Card Border Shadow -->
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/informatics.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknik Informatika</p>
                    </div>

                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{ $panganCount }} / {{ $panganCount2 }}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/civil-engineering.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknik Sipil</p>
                    </div>
                     <p class="mb-0">
                     <h3 class="mb-0 text-center"><strong>{{$energiCount}} / {{$energiCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/engineering.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknik Elektro</p>
                    </div>
                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$kesehatanCount}} / {{$kesehatanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/factory.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknik Industri</p>
                    </div>

                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$transportasiCount}} / {{$transportasiCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/machine.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknik Mesin</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$pertahananCount}} / {{$pertahananCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-dark h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/project-management.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Management</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$majuCount}} / {{$majuCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/digital-marketing.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Bisnis Digital</p>
                    </div>
                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$keamaritimanCount}} / {{$keamaritimanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/accountant.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Akuntansi</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$kebencanaanCount}} / {{$kebencanaanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-1">
        <h4 class="responsive-text"> <strong>Rekaputulasi usulan Riset Mandiri berdasarkan Kategori</strong>
        </h4>
    </div>
    <div class="row g-6">
        <!-- Card Border Shadow -->
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/diet.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Pangan</p>
                    </div>

                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{ $panganCount }} / {{ $panganCount2 }}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/flash.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Energi</p>
                    </div>
                     <p class="mb-0">
                     <h3 class="mb-0 text-center"><strong>{{$energiCount}} / {{$energiCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/healthcare.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Kesehatan</p>
                    </div>
                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$kesehatanCount}} / {{$kesehatanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/vehicles.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Transportasi</p>
                    </div>

                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$transportasiCount}} / {{$transportasiCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/army.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Pertahanan dan Keamanan</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$pertahananCount}} / {{$pertahananCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-dark h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/raw-materials.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Material Maju</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$majuCount}} / {{$majuCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/maritime-laws.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Kemaritiman</p>
                    </div>
                    <p class="mb-0">
                    <h3 class="mb-0 text-center"><strong>{{$keamaritimanCount}} / {{$keamaritimanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-3">
            <div class="card card-border-shadow-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/disaster.png') }}" alt="">
                        </div>
                        <p style="width: 65%; font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> kategori Kebencanaan</p>
                    </div>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$kebencanaanCount}} / {{$kebencanaanCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-border-shadow-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/robotic-hand.png') }}" alt="">
                        </div>
                    </div>
                    <p style="font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Teknologi informasi dan komunikasi</p>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$tiCount}} / {{$tiCount2}}</strong></h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card card-border-shadow-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/dashboard/education.png') }}" alt="">
                        </div>
                    </div>
                    <p style="font-size: smaller;">Jumlah usulan <strong>draft / submited</strong> Sosial humaniora, seni budaya, pendidikan</p>
                    <p class="mb-0">
                        <h3 class="mb-0 text-center"><strong>{{$sosialHumanioraCount}} / {{$sosialHumanioraCount2}}</strong></h3>
                    </p>
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
