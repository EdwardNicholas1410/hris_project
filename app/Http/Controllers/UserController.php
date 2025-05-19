<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

use App\Models\EmployeeModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('restricted.user.index');
    }

    /**
     * Display the data, called by DataTables as API
     */
    public function data()
    {
        // Yajra DataTables taking data from DeptModel, which uses data from dept table
        return DataTables::of(
            User::select(['id', 'name', 'email', 'role', 'id_employee'])->with('employee')
            ) // more advanced, instead of taking all, it only takes the specific columns and the method
        ->addColumn('actions', function ($item) { // adds extra column to contain action
            return view('partials.actions', [ // partial modular file, taking the item id and routes each should go to
                'item' => $item,
                'routes' => [
                    'edit' => 'user.edit',
                    'destroy' => 'user.destroy',
                ]
            ])->render();
        })
        // edits a column so that 
        ->editColumn('id_employee', function ($item) {
            return $item->employee ? $item->employee->nama_lengkap : '-'; // Replace ID with employee name
        })
        ->rawColumns(['actions']) // renders this column as raw, so HTML is kept
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restricted.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // server validation
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|in:employee,HR,admin',
            'id_employee' => 'required|exists:employee,id|unique:users,id_employee',
        ]);

        User::create(attributes: [
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'role' => $validateData['role'],
            'id_employee' => $validateData['id_employee'],
        ]);
        
        return redirect()->route('user.index')->with('success', 'User telah dibuat');
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
        $employee = EmployeeModel::all();
        $edit = User::findOrFail($id);

        return view('restricted.user.edit', compact('employee', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|in:employee,HR,admin',
            'id_employee' => 'required|exists:employee,id|unique:users,id_employee',
        ]);

        $item = User::findOrFail($id);
        $item->update($validateData);

        return redirect()->route('user.index')->with('success', 'User telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findOrFail($id);
        $delete->delete();

        return redirect()->route('user.index')->with('status', 'User telah dihapus');
    }
}
