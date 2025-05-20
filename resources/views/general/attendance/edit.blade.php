@extends('adminlte::page')

@section('title', 'Edit An Attendance Record')

@section('content_header')
    <h1>Edit Attendance Form</h1>
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
            <form method="POST" action="{{ route('attendance.update', $edit->id) }}"> 
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="id_employee" class="form-label">ID Employee</label>
                  <input type="text" class="form-control" name="id_employee" value="{{ old('id_employee', $edit->id_employee) }}">
                </div>
                
                <div class="mb-3">
                  <label for="check_in" class="form-label">Check In Time-Date</label>
                  <input type="datetime-local" class="form-control" name="check_in" value="{{ old('check_in', $edit->check_in->format('Y-m-d\TH:i')) }}">
                </div>

                <div class="mb-3">
                  <label for="check_out" class="form-label">Check Out Time-Date</label>
                  <input type="datetime-local" class="form-control" name="check_out" value="{{ old('check_out', $edit->check_out ? $edit->check_out->format('Y-m-d\TH:i') : '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop