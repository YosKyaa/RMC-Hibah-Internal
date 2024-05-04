@extends('layouts.master')
@section('title', 'Roles')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="app-brand justify-content-center mb-4">
            Read Role<br>
            @can('create role')
            <button>tambah</button>
            @endcan
        </div>
    </div>
</div>

@endsection
