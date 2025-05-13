@extends('adminlte::page')

@section('title', 'Create New Employee')

@section('content_header')
    <h1>New Employee Form</h1>
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
            <form method="POST" action="{{ route('employee.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Name</label>
                    <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Address</label>
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                </div>

                <div class="mb-3">
                    <label for="gaji_bulan" class="form-label">Monthly Wage</label>
                    <input type="text" class="form-control" name="gaji_bulan" value="{{ old('gaji_bulan') }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" name="type">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="permanent" {{ old('type') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                        <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_dept" class="form-label">Department</label>
                    <select class="form-control" name="id_dept">
                        <option value="">-- Pilih Department --</option>
                        @foreach($dept as $d)
                            <option value="{{ $d->id }}" {{ old('id_dept') == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop
