@extends('layouts.master')
@section('title', 'Add Reviewer')


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4 p-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Silahkan Pilih Reviewer!</h5> <small class="text-muted float-end">Add Reviewer</small>
                </div>
                <div class="card-body">
                    <form id="form-add-new-record" method="POST"
                        action="{{ route('addreviewer.update', $proposals->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-sm mb-4">
                                <label class="form-label" for="flatpickr-date">Tanggal Mulai Review</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="date"
                                        class="form-control @error('review_date_start') is-invalid @enderror"
                                        name="review_date_start" placeholder="YYYY-MM-DD" id="flatpickr-date"
                                        value="{{ old('review_date_start') }}">
                                    @error('review_date_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm mb-4">
                                <label class="form-label" for="flatpickr-date">Tanggal Selesai Review</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="date"
                                        class="form-control @error('review_date_end') is-invalid @enderror"
                                        name="review_date_end" placeholder="YYYY-MM-DD" id="flatpickr-date2"
                                        value="{{ old('review_date_end') }}">
                                    @error('review_date_end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="reviewer_id" class="form-label">Pilih Reviewer</label>
                            <select name="reviewer_id" id="reviewer_id" class="form-select select2" required>
                                <option value="">Select Reviewer</option>
                                @foreach ($users as $user)
                                    @if (!$user->reviewer)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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
@endsection
