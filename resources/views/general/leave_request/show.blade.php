@extends('adminlte::page')

@section('title', 'Leave Request Details')

@section('content_header')
    <h1>Leave Request #{{ $item->id }}</h1>
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
            <dl class="row">
                <dt class="col-sm-3">Employee</dt>
                <dd class="col-sm-9">{{ $item->employee->nama_lengkap ?? $item->id_employee }}</dd>

                <dt class="col-sm-3">Jenis Cuti</dt>
                <dd class="col-sm-9">{{ ucfirst($item->jenis_cuti) }}</dd>

                <dt class="col-sm-3">Tanggal Cuti</dt>
                <dd class="col-sm-9">{{ $item->tanggal_cuti->format('Y-m-d') }}</dd>

                <dt class="col-sm-3">Tanggal Kembali</dt>
                <dd class="col-sm-9">{{ $item->tanggal_kembali->format('Y-m-d') }}</dd>

                <dt class="col-sm-3">Pembuat Request</dt>
                <dd class="col-sm-9">{{ ucfirst($item->pembuat_request) }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">
                    @role('HR|admin')
                        <form method="POST" action="{{ route('leave_request.updateStatus', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status_request" class="form-control">
                                    <option value="pending" {{ $item->status_request == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ $item->status_request == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $item->status_request == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    @else
                        {{ ucfirst($item->status_request) }}
                    @endif
                </dd>
            </dl>

            <a href="{{ route('leave_request.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Back
            </a>

        </div>
    </div>
</div>
@stop
