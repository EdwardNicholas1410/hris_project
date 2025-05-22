@extends('adminlte::page')

@section('title', 'Create New Leave Request')

@section('content_header')
    <h1>New Leave Request Form</h1>
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
            <form method="POST" action="{{ route('leave_request.update', $edit->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id_employee" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" name="id_employee" value="{{ old('id_employee', $edit->id_employee) }}">
                </div>

                <div class="mb-3">
                    <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                    <select name="jenis_cuti" class="form-control">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="sakit" {{ old('jenis_cuti', $edit->jenis_cuti) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="izin" {{ old('jenis_cuti', $edit->jenis_cuti) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="dibayar" {{ old('jenis_cuti', $edit->jenis_cuti) == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_cuti" class="form-label">Tanggal Cuti</label>
                    <input type="date" class="form-control" name="tanggal_cuti" value="{{ old('tanggal_cuti', $edit->tanggal_cuti) }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                    <input type="date" class="form-control" name="tanggal_kembali" value="{{ old('tanggal_kembali', $edit->tanggal_kembali) }}">
                </div>

                <div class="mb-3">
                    <label for="status_request" class="form-label">Status Request</label>
                    <select name="status_request" class="form-control">
                        <option value="pending" {{ old('status_request', $edit->status_request) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ old('status_request', $edit->status_request) == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ old('status_request', $edit->status_request) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>   
        </div>
    </div>
</div>
@stop
