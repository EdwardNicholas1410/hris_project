<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DeptModel;
use Yajra\DataTables\Facades\DataTables;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restricted.dept.index');
    }

    /**
     * Display the data, called by DataTables as API
     */
    public function data()
    {
        // Yajra DataTables taking data from DeptModel, which uses data from dept table
        return DataTables::of(DeptModel::query())
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
        return view('restricted.dept.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // server validation
        $validateData = $request->validate([
            'nama' => 'required|max:255'
        ]);

        // count column doesn't need to be set because the default is defined in migration file

        DeptModel::create($validateData);
        
        return redirect()->route('dept.index')->with('success', 'Data telah tersimpan');
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
        $edit = DeptModel::findOrFail($id);

        return view('restricted.dept.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // server validation
        $validateData = $request->validate([
            'nama' => 'required|max:255'
        ]);

        // find the correct entry
        $item = DeptModel::findOrFail($id);
        $item->update($validateData);

        return redirect()->route('dept.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = DeptModel::findOrFail($id);
        $delete->delete();

        return redirect()->route('dept.index')->with('status', 'Data telah dihapus');
    }
}
