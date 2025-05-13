<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmployeeModel;
use Yajra\DataTables\Facades\DataTables;

use App\Models\DeptModel;
use function PHPUnit\Framework\returnArgument;

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
        return DataTables::of(EmployeeModel::with('department')) // more advanced, EmployeeModel::with('department') queries all entries at once and grabs their related departments
        ->addColumn('actions', function ($item) { // adds extra column to contain action
            return view('partials.actions', [ // partial modular file, taking the item id and routes each should go to
                'item' => $item,
                'routes' => [
                    'edit' => 'employee.edit',
                    'destroy' => 'employee.destroy',
                ]
            ])->render();
        })
        // edits a column so that 
        ->editColumn('id_dept', function ($item) {
            return $item->department ? $item->department->nama : '-'; // Replace ID with department name
        })
        ->rawColumns(['actions']) // renders this column as raw, so HTML is kept
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = DeptModel::all();

        return view('restricted.employee.create', compact('dept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // server validation
        $validateData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_telp' => 'required|string|min:7|max:15',
            'alamat' => 'required|max:255',
            'gaji_bulan' => 'required|max:12',
            'type' => 'required|in:permanent,contract',
            'id_dept' => 'required|exists:dept,id'
        ]);

        EmployeeModel::create($validateData);
        
        return redirect()->route('employee.index')->with('success', 'Data telah tersimpan');
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
        $dept = DeptModel::all();
        $edit = EmployeeModel::findOrFail($id);

        return view('restricted.employee.edit', compact('dept', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // server validation
        $validateData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'no_telp' => 'required|string|min:7|max:15',
            'alamat' => 'required|max:255',
            'gaji_bulan' => 'required|max:12',
            'type' => 'required|in:permanent,contract',
            'id_dept' => 'required|exists:dept,id'
        ]);

        // find the correct entry
        $item = EmployeeModel::findOrFail($id);
        $item->update($validateData);

        return redirect()->route('employee.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
