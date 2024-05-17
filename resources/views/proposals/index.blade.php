@extends('layouts.master')
@section('title', 'Proposal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
@endsection

@section('style')
    <style> 
*, *::before, *::after {
    box-sizing: border-box;
}
.timeline .timeline-item .timeline-indicator i, .timeline .timeline-item .timeline-indicator-advanced i {
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
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
user agent stylesheet
i {
    font-style: italic;
}
.timeline .timeline-item .timeline-indicator, .timeline .timeline-item .timeline-indicator-advanced {
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
user agent stylesheet
li {
    text-align: -webkit-match-parent;
}
.timeline {
    position: relative;
    height: 100%;
    width: 100%;
    padding: 0;
    list-style: none;
}
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Extended UI /</span> Basic Timeline
        </h4>

        <div class="row">
            <!-- Timeline Basic-->
            <div class="col-xl-6 mb-4 mb-xl-0">
                <div class="card">
                    <h5 class="card-header">Basic</h5>
                    <div class="card-body">
                        <ul class="timeline">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-3">
                                        <h6 class="mb-0">Get on the flight</h6>
                                        <span class="text-muted">3rd October</span>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                        <div>
                                            <span>Charles de Gaulle Airport, Paris</span>
                                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                                            <span>Heathrow Airport, London</span>
                                        </div>
                                        <div>
                                            <span class="text-muted">6:30 AM</span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <i class="bx bx-link"></i>
                                        bookingCard.pdf
                                    </a>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-success"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-sm-0 mb-3">
                                        <h6 class="mb-0">Design Review</h6>
                                        <span class="text-muted">4th October</span>
                                    </div>
                                    <p>
                                        Weekly review of freshly prepared design for our new
                                        application.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <h6>New Application</h6>
                                        <div class="d-flex">
                                            <div class="avatar avatar-xs me-2">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-xs">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-danger"></span></span>
                                <div class="timeline-event">
                                    <div class="d-flex flex-sm-row flex-column">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/elements/16.jpg"
                                            class="rounded me-3" alt="Shoe img" height="62" width="62">
                                        <div>
                                            <div class="timeline-header flex-wrap mb-2 mt-3 mt-sm-0">
                                                <h6 class="mb-0">Sold Puma POPX Blue Color</h6>
                                                <span class="text-muted">5th October</span>
                                            </div>
                                            <p>
                                                PUMA presents the latest shoes from its collection. Light &amp;
                                                comfortable made with highly durable material.
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-sm-row flex-column text-sm-center">
                                        <div class="customer mb-sm-0 mb-2">
                                            <p class="mb-0">Customer</p>
                                            <span class="text-muted">Micheal Scott</span>
                                        </div>
                                        <div class="price mb-sm-0 mb-2">
                                            <p class="mb-0">Price</p>
                                            <span class="text-muted">$375.00</span>
                                        </div>
                                        <div class="price">
                                            <p class="mb-0">Quantity</p>
                                            <span class="text-muted">1</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-info"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Interview Schedule</h6>
                                        <span class="text-muted">6th October</span>
                                    </div>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Possimus quos, voluptates voluptas rem veniam expedita.
                                    </p>
                                    <hr>
                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                        <div class="d-flex flex-wrap">
                                            <div class="avatar me-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div>
                                                <p class="mb-0">Rebecca Godman</p>
                                                <span class="text-muted">Javascript Developer</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                            <i class="bx bx-message me-2"></i>
                                            <i class="bx bx-phone-call"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-warning"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">2 Notifications</h6>
                                        <span class="text-muted">7th October</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul
                                                    class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                            alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png"
                                                            alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Julee Rossignol"
                                                        data-bs-original-title="Julee Rossignol">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                                            alt="Avatar">
                                                    </li>
                                                </ul>
                                                <span>Commented on your post.</span>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm my-sm-0 my-3">
                                                View
                                            </button>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex align-items-center">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                                    class="rounded-circle me-3" alt="avatar" height="24"
                                                    width="24">
                                                <div class="user-info">
                                                    <p class="my-0">Dwight repaid you</p>
                                                    <span class="text-muted">30 minutes ago</span>
                                                </div>
                                            </div>
                                            <h5 class="mb-0">$20</h5>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="timeline-end-indicator">
                                <i class="bx bx-check-circle"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Timeline Basic -->

            <!-- Timeline Advanced-->
            <div class="col-xl-6">
                <div class="card">
                    <h5 class="card-header">Advanced</h5>
                    <div class="card-body">
                        <ul class="timeline pt-3">
                            <li class="timeline-item pb-4 timeline-item-primary border-left-dashed">
                                <span class="timeline-indicator-advanced timeline-indicator-primary">
                                    <i class="bx bx-paper-plane"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-3">
                                        <h6 class="mb-0">Get on the flight</h6>
                                        <span class="text-muted">3rd October</span>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                        <div>
                                            <span>Charles de Gaulle Airport, Paris</span>
                                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                                            <span>Heathrow Airport, London</span>
                                        </div>
                                        <div>
                                            <span>6:30 AM</span>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <i class="bx bx-link"></i>
                                        bookingCard.pdf
                                    </a>
                                </div>
                            </li>
                            <li class="timeline-item pb-4 timeline-item-success border-left-dashed">
                                <span class="timeline-indicator-advanced timeline-indicator-success">
                                    <i class="bx bx-paint"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-sm-0 mb-3">
                                        <h6 class="mb-0">Design Review</h6>
                                        <span class="text-muted">4th October</span>
                                    </div>
                                    <p>
                                        Weekly review of freshly prepared design for our new
                                        application.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <h6>New Application</h6>
                                        <div class="d-flex">
                                            <div class="avatar avatar-xs me-2">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div class="avatar avatar-xs">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item pb-4 timeline-item-danger border-left-dashed">
                                <span class="timeline-indicator-advanced timeline-indicator-danger">
                                    <i class="bx bx-shopping-bag"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="d-flex flex-sm-row flex-column">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/elements/16.jpg"
                                            class="rounded me-3" alt="Shoe img" height="62" width="62">
                                        <div>
                                            <div class="timeline-header flex-wrap mb-2 mt-3 mt-sm-0">
                                                <h6 class="mb-0">Sold Puma POPX Blue Color</h6>
                                                <span class="text-muted">5th October</span>
                                            </div>
                                            <p>
                                                PUMA presents the latest shoes from its collection. Light &amp;
                                                comfortable made with highly durable material.
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-sm-row flex-column text-center">
                                        <div class="mb-sm-0 mb-2">
                                            <p class="mb-0">Customer</p>
                                            <span class="text-muted">Micheal Scott</span>
                                        </div>
                                        <div class="mb-sm-0 mb-2">
                                            <p class="mb-0">Price</p>
                                            <span class="text-muted">$375.00</span>
                                        </div>
                                        <div>
                                            <p class="mb-0">Quantity</p>
                                            <span class="text-muted">1</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item pb-4 timeline-item-info border-left-dashed">
                                <span class="timeline-indicator-advanced timeline-indicator-info">
                                    <i class="bx bx-user-circle"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">Interview Schedule</h6>
                                        <span class="text-muted">6th October</span>
                                    </div>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Possimus quos, voluptates voluptas rem veniam expedita.
                                    </p>
                                    <hr>
                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                        <div class="d-flex flex-wrap">
                                            <div class="avatar me-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                                    alt="Avatar" class="rounded-circle">
                                            </div>
                                            <div>
                                                <p class="mb-0">Rebecca Godman</p>
                                                <span class="text-muted">Javascript Developer</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                            <i class="bx bx-message-rounded-dots me-2"></i>
                                            <i class="bx bx-phone-call"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item pb-4 timeline-item-dark border-left-dashed">
                                <span class="timeline-indicator-advanced timeline-indicator-dark">
                                    <i class="bx bx-bell"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="timeline-header">
                                        <h6 class="mb-0">2 Notifications</h6>
                                        <span class="text-muted">7th October</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul
                                                    class="list-unstyled users-list d-flex align-items-center avatar-group m-0 my-3 me-2">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Vinnie Mostowy"
                                                        data-bs-original-title="Vinnie Mostowy">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                            alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/12.png"
                                                            alt="Avatar">
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                        aria-label="Julee Rossignol"
                                                        data-bs-original-title="Julee Rossignol">
                                                        <img class="rounded-circle"
                                                            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/6.png"
                                                            alt="Avatar">
                                                    </li>
                                                </ul>
                                                <span>Commented on your post.</span>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm my-sm-0 my-3">
                                                View
                                            </button>
                                        </li>
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex flex-sm-row flex-column align-items-center">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                                    class="rounded-circle me-3" alt="avatar" height="24"
                                                    width="24">
                                                <div class="user-info">
                                                    <p class="my-0">Dwight repaid you</p>
                                                    <span class="text-muted">30 minutes ago</span>
                                                </div>
                                            </div>
                                            <h5 class="mb-0">$20</h5>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="timeline-end-indicator">
                                <i class="bx bx-check-circle"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Timeline Advanced-->
        </div>

    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        var stepper1Node = document.querySelector('#stepper1')
        var stepper1 = new Stepper(document.querySelector('#stepper1'))

        stepper1Node.addEventListener('show.bs-stepper', function(event) {
            console.warn('show.bs-stepper', event)
        })
        stepper1Node.addEventListener('shown.bs-stepper', function(event) {
            console.warn('shown.bs-stepper', event)
        })

        var stepper2 = new Stepper(document.querySelector('#stepper2'), {
            linear: false,
            animation: true
        })
        var stepper3 = new Stepper(document.querySelector('#stepper3'), {
            animation: true
        })
        var stepper4 = new Stepper(document.querySelector('#stepper4'))
    </script>
@endsection
