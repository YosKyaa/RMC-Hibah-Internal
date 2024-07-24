@extends('layouts.master')
@section('title', 'Account Bank')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
@endsection

@section('content')
    <div class="col-xl">
        <div class="card mb-3 p-4">
            <div class="card-header justify-content-between align-items-center">
                <h3 class="mb-0">Detail Bank</h3>
                <span class="text-muted">Pendanaan akan ditransfer melalui rekening ini. </span>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form id="form-add-new-record" method="POST"
                    action="{{ route('user-proposals-account-bank.update', $proposal->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nama Bank</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group input-group-merge has-validation">
                                <select @error('bank') is-invalid @enderror class="select2" name="bank" id="bank"
                                    data-style="btn-default">
                                    <option value="">-- Pilih Nama Bank --</option>
                                    @foreach ($bank as $d)
                                        <option value="{{ $d->id }}" {{ $d->id == old('bank') ? 'selected' : '' }}>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Nomor Rekening</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="bx bxs-bank"></i></span>
                            <input type="number" name="bank_account_number" id="bank" class="form-control"
                                placeholder="9898021070" aria-label="9898021070"
                                aria-describedby="basic-icon-default-company2">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Nama</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bxs-user"></i></span>
                            <input type="text" id="basic-icon-default-email" class="form-control" name="bank_account_name" placeholder="Jhon Doe"
                                aria-label="Jhon Doe" aria-describedby="basic-icon-default-email2">
                        </div>
                        <div class="form-text"> Pastikan Rekening Diisi dengan benar </div>
                   
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirmSubmit(event)">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        function confirmSubmit(event) {
            event.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Anda akan mengirimkan Nomor Rekening ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary me-1',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Submit the form via AJAX or standard form submission
                    $('#form-add-new-record').submit();
                }
            });
        }

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
    </script>
@endsection
