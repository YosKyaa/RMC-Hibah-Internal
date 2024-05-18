@extends('layouts.master')
@section('title', 'Submit Proposal')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Submit Proposal</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label for="research_types_id" class="form-label">Jenis Penelitian</label>
                    <select id="research_types_id" name="research_types_id" class="select2 form-select"
                        data-placeholder="Jenis Penelitian">
                        <option value="">Jenis Penelitian</option>
                        @foreach ($researchtypes as $d)
                            <option value="{{ $d->title }}">{{ $d->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Bidang Penelitian</label>
                    <select id="field_focus_research_id" name="field_focus_research_id" class="select2 form-select"
                        data-placeholder="Kategori Penelitian">
                        <option value="">Kategori Penelitian</option>
                        @foreach ($categoryresearch as $d)
                            <option value="{{ $d->category_id }}">{{ $d->category_name }}</option>
                        @endforeach
                    </select>
                    <select id="field_focus_research_id" name="field_focus_research_id" class="select2 form-select"
                        data-placeholder="Tema Penelitian">
                        <option value="">Tema Penelitian</option>
                        @foreach ($fieldfocusresearch as $d)
                            <option value="{{ $d->research_theme }}">{{ $d->research_theme }}</option>
                        @endforeach
                    </select>
                    <select id="research_types_id" name="research_types_id" class="select2 form-select"
                        data-placeholder="Jenis Penelitian">
                        <option value="">Topik Penelitian</option>
                        @foreach ($fieldfocusresearch as $d)
                            <option value="{{ $d->research_topic }}">{{ $d->research_topic }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Read plain</label>
                    <input type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1"
                        value="email@example.com" />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleDataList" class="form-label">Datalist example</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                    <datalist id="datalistOptions">
                        <option value="San Francisco">
                        <option value="New York">
                        <option value="Seattle">
                        <option value="Los Angeles">
                        <option value="Chicago">
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
                    <select multiple class="form-select" id="exampleFormControlSelect2"
                        aria-label="Multiple select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>


        {{-- <form>
            <div class="mb-3 row">
                <label for="selectpickerBasic" class="col-md-2 col-form-label">Jenis Penelitian</label>
                <div class="col-md-10">
                    <select id="research_types_id" name="research_types_id" class="select2 form-select"
                        data-placeholder="Jenis Penelitian">
                        <option value="">Jenis Penelitian</option>
                        @foreach ($researchtypes as $d)
                            <option value="{{ $d->title }}">{{ $d->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
            <label for="selectpickerBasic" class="col-md-2 col-form-label">Jenis Penelitian</label>
                <div class="col-md-10">
                    <select id="research_types_id" name="research_types_id" class="select2 form-select"
                        data-placeholder="Jenis Penelitian">
                        <option value="">Bidang Penelitian</option>
                        @foreach ($researchtypes as $d)
                            <option value="{{ $d->title }}">{{ $d->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
                <div class="col-md-10">
                    <input class="form-control" type="text"
                        class="form-control @error('research_types_id') is-invalid @enderror"
                        name="research_types_id" placeholder="Input your title"
                        value="{{ old('research_types_id') }}">
                    @error('research_types_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input class="form-control" type="email" value="john@example.com" id="html5-email-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com"
                        id="html5-url-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
                <div class="col-md-10">
                    <input class="form-control" type="tel" value="90-(164)-188-556" id="html5-tel-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" value="password" id="html5-password-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
                <div class="col-md-10">
                    <input class="form-control" type="number" value="18" id="html5-number-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>
                <div class="col-md-10">
                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                        id="html5-datetime-local-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                <div class="col-md-10">
                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-month-input" class="col-md-2 col-form-label">Month</label>
                <div class="col-md-10">
                    <input class="form-control" type="month" value="2021-06" id="html5-month-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-week-input" class="col-md-2 col-form-label">Week</label>
                <div class="col-md-10">
                    <input class="form-control" type="week" value="2021-W25" id="html5-week-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                <div class="col-md-10">
                    <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-color-input" class="col-md-2 col-form-label">Color</label>
                <div class="col-md-10">
                    <input class="form-control" type="color" value="#666EE8" id="html5-color-input" />
                </div>
            </div>
            <div class="row">
                <label for="html5-range" class="col-md-2 col-form-label">Range</label>
                <div class="col-md-10">
                    <input type="range" class="form-range mt-3" id="html5-range" />
                </div>
            </div>
        </form> --}}
    @endsection

    @section('script')
        $('#aktivitas').change(function () {
        var id = this.value;
        $("#kategori").html('');
        $.ajax({
        url: "{{ route('DOC.get_category_by_id') }}",
        type: "GET",
        data: {
        id: id,
        _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function (result) {
        if (result.length != 0) {
        $('#kategori').html(
        '<option value="">Kategori</option>'
        );
        $.each(result, function (key, value) {
        $("#kategori").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
        });
        }
        }
        });
        });

    @endsection
