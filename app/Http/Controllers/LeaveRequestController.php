<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequestModel;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\EmployeeModel;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('general.leave_request.index');
    }

    
    public function data()
    {
        $query = LeaveRequestModel::with('employee');

        if (auth()->user()->hasRole('employee')) {
            $query->where('id_employee', auth()->user()->id_employee);
        }

        return DataTables::of($query)
            ->addColumn('employee', function ($item) {
                return $item->employee ? $item->employee->nama_lengkap : '-';
            })
            ->editColumn('tanggal_cuti', function ($item) {
                return $item->tanggal_cuti ? $item->tanggal_cuti->format('Y-m-d') : '-';
            })
            ->editColumn('tanggal_kembali', function ($item) {
                return $item->tanggal_kembali ? $item->tanggal_kembali->format('Y-m-d') : '-';
            })
            ->addColumn('actions', function ($item) {
                $user = auth()->user();
                // make column blank if employee
                if ($user->hasRole('employee') && $user->id_employee !== $item->id_employee) {
                    return '';
                }

                return view('partials.actions', [
                    'item' => $item,
                    'routes' => [
                        'show' => 'leave_request.show',
                        'edit' => 'leave_request.edit',
                        'destroy' => 'leave_request.destroy',
                    ]
                ])->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = EmployeeModel::forDropdown()->get();
        
        return view('general.leave_request.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        // make rules
        $rules = [
            'jenis_cuti' => 'required|in:sakit,izin,dibayar',
            'tanggal_cuti' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_cuti',
        ];

        // if not employee then they can define these
        if ($user->hasRole('HR') || $user->hasRole('admin')) {
            $rules['id_employee'] = 'required|exists:employee,id';
            $rules['status_request'] = 'required|in:accepted,rejected,pending';
        }
        
        $validateData = $request->validate($rules);

        // auto fill for employees
        if ($user->hasRole('employee')) {
            $validateData['id_employee'] = $user->id_employee;
            $validateData['status_request'] = 'pending';
        }

        LeaveRequestModel::create([
            'id_employee' => $validateData['id_employee'],
            'jenis_cuti' => $validateData['jenis_cuti'],
            'tanggal_cuti' => Carbon::parse($validateData['tanggal_cuti']),
            'tanggal_kembali' => Carbon::parse($validateData['tanggal_kembali']),
            'status_request' => $validateData['status_request'],
            'pembuat_request' => $user->getRoleNames()->first(),
        ]);

        return redirect()->route('leave_request.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = LeaveRequestModel::with('employee')->findOrFail($id);

        $user = auth()->user();

        // check if id_employee matches and if user is mere employee
        if ($user->hasRole('employee') && $user->id_employee !== $item->id_employee) {
            abort(403);
        }

        return view('general.leave_request.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = LeaveRequestModel::findOrFail($id);

        $user = auth()->user();

        $employees = EmployeeModel::forDropdown()->get();
        
        // check if id_employee matches and if user is mere employee
        if ($user->hasRole('employee') && $user->id_employee !== $edit->id_employee) {
            abort(403);
        }

        return view('general.leave_request.edit', compact('edit', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        // the protection
        if ($user->hasRole('employee') && $user->id_employee !== $item->id_employee) {
            abort(403);
        }

        // make rules
        $rules = [
            'jenis_cuti' => 'required|in:sakit,izin,dibayar',
            'tanggal_cuti' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_cuti',
        ];

        // if not employee then they can define these
        if ($user->hasRole('HR') || $user->hasRole('admin')) {
            $rules['id_employee'] = 'required|exists:employee,id';
            $rules['status_request'] = 'required|in:accepted,rejected,pending';
        }
        
        $validateData = $request->validate($rules);

        // auto fill for employees
        if ($user->hasRole('employee')) {
            $validateData['id_employee'] = $user->id_employee;
            $validateData['status_request'] = 'pending';
        }

        $item = LeaveRequestModel::findOrFail($id);

        $item->update([
            'id_employee' => $validateData['id_employee'],
            'jenis_cuti' => $validateData['jenis_cuti'],
            'tanggal_cuti' => Carbon::parse($validateData['tanggal_cuti']),
            'tanggal_kembali' => Carbon::parse($validateData['tanggal_kembali']),
            'status_request' => $validateData['status_request'],
            'pembuat_request' => $user->getRoleNames()->first(),
        ]);

        return redirect()->route('leave_request.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = LeaveRequestModel::findOrFail($id);
        $delete->delete();

        return redirect()->route('leave_request.index')->with('status', 'Data telah dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_request' => 'required|in:pending,accepted,rejected',
        ]);

        $leave = LeaveRequestModel::findOrFail($id);

        $leave->status_request = $request->status_request;
        $leave->save();

        return redirect()->route('leave_request.show', $id)->with('success', 'Status diubah');
    }
}
