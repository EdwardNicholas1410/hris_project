@extends('adminlte::master')

@php
    $authType = $authType ?? 'login';
    $dashboardUrl = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home');

    if (config('adminlte.use_route_url', false)) {
        $dashboardUrl = $dashboardUrl ? route($dashboardUrl) : '';
    } else {
        $dashboardUrl = $dashboardUrl ? url($dashboardUrl) : '';
    }
@endphp

@section('adminlte_css')
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Playfair+Display:400,700" rel="stylesheet">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    {{-- Custom Auth CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom-auth.css') }}">
    
    @stack('css')
    @yield('css')
@stop

@section('body')
    <div class="container">
        {{-- Form Card --}}
        <div class="card card--form">
            @if(config('adminlte.auth_logo.enabled', false))
                <div class="auth-logo">
                    <a href="{{ $dashboardUrl }}">
                        <img src="{{ asset(config('adminlte.auth_logo.img.path')) }}"
                             alt="{{ config('adminlte.auth_logo.img.alt') }}"
                             @class(config('adminlte.auth_logo.img.class', ''))
                             style="max-height: 50px;">
                    </a>
                </div>
            @endif

            <div class="form--heading">
                @yield('auth_header')
            </div>

            <div class="card-body">
                @yield('auth_body')
            </div>

            @hasSection('auth_footer')
                <div class="card-footer">
                    @yield('auth_footer')
                </div>
            @endif
        </div>

        {{-- Navigation Card --}}
        <div class="card card--nav">
            <div class="card-content">
                @yield('auth_navigation')
            </div>
        </div>
    </div>
@stop