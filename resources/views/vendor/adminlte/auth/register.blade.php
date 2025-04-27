@extends('adminlte::auth.auth-page', ['authType' => 'register'])

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
    }
@endphp

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $registerUrl }}" method="post">
        @csrf

        {{-- Name Field --}}
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.full_name') }}"
                   value="{{ old('name') }}"
                   required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email Field --}}
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.email') }}"
                   value="{{ old('email') }}"
                   required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password Fields --}}
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}"
                   required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}"
                   required>
        </div>

        <button type="submit" class="button">
            {{ __('adminlte::adminlte.register') }}
        </button>
    </form>
@stop

@section('auth_navigation')
    <p>{{ __("Already have an account?") }}</p>
    <a href="{{ $loginUrl }}">
        <button class="link-button">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </button>
    </a>
@stop