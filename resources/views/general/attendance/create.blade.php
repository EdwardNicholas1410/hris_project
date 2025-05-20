@extends('adminlte::page')

@section('title', 'Create New Attendance Record')

@section('content_header')
    <h1>New Attendance Form</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('attendance.store') }}"> 
                @csrf

                <div class="mb-3">
                  <label for="id_employee" class="form-label">ID Employee</label>
                  <input type="text" class="form-control" name="id_employee" value="{{ old('id_employee') }}">
                </div>
                
                <div class="mb-3">
                  <label for="check_in" class="form-label">Check In Time-Date</label>
                  <input type="datetime-local" class="form-control" name="check_in" value="{{ old('check_in') }}">
                </div>

                <div class="mb-3">
                  <label for="check_out" class="form-label">Check Out Time-Date</label>
                  <input type="datetime-local" class="form-control" name="check_out" value="{{ old('check_out') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop