@extends('layouts.master')
@section('title', 'Account Bank')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="col-xl">
        <div class="card mb-4 p-4">
            <div class="card-header justify-content-between align-items-center">
                <h3 class="mb-0"><strong>Tambahkan Tanggal Presentasi</strong></h3>
                <span class="text-muted">Presentasi. </span>
            </div>
            <div class="card-body">
                <form id="form-add-new-record" method="POST" action="{{ route('presentation.update', $proposals->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-sm mb-4">
                            <label class="form-label" for="flatpickr-date">Tanggal Presentasi</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="date" class="form-control @error('presentation_date') is-invalid @enderror"
                                    name="presentation_date" placeholder="YYYY-MM-DD" id="flatpickr-date"
                                    value="{{ old('presentation_date') }}">
                                @error('presentation_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm mb-4">
                            <label class="form-label">Waktu Presentasi</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="time" class="form-control @error('presentation_time') is-invalid @enderror"
                                    name="presentation_time" placeholder="HH:MM" id="flatpickr-time"
                                    value="{{ old('presentation_time') }}">
                                @error('presentation_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
    </script>
    <script>
        var today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

        document.querySelector("#flatpickr-date").flatpickr({
            monthSelectorType: "static",
            minDate: today // Set the minimum date to today
        });

        document.querySelector("#flatpickr-date2").flatpickr({
            monthSelectorType: "static",
            minDate: today // Set the minimum date to today
        });
    </script>
    <script>
        var flatpickrTime = document.querySelector("#flatpickr-time");

        flatpickrTime.flatpickr({
            enableTime: true,
            noCalendar: true
        });
    </script>
@endsection
