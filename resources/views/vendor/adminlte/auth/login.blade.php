@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');
    $passResetUrl = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
        $passResetUrl = $passResetUrl ? route($passResetUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
        $passResetUrl = $passResetUrl ? url($passResetUrl) : '';
    }
@endphp

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
    <form action="{{ $loginUrl }}" method="post">
        @csrf

        {{-- Email Field --}}
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" 
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.email') }}"
                   value="{{ old('email') }}"
                   required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password Field --}}
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

        {{-- Remember Me --}}
        <div class="remember-me">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
        </div>

        <button type="submit" class="button">
            {{ __('adminlte::adminlte.sign_in') }}
        </button>
    </form>
@stop

@section('auth_footer')
    @if($passResetUrl)
        <a href="{{ $passResetUrl }}" class="text-sm">
            {{ __('adminlte::adminlte.i_forgot_my_password') }}
        </a>
    @endif
@stop

@section('auth_navigation')
    <p>{{ __("Don't have an account?") }}</p>
    <a href="{{ $registerUrl }}">
        <button class="link-button">
            {{ __('adminlte::adminlte.register_a_new_membership') }}
        </button>
    </a>
@stop