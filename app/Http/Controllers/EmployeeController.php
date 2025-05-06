<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmployeeModel;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restricted/employee/index');
    }

    /**
     * Display the data, called by DataTables as API
     */
    public function data()
    {
        // Yajra DataTables taking data from DeptModel, which uses data from dept table
        return DataTables::of(EmployeeModel::query())
        ->addColumn('actions', function ($item) { // adds extra column to contain action
            return view('partials.actions', [ // partial modular file, taking the item id and routes each should go to
                'item' => $item,
                'routes' => [
                    'edit' => 'dept.edit',
                    'destroy' => 'dept.destroy',
                ]
            ])->render();
        })
        ->rawColumns(['actions']) // renders this column as raw, so HTML is kept
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
