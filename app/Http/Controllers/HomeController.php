<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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

        return view('home', compact('lastAttendance', 'checkedIn'));
    }
}
