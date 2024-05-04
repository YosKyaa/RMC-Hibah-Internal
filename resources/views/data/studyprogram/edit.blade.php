<!-- resources/views/edit_prodi.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Study Program</div>
                    <div class="card-body">
                        <form action="{{ route('program.update', $studyprogram->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name_program">Name Program Study</label>
                                <input type="text" name="name_program" id="name_program" class="form-control"
                                    value="{{ $studyprogram->name_program }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
