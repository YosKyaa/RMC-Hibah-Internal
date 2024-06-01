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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="order-4 mb-4 full-width">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0">
                            <img src="../../assets/img/sitting-girl-with-laptop-light.png" height="140" alt="Target User"
                                data-app-dark-img="/sitting-girl-with-laptop-light.png"
                                data-app-light-img="/sitting-girl-with-laptop-light.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title">Hi {{ ucfirst(Auth::user()->username) }}!</h5>
                            <p class="mb-4">Silahkan Upload Proposal Anda!</p>

                            <a href="../user-proposals/create" class="btn btn-primary"><span><i
                                        class="bx bx-plus me-sm-2"></i>
                                    <span>Ajukan Hibah</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($proposals as $p)
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="../user-proposals"><i
                            class="bx bx-add-to-queue me-1"></i>
                        Upload</a></li>
                <li class="nav-item"><a class="nav-link" href="../user-proposals/timeline"><i
                            class="bx bx-line-chart me-1"></i>
                        Progres </a></li>
            </ul>
        </div>


        <!-- Timeline Advanced-->
        <!-- <div class="col-xl-6"> -->
        <div class="card">
            {{-- <h5 class="card-header">Progres</h5> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <!--  -->
                    <div class="card border-0 shadow-sm rounded full-width">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">JENIS PENELITIAN</th>
                                    <th scope="col">TOPIK PENELITIAN</th>
                                    <th scope="col">JUDUL PENELITIAN</th>
                                    <th scope="col">TIM PENELITIAN</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $p->researchType->title }}</td>
                                    <td>{{ $p->researchTopic->name }}</td>
                                    <td>{{ $p->research_title }}</td>
                                    @if ($p->researchTeam)
                                        <td>
                                            @foreach ($p->researchTeam as $team)
                                                {{ $team->user->username }}
                                            @endforeach
                                        </td>
                                    @else
                                        <td>Gada</td>
                                    @endif
                                    <td></td>
                                    <td class="text-center">
                                        <a href="#modalToggle" data-bs-toggle="modal" data-bs-target="#modalToggle"
                                            class="bx bx-show-alt badge-dark"></a>
                                        <a class=" text-success" title="Edit" href=""><i
                                                class="bx bxs-edit"></i></a>
                                        <form action="{{ route('user-proposals.delete', $p->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-btn ">Hapus</button>
                                        </form>
                                        <a class=" text-danger" title="Reviewers" style="cursor:pointer" onclick=""><i
                                                class="bx bx-user-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    @endforeach

    </div>
    <!-- /Timeline Advanced-->


@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @if (session('proposals'))
        <script type="text/javascript">
            //swall message notification
            $(document).ready(function() {
                swal(`{!! session('proposals') !!}`, {
                    icon: "info",
                });
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            // ketika category dirubah, theme di isi
            $('#research_categories').change(function() {
                var categoryId = this.value;
                $("#research_themes").html('');
                $("#research_topics").html('');
                $.ajax({
                    url: "{{ route('DOC.get_research_themes_by_id') }}",
                    type: "GET",
                    data: {
                        id: categoryId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#research_themes').html('<option value="">Select Theme</option>');
                        $.each(result, function(key, value) {
                            $("#research_themes").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
            // ketika tema dirubah, topic di isi
            $('#research_themes').change(function() {
                var themeId = this.value;
                $("#research_topics").html('');
                $.ajax({
                    url: "{{ route('DOC.get_research_topics_by_id') }}",
                    type: "GET",
                    data: {
                        id: themeId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#research_topics').html('<option value="">Select Topic</option>');
                        $.each(result, function(key, value) {
                            $("#research_topics").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });


        $('.delete-btn').click(function(proposal) {
            proposal.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
            });
        });
    </script>

@endsection
