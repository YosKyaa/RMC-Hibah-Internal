@extends('layouts.master')
@section('breadcrumb-items')
    <span class="text-muted fw-light">Setting /</span>
    <span class="text-muted fw-light">Manage Account /</span>
    <span class="text-muted fw-light">Roles /</span>
@endsection
@section('title', $data->name)

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

    </style>
@endsection

@section('content')
    <!-- User Profile Content -->
    <div class="row">
        <div class="col-md-12">
            @if (session('msg'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <h5 class="card-header">
                    Update Role
                </h5>
                <!-- Account -->
                <hr class="my-0">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            @csrf
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ $data->name }}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="color" class="form-label">Color</label>
                                <input type="color"
                                    class="form-control form-control-color @error('color') is-invalid @enderror"
                                    id="color" name="color" value="{{ $data->color }}" />
                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" value="{{ $data->description }}" />
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="guard_name" class="form-label">Guard Names</label>
                                <select class="form-select @error('guard_name') is-invalid @enderror select2"
                                    name="guard_name" data-placeholder="-- Select --">
                                    <option value="">-- Select --</option>
                                    @foreach ($guard_names as $d)
                                        <option value="{{ $d->guard_name }}"
                                            {{ $d->guard_name == $data->guard_name ? 'selected' : '' }}>
                                            {{ $d->guard_name }}</option>
                                    @endforeach
                                </select>
                                @error('guard_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <table class="permissionTable overflow-hidden table table-sm table-hover mb-4" width="100%">
                            <thead style="border-bottom: 1px solid">
                                <th style="min-width: 150px">
                                    <label style="display: inline-block">
                                        <input class="grand_selectall" type="checkbox">
                                        {{ __('Menu/Section') }}
                                    </label>
                                </th>
                                <th width="75%">
                                    {{ __('Permissions') }}
                                </th>
                            </thead>
                            <tbody>
                                @php
                                    $section_value = '';
                                @endphp
                                @foreach ($permissions as $key => $group)
                                    @php
                                        $x = substr($key, strpos($key, '/'));
                                        $pieces = explode('/', $key);
                                        $last_word = array_pop($pieces);
                                    @endphp
                                    <tr class="py-8">
                                        <td class="p-6" style="vertical-align: top">
                                            <input class="selectall" type="checkbox">
                                            @for ($i = 1; $i <= substr_count($key, '/'); $i++)
                                                <i class="bx bxs-chevron-right text-primary"></i>
                                            @endfor
                                            <strong>{{ ucfirst($last_word) }}</strong>
                                        </td>
                                        <td class="p-6" style="vertical-align: top">
                                            <div class="row">
                                                @forelse($group as $permission)
                                                    <div class="col-md-2">
                                                        <label>
                                                            <input
                                                                {{ $data->permissions->contains('id', $permission->id) ? 'checked' : '' }}
                                                                name="permissions[]" class="permissioncheckbox"
                                                                class="rounded-md border" type="checkbox"
                                                                value="{{ $permission->name }}">
                                                            @php
                                                                if (str_contains($permission->name, '.')) {
                                                                    $perm = substr(
                                                                        $permission->name,
                                                                        strpos($permission->name, '.') + 1,
                                                                    );
                                                                } else {
                                                                    $perm = $permission->name;
                                                                }
                                                            @endphp
                                                            {{ ucfirst($perm) }} &nbsp;&nbsp;
                                                        </label>
                                                    </div>
                                                @empty
                                                    {{ __('No permission in this group !') }}
                                                @endforelse
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a class="btn btn-outline-secondary" href="{{ route('roles.index') }}">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>

    <!--/ User Profile Content -->
@endsection
@section('script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script>
        "use strict";
        $(function() {
            const e = $(".selectpicker"),
                t = $(".select2"),
                c = $(".select2-icons");

            function i(e) {
                return e.id ? "<i class='bx bxl-" + $(e.element).data("icon") + " me-2'></i>" + e.text : e.text
            }
            e.length && e.selectpicker(), t.length && t.each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>').select2({
                    placeholder: "Select value",
                    dropdownParent: e.parent()
                })
            }), c.length && c.wrap('<div class="position-relative"></div>').select2({
                templateResult: i,
                templateSelection: i,
                escapeMarkup: function(e) {
                    return e
                }
            })
        });
        $(".permissionTable").on('click', '.selectall', function() {

            if ($(this).is(':checked')) {
                $(this).closest('tr').find('[type=checkbox]').prop('checked', true);

            } else {
                $(this).closest('tr').find('[type=checkbox]').prop('checked', false);

            }

            calcu_allchkbox();

        });

        $(".permissionTable").on('click', '.grand_selectall', function() {
            if ($(this).is(':checked')) {
                $('.selectall').prop('checked', true);
                $('.permissioncheckbox').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
                $('.permissioncheckbox').prop('checked', false);
            }
        });

        $(function() {

            calcu_allchkbox();
            selectall();

        });

        function selectall() {

            $('.selectall').each(function(i) {

                var allchecked = new Array();

                $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                    if ($(this).is(":checked")) {
                        allchecked.push(1);
                    } else {
                        allchecked.push(0);
                    }
                });

                if ($.inArray(0, allchecked) != -1) {
                    $(this).prop('checked', false);
                } else {
                    $(this).prop('checked', true);
                }

            });
        }

        function calcu_allchkbox() {

            var allchecked = new Array();

            $('.selectall').each(function(i) {


                $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                    if ($(this).is(":checked")) {
                        allchecked.push(1);
                    } else {
                        allchecked.push(0);
                    }
                });


            });

            if ($.inArray(0, allchecked) != -1) {
                $('.grand_selectall').prop('checked', false);
            } else {
                $('.grand_selectall').prop('checked', true);
            }

        }



        $('.permissionTable').on('click', '.permissioncheckbox', function() {

            var allchecked = new Array;

            $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                if ($(this).is(":checked")) {
                    allchecked.push(1);
                } else {
                    allchecked.push(0);
                }
            });

            if ($.inArray(0, allchecked) != -1) {
                $(this).closest('tr').find('.selectall').prop('checked', false);
            } else {
                $(this).closest('tr').find('.selectall').prop('checked', true);

            }

            calcu_allchkbox();

        });
    </script>
@endsection
