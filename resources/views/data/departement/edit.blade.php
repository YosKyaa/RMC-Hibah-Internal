<!-- resources/views/edit_prodi.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Department</div>
                    <div class="card-body">
                        <form action="{{ route('dept.update', $departement->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name_dept">Name of Depatment</label>
                                <input type="text" name="name_dept" id="name_dept" class="form-control"
                                    value="{{ $departement->name_dept }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
