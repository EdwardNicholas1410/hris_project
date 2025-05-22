@extends('adminlte::page')

@section('title', 'Leave Requests Table')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>Leave Request Data Table</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="mt-2">
        <a href="{{ route('leave_request.create') }}" class="btn btn-info mb-3">
            <i class="fas fa-plus"></i> New Leave Request
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="dataTable" 
                :heads="['ID', 'Employee', 'Jenis Cuti', 'Tanggal Cuti', 'Tanggal Kembali', 'Status', 'Pembuat', ['label'=>'Actions','no-export'=>true, 'width'=>10]]"
                :config="[
                    'processing' => true,
                    'serverSide' => true,
                    'ajax' => route('leave_request.data'),
                    'columns' => [
                        ['data'=>'id', 'name'=>'id'],
                        ['data'=>'employee', 'name'=>'employee'],
                        ['data'=>'jenis_cuti', 'name'=>'jenis_cuti'],
                        ['data'=>'tanggal_cuti', 'name'=>'tanggal_cuti'],
                        ['data'=>'tanggal_kembali', 'name'=>'tanggal_kembali'],
                        ['data'=>'status_request', 'name'=>'status_request'],
                        ['data'=>'pembuat_request', 'name'=>'pembuat_request'],
                        ['data'=>'actions', 'name'=>'actions', 'orderable'=>false, 'searchable'=>false]
                    ],
                    'responsive' => true,
                    'pageLength' => 10
                ]"
                striped hoverable bordered>
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop
