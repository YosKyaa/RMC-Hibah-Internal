@extends('layouts.master')
@section('title', 'Proposal')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css " />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div id="stepper1" class="bs-stepper">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#test-l-1">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Submit Proposal</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step active" data-target="#test-l-2">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Revisi</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-3">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Third step</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-4">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Third step</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-l-5">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">5</span>
                                <span class="bs-stepper-label">Third step</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <!-- SLIDE 1 -->
                    <div id="test-l-1" class="content">
                    <div class="mb-3">
                        <label for="selectpickerBasic" class="form-label">Jenis Penelitian</label>
                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                            <option>Rocky</option>
                            <option>Pulp Fiction</option>
                            <option>The Godfather</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="selectpickerLiveSearch" class="form-label">Bidang Penelitian</label>
                        <br>
                        <li>kategori Penelitian</li>
                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                            <option>Rocky</option>
                            <option>Pulp Fiction</option>
                            <option>The Godfather</option>
                        </select>
                        <br>
                        <li>Tema Penelitian</li>
                        <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                        </select>
                        <br>
                        <li>Topik Penelitian</li>
                        <select id="selectpickerLiveSearch" class="selectpicker w-100" data-style="btn-default" data-live-search="true">
                            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                            <option data-tokens="mustard">Burger, Shake and a Smile</option>
                            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Judul Penelitian</label>
                        
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="John Doe" aria-describedby="floatingInputHelp" />
                                <label for="floatingInput">Judul</label>
                        </div>
                        <br>
                        <div class="mb-3">
                        <label for="selectpickerBasic" class="form-label">Jenis TKT</label>
                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                            <option>Rocky</option>
                            <option>Pulp Fiction</option>
                            <option>The Godfather</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label for="selectpickerBasic" class="form-label">Target Utama Riset</label>
                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                            <option>Rocky</option>
                            <option>Pulp Fiction</option>
                            <option>The Godfather</option>
                        </select>
                        </div>
                        <div class="col-sm-12 fv-plugins-icon-container">
                                                <label class="form-label" for="basicDate">Catatan</label>
                                                <div class="input-group input-group-merge has-validation">
                                                    <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan"
                                                        placeholder="Catatan">{{ old('catatan') }}</textarea>
                                                    @error('catatan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                        <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick">
                            Drop files here or click to upload
                            <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                        </form>
                            <br>
                            <button class="btn btn-primary" onclick="stepper1.next()">Submit</button>
                        </div>
                    </div>
                    <!-- SLIDE 2 -->
                        <div id="test-l-2" class="content">
                        <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                        <h1>Hi, <b>{{ Auth::user()->name }}</b>!</h1>
                        {{ __("Proposal sudah dikirim ke Reviewer") }}
                        <br>
                            <p class="mb-2">Status Proposal : </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                        </div>
                        <!-- SLIDE 3 -->
                        <div id="test-l-3" class="content">
                            <p class="text-center">test 3</p>
                            <br>
                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                        </div>
                        <div id="test-l-4" class="content">
                            <p class="text-center">test 4</p>
                            <br>
                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                        </div>
                        <div id="test-l-5" class="content">
                            <p class="text-center">test 5</p>
                            <br>
                            <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                            <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        // var stepper1 = new Stepper(document.querySelector('#stepper1'))

        // stepper1Node.addEventListener('show.bs-stepper', function(event) {
        //     console.warn('show.bs-stepper', event)
        // })
        // stepper1Node.addEventListener('shown.bs-stepper', function(event) {
        //     console.warn('shown.bs-stepper', event)
        // })

        // var stepper2 = new Stepper(document.querySelector('#stepper2'), {
        //     linear: false,
        //     animation: true
        // })
        // var stepper3 = new Stepper(document.querySelector('#stepper3'), {
        //     animation: true
        // })
        // var stepper4 = new Stepper(document.querySelector('#stepper4'))
    $(".selectpicker").selectpicker();
    
    const myDropzone = new Dropzone('#dropzone-basic', {
    previewTemplate: previewTemplate,
    parallelUploads: 1,
    maxFilesize: 5,
    addRemoveLinks: true,
    maxFiles: 1
    });
    </script>
@endsection
