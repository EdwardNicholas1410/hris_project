@extends('adminlte::page')

@section('title', 'Departments Table')

{{-- Enable AdminLTE DataTables plugin and its extensions --}}
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>Department Data Table</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="mt-2">
        <a href="{{ route('dept.create') }}" class="btn btn-info mb-3">
            <i class="fas fa-plus"></i> New Entry
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- Use AdminLTE datatable component --}}
            {{-- Define table headers and config in your controller and pass as $heads and $config --}}
            <x-adminlte-datatable id="dataTable" :heads="['ID', 'Nama', 'Count', ['label'=>'Actions','no-export'=>true, 'width'=>10,]]"
                                :config="[ 'processing' => true, 'serverSide' => true, 'ajax' => route('dept.data'),
                                            'columns' => [
                                                ['data'=>'id','name'=>'id'],
                                                ['data'=>'nama','name'=>'nama'],
                                                ['data'=>'count', 'name'=>'count'],
                                                ['data'=>'actions','name'=>'actions','orderable'=>false,'searchable'=>false]
                                            ],
                                            'columnDefs'  => [
                                                ['className'=>'dt-center', 'targets'=>'_all'],
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