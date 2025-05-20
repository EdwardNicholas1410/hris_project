@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card w">
                <div class="card-header">
                    <h3 class="card-title">Attendance</h3>
                </div>
                <div class="card-body">
                    <p>Status:
                        @if($checkedIn)
                            <span class="text-success">Currently Checked In ({{ $lastAttendance->check_in->format('H:i:s') }})</span>
                        @else
                            <span class="text-danger">Not Checked In</span>
                        @endif
                    </p>

                    @if(!$checkedIn)
                        <form method="POST" action="{{ route('attendance.check-in') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Check In</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('attendance.check-out') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Check Out</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
