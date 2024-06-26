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
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('content')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <div class="container">
        <div class="row">
            <!-- Bagian Kiri -->
            <div class="col-lg-6">
                <div class="row">
                    @foreach ([
                        ['icon' => 'fa-apple-alt', 'text' => 'Pangan'],
                        ['icon' => 'fa-solar-panel', 'text' => 'Energi'],
                        ['icon' => 'fa-heartbeat', 'text' => 'Kesehatan'],
                        ['icon' => 'fa-bus', 'text' => 'Transportasi'],
                        ['icon' => 'fa-laptop-code', 'text' => 'Teknologi informasi dan komunikasi'],
                        ['icon' => 'fa-shield-alt', 'text' => 'Pertahanan dan keamanan'],
                        ['icon' => 'bx bx-git-repo-forked', 'text' => 'Material maju'],
                        ['icon' => 'fa-ship', 'text' => 'Kemaritiman'],
                        ['icon' => 'fa-exclamation-triangle', 'text' => 'Kebencanaan'],
                        ['icon' => 'fa-users', 'text' => 'Sosial humaniora, seni budaya, pendidikan'],
                    ] as $card)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card card-border-shadow-warning h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-warning"><i class="fas {{ $card['icon'] }}"></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">0</h4>
                                </div>
                                <p class="mb-1">{{ $card['text'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Bagian Kanan -->
            <div class="col-lg-6">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Pengumuman</th>
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
