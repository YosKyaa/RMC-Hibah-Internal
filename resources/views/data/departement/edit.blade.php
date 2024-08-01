<!-- resources/views/edit_prodi.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-xl">
        <div class="card mb-3 p-2">
            <div class="card-header justify-content-between align-items-center">
                    <div class="card-header">Edit Department</div>
                    <div class="card-body">
                        <form action="{{ route('dept.update', $departement->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name_dept">Name of Depatment</label>
                                <input type="text" name="name_dept" id="name_dept" class="form-control"
                                    value="{{ $departement->name_dept }}">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
            </div>
        </div>
</div>
@endsection
