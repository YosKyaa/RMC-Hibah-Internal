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
            margin: 2.5%;
        }

        body {
    margin: 0;
    padding: 9;
    font-family: sans-serif;
    background-color: #f1f1f1;
}

/* .container {
    position: relative;
    width: 1200px;
    height: 300px;
    margin: 240px auto;
} */

.container .box {
    position: relative;
    width: calc(250px - 30px);
    height: calc(250px - 30px);
    float: left;
    margin: 15px;
    box-sizing: border-box;
    overflow: hidden;
    border-radius: 10px;
}

.container .box .icon {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #f00;
    transition: 0.7s;
    z-index: 1;
}

.container .box:hover .icon {
    top: 20px;
    left: calc(50% - 40px);
    width: 80px;
    height: 80px;
    border-radius: 50%;
}

.container .box .icon .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 80px;
    transition: 0.7s;
    color: #fff;
}

.container .box:hover .icon .fa {
    font-size: 40px;
}

.container a {
    text-decoration: none;
    color: #fff;
}

.container .box .content {
    position: absolute;
    top: 100px;
    height: calc(100% - 100px);
    text-align: center;
    padding: 20px;
    box-sizing:  border-box;
    transition: 0.7s;
    opacity: 0;
}

.container .box:hover .content {
    top: 100px;
    opacity: 1;
}

.container .box .content h3 {
    margin: 0 0 10px 0;
    padding: 0;
    color: #fff;
    font-size: 24px;
}

.container .box .content p {
    margin: 0;
    padding: 0;
    color: #fff;
}

.container .box:nth-child(1) .icon {
    background: #e07768;
}

.container .box:nth-child(1) {
    background: #f07e6e;
}

.container .box:nth-child(2) .icon {
    background: #6eadd4;
}

.container .box:nth-child(2) {
    background: #84cdfa;
}

.container .box:nth-child(3) .icon {
    background: #4aada9;
}

.container .box:nth-child(3) {
    background: #5ad1cd;
}
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('content')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    </head>

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
                                                <img src="../../assets/img/avatars/user.png" alt="User" class="w-100 rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-4">
                                                    <h5 class="mb-0">{{ ucfirst(Auth::user()->username) }} Shared Post</h5>
                                                    <small class="text-muted">{{ $anc->created_at->format('d M Y \a\t h:i A') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset($anc->file_path) }}" class="img-fluid" alt="" width="500px" height="500px">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 text-dark">{{ date('d', strtotime($anc->date)) }}</h5>
                                        <span class="text-primary">{{ date('F', strtotime($anc->date)) }}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate">{{ $anc->title }}</h5>
                                        <div class="d-flex gap-2"></div>
                                        <div class="d-flex my-3">
                                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $anc->id }}">
                                                Show Description
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="card-actions">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-heart me-1"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-comment me-1"></i> 5</a>
                                            </div>
                                            <div class="d-flex align-items-center avatar-group">
                                                <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
                                                    <img src="../../assets/img/avatars/user.png" alt="Avatar" class="rounded-circle">
                                                </div>
                                                <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Sophia Wilkerson" data-bs-original-title="Sophia Wilkerson">
                                                    <img src="../../assets/img/avatars/user.png" alt="Avatar" class="rounded-circle">
                                                </div>
                                                <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Christina Parker" data-bs-original-title="Christina Parker">
                                                    <img src="../../assets/img/avatars/user.png" alt="Avatar" class="rounded-circle">
                                                </div>
                                                <div class="avatar avatar-sm pull-up">
                                                    <span class="avatar-initial rounded-circle bg-dark text-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="John Doe" data-bs-original-title="John Doe">+42</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal{{ $anc->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                </div>
                            </div>
                        </li>
                    </div>
                </ul>
                @endforeach
    </div>
  </div>

  <!-- Total Income -->
  <div class="col-md-12 col-lg-8 mb-4">
      @foreach ([
                        ['icon' => 'fa-shopping-basket', 'text' => 'Pangan'],
                        ['icon' => 'fa-sun-o', 'text' => 'Energi'],
                        ['icon' => 'fa-heartbeat', 'text' => 'Kesehatan'],
                        ['icon' => 'fa-bus', 'text' => 'Transportasi'],
                        ['icon' => 'fa-laptop', 'text' => 'Teknologi informasi dan komunikasi'],
                        ['icon' => 'fa-shield', 'text' => 'Pertahanan dan keamanan'],
                        ['icon' => 'bx bx-git-repo-forked', 'text' => 'Material maju'],
                        ['icon' => 'fa-ship', 'text' => 'Kemaritiman'],
                        ['icon' => 'fa-exclamation-triangle', 'text' => 'Kebencanaan'],
                        ['icon' => 'fa-users', 'text' => 'Sosial humaniora, seni budaya, pendidikan'],
                    ] as $card)

                    <div class="container">
        <div class="box">
            <div class="icon">
                <i class="fa {{ $card['icon'] }}" aria-hidden="true"></i>
            </div>
            <div class="content">
                <h3>
                    <a target="_blank">0</a>
                </h3>
                <p class="mb-1">{{ $card['text'] }}</p>
            </div>
        </div>
    </div>
      @endforeach
      
    </div>
    <!--/ Total Income -->

  <!--/ Total Income -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-aXFN7iyM3B0A6Bwl4NChKtHd3Y24xigMQ9vpC+k6oNX0w6cklgV+BAGWDqjcpP1r" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
