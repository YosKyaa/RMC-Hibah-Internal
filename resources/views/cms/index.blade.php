@extends('layouts.master')
@section('breadcrumb-items')
<span class="text-muted fw-light">CMS</span>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<style>
      .table {
        font-size: 12px;
    }

    .table th, .table td {
        padding: 5px;
    }

    .table th {
        white-space: nowrap;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card app-calendar-wrapper">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-body">
                    <a href="{{ route('cms.create') }}" class="btn btn-primary mb-3"> Add Data</a>
                    <table class="table table-hover table-sm" id="datatable" width="100%">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th>Title</th>
                                <th >Slug</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                    </table>
                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script
src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/datatables.checkboxes.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/datatables-buttons.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/buttons.bootstrap5.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('cms.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // Sequence number column
                { data: 'title', name: 'title' },
                { data: 'slug', name: 'slug' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // Handle delete button click with SweetAlert
        $('#datatable').on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your post has been deleted.',
                                'success'
                            );
                            $('#datatable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Failed!',
                                'There was an error deleting the post.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>



@endsection