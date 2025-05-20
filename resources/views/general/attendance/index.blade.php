@extends('adminlte::page')

@section('title', 'Attendances Table')

{{-- Enable AdminLTE DataTables plugin and its extensions --}}
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>Attendance Data Table</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="mt-2">
        <a href="{{ route('attendance.create') }}" class="btn btn-info mb-3">
            <i class="fas fa-plus"></i> New Entry
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- Use AdminLTE datatable component --}}
            {{-- Define table headers and config in your controller and pass as $heads and $config --}}
            <x-adminlte-datatable id="dataTable" :heads="['ID', 'Employee', 'Check In', 'Check Out', ['label'=>'Actions','no-export'=>true, 'width'=>10,]]"
                                :config="[ 'processing' => true, 'serverSide' => true, 'ajax' => route('attendance.data'),
                                            'columns' => [
                                                ['data'=>'id','name'=>'id'],
                                                ['data'=>'id_employee','name'=>'id_employee'],
                                                ['data'=>'check_in', 'name'=>'check_in'],
                                                ['data'=>'check_out', 'name'=>'check_out'],
                                                ['data'=>'actions','name'=>'actions','orderable'=>false,'searchable'=>false]
                                            ],
                                            'responsive'=>true,
                                           'pageLength'=>10
                                        ]"
                                  striped hoverable bordered>
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop