@extends('layouts.authentication.master')
@section('title', 'Lupa Password')
@section('content')
<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Lupa kata sandi Anda? Tidak masalah. Beritahu kami alamat email Anda dan kami akan mengirimkan email pengaturan ulang kata sandi yang memungkinkan Anda memilih kata sandi baru.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            <input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-warning d-grid w-100">
                {{ __('Kirim Email') }}
            </button>
        </div>
    </form>
    </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>
@endsection