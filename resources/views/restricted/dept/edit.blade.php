@extends('adminlte::page')

@section('title', 'Edit A Department')

@section('content_header')
    <h1>Edit Department Form</h1>
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
            <form method="POST" action="{{ route('dept.update', $edit->id) }}"> 
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Department</label>
                  <input type="text" class="form-control" name="nama" value="{{ old('nama', $edit->nama) }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop