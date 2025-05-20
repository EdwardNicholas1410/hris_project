<?php

namespace App\Observers;

use App\Models\EmployeeModel;
use App\Models\DeptModel;


class EmployeeObserver
{
    /**
     * Handle the EmployeeModel "created" event.
     */
    public function created(EmployeeModel $employeeModel): void
    {
        // increase the count of assigned dept
        DeptModel::where('id', $employeeModel->id_dept)
        ->increment('count');
    }

    /**
     * Handle the EmployeeModel "updated" event.
     */
    public function updated(EmployeeModel $employeeModel): void
    {
        // sync any changes
        if ($employeeModel->isDirty('id_dept')) {
        DeptModel::where('id', $employeeModel->getOriginal('id_dept'))
            ->decrement('count');
        DeptModel::where('id', $employeeModel->id_dept)
            ->increment('count');
    }
    }

    /**
     * Handle the EmployeeModel "deleted" event.
     */
    public function deleted(EmployeeModel $employeeModel): void
    {
        // decrement a dept count when employee deleted
        DeptModel::where('id', $employeeModel->id_dept)
        ->decrement('count');

        // delete the related user
        if ($employeeModel->user) {
            $employeeModel->user->delete();
        }

        $employeeModel->attendances()->delete(); // delete all the attendance records in their name
    }

    /**
     * Handle the EmployeeModel "restored" event.
     */
    public function restored(EmployeeModel $employeeModel): void
    {
        if ($employeeModel->user()->withTrashed()->exists()) {
            $employeeModel->user()->withTrashed()->restore();
        }

        $employeeModel->attendances()->withTrashed()->restore();
    }

    /**
     * Handle the EmployeeModel "force deleted" event.
     */
    public function forceDeleted(EmployeeModel $employeeModel): void
    {
        //
    }
}
