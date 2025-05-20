@extends('adminlte::page')

@section('title', 'Create New Department')

@section('content_header')
    <h1>New Department Form</h1>
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
            <form method="POST" action="{{ route('dept.store') }}"> 
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Department</label>
                  <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop