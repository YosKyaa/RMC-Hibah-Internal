@extends('layouts.master')
@section('breadcrumb-items')
<span class="text-muted fw-light">Setting /</span>
<span class="text-muted fw-light">Manage Account /</span>
@endsection
@section('title', 'Roles')

@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
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
                                    @foreach($guard_names as $d)
                                    <option value="{{ $d->guard_name }}">{{ $d->guard_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="offset-md-6 col-md-3 text-md-end text-center pt-3 pt-md-0">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#newrecord" aria-controls="offcanvasEnd" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button"><span><i
                                            class="bx bx-plus me-sm-2"></i>
                                        <span>Add</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-end @if($errors->all()) show @endif" tabindex="-1" id="newrecord"
                aria-labelledby="offcanvasEndLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Add Role</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                    <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                        id="form-add-new-record" method="POST" action="">
                        @csrf
                        <div class="col-sm-12 fv-plugins-icon-container">
                            <label class="form-label" for="basicDate">Name</label>
                            <div class="input-group input-group-merge has-validation">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 fv-plugins-icon-container">
                            <label class="form-label" for="basicDate">Guard Name</label>
                            <div class="input-group input-group-merge has-validation">
                                <select class="form-select @error('guard_name') is-invalid @enderror select2-modal"
                                    name="guard_name" id="select2Dark" data-placeholder=" -- Select --">
                                    @foreach($guard_names as $d)
                                    <option value="{{$d->guard_name}}"
                                        {{ $d->id == old('guard_name') ? "selected": "" }}>
                                        {{$d->guard_name}}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                data-bs-dismiss="offcanvas">Cancel</button>
                        </div>
                        <div></div><input type="hidden">
                    </form>

                </div>
            </div>
        </div>
        <table class="table table-hover table-sm" id="datatable" width="100%">
            <thead>
                <tr>
                    <th width="20px" data-priority="1">No</th>
                    <th data-priority="2">Name</th>
                    <th width="100px">Guard Name</th>
                    <th width="150px">Total Permissions</th>
                    <th width="40px" data-priority="3">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/datatables.checkboxes.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/datatables-buttons.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/buttons.bootstrap5.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@if(session('msg')) 
<script type="text/javascript">
    //swall message notification
    $(document).ready(function () {
        swal(`{!! session('msg') !!}`, {
            icon: "info",
        });
    });
</script>
@endif
<script>
    "use strict";
    setTimeout(function () {
        (function ($) {
            "use strict";
            $(".select2").select2({
                allowClear: true,
                minimumResultsForSearch: 7
            });
        })(jQuery);
    }, 350);
    setTimeout(function () {
        (function ($) {
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
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ordering: false,
            language: {
                searchPlaceholder: 'Search..',
                // url: "{{asset('assets/vendor/libs/datatables/id.json')}}"
            },
            ajax: {
                url: "{{ route('roles.data') }}",
                data: function (d) {
                    d.select_guard_name = $('#select_guard_name').val(),
                        d.search = $('#datatable_filter input[type="search"]').val()
                },
            },
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all"
            }],
            columns: [{
                    render: function (data, type, row, meta) {
                        var no = (meta.row + meta.settings._iDisplayStart + 1);
                        return no;
                    },
                    className: "text-center"
                },
                {
                    render: function (data, type, row, meta) {
                        var html = `<a class="text-primary" title="` + row.name +
                            `" href="{{ url('setting/manage_account/roles/edit/` +
                            row.idd + `') }}">` + row.name + `</a>`;
                        return html;
                    },
                },
                {
                    render: function (data, type, row, meta) {
                        return row.guard_name;
                    },
                },
                {
                    render: function (data, type, row, meta) {
                        return row.permissions.length;
                    },
                },
                {
                    render: function (data, type, row, meta) {
                        var html =
                            `<a class=" text-success" title="Edit" href="{{ url('setting/manage_account/roles/edit/` +
                            row.idd + `') }}"><i class="bx bxs-edit"></i></a>`;
                        if ("admin" == row.name) {
                            html +=
                                ` <a class=" text-light" title="Delete" style="cursor:not-allowed"><i class="bx bx-trash"></i></a>`;
                        } else {
                            html +=
                                ` <a class=" text-danger" title="Delete" style="cursor:pointer" onclick="DeleteId(` +
                                row
                                .id + `)" ><i class="bx bx-trash"></i></a>`;
                        }
                        return html;
                    },
                    className: "text-center"
                }
            ]
        });
        $('#select_guard_name').change(function () {
            table.draw();
        });
    });

    function DeleteId(id) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, data can't be recovered!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('roles.destroy') }}",
                        type: "DELETE",
                        data: {
                            "id": id,
                            "_token": $("meta[name='csrf-token']").attr("content"),
                        },
                        success: function (data) {
                            if (data['success']) {
                                swal(data['message'], {
                                    icon: "success",
                                });
                                $('#datatable').DataTable().ajax.reload();
                            } else {
                                swal(data['message'], {
                                    icon: "error",
                                });
                            }
                        }
                    })
                }
            })
    }

</script>
@endsection
