@extends('layouts.master')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Setting /</span>
    <span class="text-muted fw-light">Manage Account /</span>
@endsection
@section('title', 'Users')

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

        table.dataTable td:nth-child(2) {
            max-width: 100px;
        }

        table.dataTable td:nth-child(3) {
            max-width: 80px;
        }

        table.dataTable td:nth-child(4) {
            max-width: 80px;
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
                                    <select id="select_role" class="select2 form-select" data-placeholder="Roles">
                                        <option value="">Roles</option>
                                        @foreach ($roles as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="offset-md-9 col-md-3 text-md-end text-center pt-3 pt-md-0">
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
                <div class="offcanvas offcanvas-end @if ($errors->all()) show @endif" tabindex="-1"
                    id="newrecord" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasEndLabel" class="offcanvas-title">Add User</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-1">
                        <form class="add-new-record pt-0 row g-2 fv-plugins-bootstrap5 fv-plugins-framework"
                            id="form-add-new-record" method="POST" action="">
                            @csrf
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Username</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" id="nik" placeholder="Username" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Name</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Email</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" value="{{ old('email') }}" maxlength="24">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container form-password-toggle">
                                <label class="form-label" for="basicDate">New Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" id="new_password" placeholder="New Password"
                                        value="{{ old('new_password') }}">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container form-password-toggle">
                                <label class="form-label" for="basicDate">Confirm Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                                        value="{{ old('confirm_password') }}" aria-describedby="confirm_password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Roles</label>
                                <div class="input-group input-group-merge has-validation">
                                    <select class="form-select @error('roles') is-invalid @enderror select2-modal"
                                        multiple="multiple" name="roles[]" id="select2Dark"
                                        data-placeholder=" -- Select --">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ in_array($role->id, old('roles') ?? []) ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="40px" data-priority="3">Actions</th>
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
                searching: true,
                language: {
                    searchPlaceholder: 'Search..',
                    // url: "{{ asset('assets/vendor/libs/datatables/id.json') }}"
                },
                ajax: {
                    url: "{{ route('users.data') }}",
                    data: function(d) {
                        d.select_role = $('#select_role').val(),
                            d.select_gender = $('#select_gender').val(),
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
                    {
                        render: function(data, type, row, meta) {
                            var html = `<a class="text-primary" title="` + row.name +
                                `" href="{{ url('setting/manage_account/users/edit/` +
                                                            row.idd + `') }}">` +
                                row.name + `</a>`;
                            return html;
                        },
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = "<code><span title='" + row.username + "'>" + row.username +
                                "</span></code>";
                            return html;
                        },
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html = "<span title='" + row.email + "'>" + row.email +
                                "</span>";
                            return html;
                        },
                    },

                    {
                        render: function(data, type, row, meta) {
                            var x =
                                '<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">';
                            if (row.roles != null) {
                                row.roles.forEach((e) => {
                                    x += '<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="' +
                                        e.name +
                                        '"><i class="badge rounded-pill bg-secondary"  style="font-size:8pt;">' +
                                        e.name +
                                        '</i></li>';
                                });
                            }
                            var y = "</ul>";
                            return x + y;
                        },
                    },
                    {
                        render: function(data, type, row, meta) {
                            var html =
                                `<a class=" text-info" title="Reset Password" href="{{ url('setting/manage_account/users/reset_password/` +
                                                            row.idd + `') }}"><i class="bx bxs-lock-open"></i></a>
                            <a class=" text-success" title="Edit" href="{{ url('setting/manage_account/users/edit/` +
                                                        row.idd + `') }}"><i class="bx bxs-edit"></i></a>`;
                            if ("{{ Auth::user()->id }}" == row.id) {
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
            $('#select_role').change(function() {
                table.draw();
            });
            $('#select_gender').change(function() {
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
                            url: "{{ route('users.delete') }}",
                            type: "DELETE",
                            data: {
                                "id": id,
                                "_token": $("meta[name='csrf-token']").attr("content"),
                            },
                            success: function(data) {
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
