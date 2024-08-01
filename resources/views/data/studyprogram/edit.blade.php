<!-- resources/views/edit_prodi.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-xl">
        <div class="card mb-3 p-2">
            <div class="card-header justify-content-between align-items-center">
                    <div class="card-header">Edit Study Program</div>
                    <div class="card-body">
                        <form action="{{ route('program.update', $studyprogram->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name_program">Name Program Study</label>
                                <input type="text" name="name_program" id="name_program" class="form-control"
                                    value="{{ $studyprogram->name_program }}">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
            </div>
        </div>
</div>
@endsection
