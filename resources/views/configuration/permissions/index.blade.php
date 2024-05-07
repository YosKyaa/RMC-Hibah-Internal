@extends('layouts.master')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Setting /</span>
    <span class="text-muted fw-light">Manage Account /</span>
@endsection
@section('title', 'Permissions')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('style')
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }

        table.dataTable td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            word-wrap: break-word;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-datatable table-responsive">
            <div class="card-header flex-column flex-md-row pb-0">
                <div class="row">
                    <div class="col-12 pt-3 pt-md-0">
                        <div class="col-12">
                            <div class="row">
                                <div class=" col-md-3">
                                    <select id="select_guard_name" class="select2 form-select"
                                        data-placeholder="Guard Name">
                                        <option value="">Guard Name</option>
                                        @foreach ($guard_names as $d)
                                            <option value="{{ $d->guard_name }}">{{ $d->guard_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-md-3">
                                    <select id="select_role" class="select2 form-select" data-placeholder="Roles">
                                        <option value="">Roles</option>
                                        @foreach ($roles as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-sm" id="datatable" width="100%">
                <thead>
                    <tr>
                        <th width="20px" data-priority="1">No</th>
                        {{-- <th width="30px">ID</th> --}}
                        <th data-priority="2">Name</th>
                        <th width="100px">Guard Name</th>
                        <th width="100px">Roles</th>
                    </tr>
                </thead>
            </table>
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
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    @if (session('msg'))
        <script type="text/javascript">
            //swall message notification
            $(document).ready(function() {
                swal(`{!! session('msg') !!}`, {
                    icon: "info",
                });
            });
        </script>
    @endif
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
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ordering: false,
                language: {
                    searchPlaceholder: 'Search..',
                    // url: "{{ asset('assets/vendor/libs/datatables/id.json') }}"
                },
                ajax: {
                    url: "{{ route('permissions.data') }}",
                    data: function(d) {
                        d.select_guard_name = $('#select_guard_name').val(),
                            d.select_role = $('#select_role').val(),
                            d.search = $('#datatable_filter input[type="search"]').val()
                    },
                },
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                columns: [{
                        render: function(data, type, row, meta) {
                            var no = (meta.row + meta.settings._iDisplayStart + 1);
                            return no;
                        },
                        className: "text-center"
                    },
                    // {
                    //     render: function (data, type, row, meta) {
                    //         var html = "<code><span title='" + row.id + "'>" + row.id +
                    //             "</span></code>";
                    //         return html;
                    //     },
                    // },
                    {
                        render: function(data, type, row, meta) {
                            return row.name;
                        },
                    },
                    {
                        render: function(data, type, row, meta) {
                            return row.guard_name;
                        },
                        className: "text-md-center"
                    },
                    {
                        render: function(data, type, row, meta) {
                            return row.roles.length;
                        },
                        className: "text-md-center"
                    }
                ]
            });
            $('#select_guard_name').change(function() {
                table.draw();
            });
            $('#select_role').change(function() {
                table.draw();
            });
        });
    </script>
@endsection
