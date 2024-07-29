@extends('layouts.master')
@section('title', 'Dokumentasi')

@section('css')
@endsection

@section('content')
<div class="card p-3 mb-3">
    <div class="card-header">
        <h2 class="card-title">Activity Diagram</h2>
        <div class="card-body">
            <a href="{{ asset('assets/img/dokumentasi/alur.png') }}" stream>
            <img src="{{ asset('assets/img/dokumentasi/alur.png') }}" alt="Activity Diagram" class="img-fluid" style="max-width: 100%; height: auto;">
            </a>
        </div>

    </div>
</div>

<div class="card p-3">
    <div class="card-header">
        <h2 class="card-title">User Guidance</h2>
    </div>
    <div class="card-body">
        <a href="{{ asset('assets/img/dokumentasi/usecase.png') }}" stream>
            <img src="{{ asset('assets/img/dokumentasi/usecase.png') }}" alt="User Guidance" class="img-fluid" style="max-width: 100%; height: auto;">
        </a>
    </div>
</div>
@endsection

