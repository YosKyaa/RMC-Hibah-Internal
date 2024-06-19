@extends('layouts.master')
@section('title', 'Submit Proposal')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4> --}}
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4 p-4">
                <div class="card-header d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Please Complete Your Details Below!</h4> <small class="text-muted float-end">Upload
                        Proposal</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST" action="{{ route('user-proposals.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col sm mb-4">
                                <label class="form-label">Jenis Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select @error('research_type') is-invalid @enderror class="select2"
                                        name="research_type" id="research_type" data-style="btn-default">
                                        <option value="">-- Pilih Jenis Penelitian --</option>
                                        @foreach ($researchtypes as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('research_type') ? 'selected' : '' }}>
                                                {{ $d->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col sm mb-4">
                                <label class="form-label">Total Dana</label>
                                <input type="text" class="form-control" id="researchtypesId"
                                    aria-describedby="defaultFormControlHelp" readonly disabled />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Kategori
                                Penelitian</label>
                            <div class="input-group input-group-merge has-validation">
                                <select class="form-select @error('research_categories') is-invalid @enderror select2"
                                    name="research_categories" id="research_categories"
                                    data-placeholder="-- Pilih Kategori Penelitian--">
                                    <option value="">-- Pilih Kategori Penelitian --</option>
                                    @foreach ($researchcategories as $d)
                                        <option value="{{ $d->id }}"
                                            {{ $d->id == old('research_categories') ? 'selected' : '' }}>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('research_categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tema
                                Penelitian</label>
                            <div class="input-group input-group-merge has-validation">
                                <select class="form-select @error('research_themes') is-invalid @enderror select2"
                                    name="research_themes" id="research_themes"
                                    data-placeholder="-- Pilih Tema Penelitian--">
                                    <option value="">-- Pilih Tema Penelitian --</option>
                                    @foreach ($researchthemes as $d)
                                        <option value="{{ $d->id }}"
                                            {{ $d->id == old('research_themes') ? 'selected' : '' }}>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('research_themes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label">Topik
                                    Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select class="form-select @error('research_topics') is-invalid @enderror select2"
                                        name="research_topics" id="research_topics"
                                        data-placeholder="-- Pilih Topik Penelitian--">
                                        <option value="">-- Pilih Topik Penelitian --</option>
                                        @foreach ($researchtopics as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $d->id == old('research_topics') ? 'selected' : '' }}>
                                                {{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('research_topics')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">Judul Penelitian</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text" class="form-control @error('research_title') is-invalid @enderror"
                                        name="research_title" placeholder=" Judul Penelitian"
                                        value="{{ old('research_title') }}">
                                    @error('research_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group input-group-merge has-validation">
                                    <label for="select2Multiple" class="form-label">Tim Peneliti</label>
                                    <select id="select2Multiple"
                                        class="select2 form-select @error('researcher_id') is-invalid @enderror"
                                        name="researcher_id[]" id="researcher_id" multiple>
                                        <option value="" disabled selected>-- Pilih Tim Peneliti --</option>
                                        @foreach ($users as $user)
                                            @if (!in_array($user->id, $existingResearchers))
                                                <option value="{{ $user->id }}"
                                                    {{ in_array($user->id, old('researcher_id', [])) ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('researcher_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div id="defaultFormControlHelp" class="form-text">Silahkan Pilih Tim Peneliti Max 2.
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col sm mb-4">
                                    <label for="" class="form-label">Jenis
                                        TKT</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <select class="form-select @error('tkt_type') is-invalid @enderror select2"
                                            name="tkt_type" id="tkt_type" data-placeholder="-- Pilih Jenis TKT--">
                                            <option value="">-- Pilih Jenis TKT --</option>
                                            @foreach ($tkttype as $d)
                                                <option value="{{ $d->id }}"
                                                    {{ $d->id == old('tkt_type') ? 'selected' : '' }}>
                                                    {{ $d->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('tkt_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col sm mb-4">
                                    <label for="" class="form-label">Target Utama
                                        Riset</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <select
                                            class="form-select @error('main_research_target') is-invalid @enderror select2"
                                            name="main_research_target" id="main_research_target"
                                            data-placeholder="-- Pilih Target Utama Riset--">
                                            <option value="">-- Target Utama Riset --</option>
                                            @foreach ($mainresearch as $d)
                                                <option value="{{ $d->id }}"
                                                    {{ $d->id == old('main_research_target') ? 'selected' : '' }}>
                                                    {{ $d->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('main_research_target')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Upload File<i class="text-danger">*</i></label>
                                <div class="input-group mb-4">
                                    <input class="form-control @error('proposal_doc') is-invalid @enderror"
                                        name="proposal_doc" type="file" accept=".pdf" title="PDF">
                                    @error('proposal_doc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="basicDate">Catatan</label>
                                <div class="input-group input-group-merge has-validation">
                                    <textarea type="text" class="form-control @error('notes') is-invalid @enderror" name="notes"
                                        value="{{ old('notes') }}"> </textarea>
                                    @error('notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/datatables-buttons.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        "use strict";
        setTimeout(function() {
            (function($) {
                "use strict";
                $(".select2").select2({
                    allowClear: true,
                    minimumResultsForSearch: 7
                });
            })(jQuery);
        }, 350);
        setTimeout(function() {
            (function($) {
                "use strict";
                $(".select2-modal").select2({
                    dropdownParent: $('#newrecord'),
                    allowClear: true,
                    minimumResultsForSearch: 5
                });
            })(jQuery);
        }, 350);

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
    </script>
    <script>
        $(document).ready(function() {
            $('#research_type').change(function() {
                var researchtypesId = $(this).val();

                // Kirim AJAX request untuk mendapatkan harga paket
                $.ajax({
                    url: '/user-proposals/research_type_funds/' +
                        researchtypesId, // Ganti URL dengan endpoint yang sesuai
                    type: 'GET',
                    success: function(response) {
                        $('#researchtypesId').val(response.total_funds);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
