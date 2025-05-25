<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\DeptModel;
use App\Models\LeaveRequestModel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // take user account, so can take employee
        $user = Auth::user();
        $employee = $user->employee;

        // default variable values
        $lastAttendance = null;
        $checkedIn = false;

        if ($employee) {
            $lastAttendance = $employee->attendances()->latest('check_in')->first();
            $checkedIn = $lastAttendance && $lastAttendance->check_out === null;
        }

        // data initialize
        $deptChartData = null;
        $leaveChartData = null;

        // for admins display dept
        if ($user->hasRole('admin')) {
            $deptChartData = DeptModel::select('nama', 'count')->get();
        }

        // for hr display leave requests
        if ($user->hasRole('HR')) {
            $leaveChartData = LeaveRequestModel::selectRaw('status_request, COUNT(*) as total')
                ->groupBy('status_request')
                ->get();
        }

        return view('home', compact(
            'lastAttendance',
            'checkedIn',
            'deptChartData',
            'leaveChartData'
        ));
    }
}
