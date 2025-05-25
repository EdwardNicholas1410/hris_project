<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AttendanceModel;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('general.attendance.index');
    }

    /**
     * Display the data, called by DataTables as API
     */
    public function data()
    {
        // grab current user
        $user = auth()->user();

        // custom query
        $query = AttendanceModel::with('employee');

        // restrict to only their own entries if employee
        if ($user->hasRole('employee')) {
            $query->where('id_employee', $user->id_employee);
        }

        // Yajra DataTables taking data from AttendanceModel, which uses data from employee table
        return DataTables::of($query) // more advanced, AttendanceModel::with('employee') queries all entries at once and grabs their related employee
        ->addColumn('actions', function ($item) use ($user) { // adds extra column to contain action
            // make column blank if employee
            if ($user->hasRole('employee')){
                return '';
            }

            return view('partials.actions', [ // partial modular file, taking the item id and routes each should go to
                'item' => $item,
                'routes' => [
                    'edit' => 'attendance.edit',
                    'destroy' => 'attendance.destroy',
                ]
            ])->render();
        })
        // edits a column so that 
        ->editColumn('id_employee', function ($item) {
            return $item->employee ? $item->employee->nama_lengkap : '-'; // replace id with name
        })
        // new parts! these are just to reformat the date time
        ->editColumn('check_in', function ($item) {
            return $item->check_in ? $item->check_in->format('Y-m-d H:i:s') : '-';
        })
        ->editColumn('check_out', function ($item) {
            return $item->check_out ? $item->check_out->format('Y-m-d H:i:s') : '-';
        })
        ->rawColumns(['actions']) // renders this column as raw, so HTML is kept
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('general.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_employee' => 'required|exists:employee,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
        ]);

        // parse with Carbon if available, if not then null
        $checkOut = $validateData['check_out'] ? Carbon::parse($validateData['check_out']) : null;

        AttendanceModel::create([
            'id_employee' => $validateData['id_employee'],
            'check_in' => Carbon::parse($validateData['check_in']), // parse with Carbon, should always be available
            'check_out' => $checkOut,
        ]);
        
        return redirect()->route('attendance.index')->with('success', 'Data telah tersimpan');
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
        $edit = AttendanceModel::findOrFail($id);

        return view('general.attendance.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'id_employee' => 'required|exists:employee,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
        ]);

        // parse with Carbon
        $checkIn = Carbon::parse($validateData['check_in']);
        // parse with Carbon if available, if not then null
        $checkOut = $validateData['check_out'] ? Carbon::parse($validateData['check_out']) : null;

        
        // update with the formatted dates
        $validateData['check_in'] = $checkIn;
        $validateData['check_out'] = $checkOut;

        $item = AttendanceModel::findOrFail($id);
        $item->update($validateData);

        return redirect()->route('attendance.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = AttendanceModel::findOrFail($id);
        $delete->delete();

        return redirect()->route('attendance.index')->with('status', 'Data telah dihapus');
    }

    public function checkIn()
    {
        // takes user
        $user = Auth::user();
        $employee = $user->employee;

        // custom error message because UX
        if (!$employee) {
            return redirect()->back()->with('error', 'No employee profile linked.');
        }

        // uses the attendance() method in the model
        // filters by the most recent in check in column, takes the first value that shows up
        $latestRecord = $employee->attendances()->latest('check_in')->first();

        // error message for if last attendance check out column is empty or not
        if ($latestRecord && $latestRecord->check_out === null) {
            return redirect()->back()->with('error', 'Please check out first before checking in again.');
        }

        // make the actual record/entry by using the attendances relationship
        $employee->attendances()->create([
            // no id_employee because relationship automatically fills
            'check_in' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Checked in successfully.');
    }

    public function checkOut()
    {
        // takes user
        $user = Auth::user();
        $employee = $user->employee;

        // custom error message because UX
        if (!$employee) {
            return redirect()->back()->with('error', 'No employee profile linked.');
        }

        // uses the attendance() method in the model
        // filters by the most recent in check in column, takes the first value that shows up
        $latestRecord = $employee->attendances()->latest('check_in')->first();

        // error message for if no existing records or the latest one isn't null
        if (!$latestRecord || $latestRecord->check_out != null) {
            return redirect()->back()->with('error', 'No active check-in found.');
        }

        // edge case check if db is faulty: multiple check ins with no checkouts
        // it finds all rows where check out column is empty and counts them
        $noCheckOutRecords = $employee->attendances()->whereNull('check_out')->count();

        // error message for edge case
        if ($noCheckOutRecords > 1) {
            return redirect()->back()->with('error', 'Multiple check-in records without check-out exists. Contact admin.');
        }

        // actually checking out
        $latestRecord->update([
            'check_out' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Checked out successfully.');
    }
}
