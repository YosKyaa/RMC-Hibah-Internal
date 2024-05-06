{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}
@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>Hi, <b>{{ Auth::user()->name }}</b>!</h1>
                        {{ __("You're logged in!") }}
                        <br>
                        @if (Auth::user()->roles->count() == 0)
                            <p class="p-0 mb-0 text-danger">Sorry, you don't have access rights, please contact
                                administrator!
                            </p>
                        @else
                            <p class="mb-2">You have access rights as
                                @foreach (Auth::user()->roles as $x)
                                    <i class="badge rounded-pill m-0"
                                        style="background-color:{{ $x->color }}">{{ $x->name }}</i>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
