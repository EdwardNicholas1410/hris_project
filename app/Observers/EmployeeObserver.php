<?php

namespace App\Observers;

use App\Models\EmployeeModel;

class EmployeeObserver
{
    /**
     * Handle the EmployeeModel "created" event.
     */
    public function created(EmployeeModel $employeeModel): void
    {
        //
    }

    /**
     * Handle the EmployeeModel "updated" event.
     */
    public function updated(EmployeeModel $employeeModel): void
    {
        //
    }

    /**
     * Handle the EmployeeModel "deleted" event.
     */
    public function deleted(EmployeeModel $employeeModel): void
    {
        //
    }

    /**
     * Handle the EmployeeModel "restored" event.
     */
    public function restored(EmployeeModel $employeeModel): void
    {
        //
    }

    /**
     * Handle the EmployeeModel "force deleted" event.
     */
    public function forceDeleted(EmployeeModel $employeeModel): void
    {
        //
    }
}
