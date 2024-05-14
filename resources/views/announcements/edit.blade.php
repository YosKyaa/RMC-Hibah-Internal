@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Announcement
                    </div>
                    <div class="card-body">
                        <form action="{{ route('announcements.update', $announcements->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="title">Title</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" placeholder="Input your title"
                                        value="{{ old('title') != null ? old('title') : $announcements->title }}">>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Date</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" placeholder="yyyy-mm-dd"
                                        value="{{ old('date') != null ? old('date') : $announcements->date }}">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label class="form-label">Upload Images<i class="text-danger">*</i></label>
                                <div class="input-group mb-3">
                                    <input class="form-control @error('file_path') is-invalid @enderror" name="file_path"
                                        type="file" accept=".jpg, .jpeg, .png" title="JPG/PNG">
                                    @error('file_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 fv-plugins-icon-container">
                                <label class="form-label" for="basicDate">Description</label>
                                <div class="input-group input-group-merge has-validation">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        placeholder="Input your description">{{ old('description') != null ? old('description') : $announcements->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
