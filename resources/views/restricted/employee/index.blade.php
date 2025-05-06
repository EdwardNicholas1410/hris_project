@extends('adminlte::page')

@section('title', 'Data Table')

{{-- Enable AdminLTE DataTables plugin and its extensions --}}
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>Sample Data Table</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            {{-- Use AdminLTE datatable component --}}
            {{-- Define table headers and config in your controller and pass as $heads and $config --}}
            <x-adminlte-datatable id="dataTable" 
                                :heads="[
                                    'ID', 
                                    'Name', 
                                    'Phone Number', 
                                    'Address', 
                                    'Monthly Wage', 
                                    'Type',
                                    'Status',
                                    'Department ID',
                                    ['label'=>'Actions','no-export'=>true, 'width'=>10,]
                                    ]"
                                :config="[ 'processing' => true, 'serverSide' => true, 'ajax' => route('employee.data'),
                                            'columns' => [
                                              ['data'=>'id','name'=>'id'],
                                              ['data'=>'nama_lengkap','name'=>'nama_lengkap'],
                                              ['data'=>'no_telp','name'=>'no_telp'],
                                              ['data'=>'alamat','name'=>'alamat'],
                                              ['data'=>'gaji_bulan','name'=>'gaji_bulan'],
                                              ['data'=>'type','name'=>'type'],
                                              ['data'=>'status','name'=>'status'],
                                              ['data'=>'id_dept','name'=>'id_dept'],
                                              ['data'=>'actions','name'=>'actions','orderable'=>false,'searchable'=>false]
                                            ],
                                            'responsive'=>true,
                                            'pageLength'=>10,
                                        ]"
                                  striped hoverable bordered>
                {{-- Placeholder rows if you want static fallback --}}
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop