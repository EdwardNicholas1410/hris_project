<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // defining permissions
        $permissions = [
            // dept table
            'dept.index', 'dept.data', 'dept.create', 'dept.store', 'dept.edit', 'dept.update', 'dept.destroy',

            // employee table
            'employee.index', 'employee.data', 'employee.create', 'employee.store', 'employee.edit', 'employee.update', 'employee.destroy',

            // user table
            'user.index', 'user.data', 'user.create', 'user.store', 'user.edit', 'user.update', 'user.destroy',

            // attendance stuff
            'attendance.index', 'attendance.data', 'attendance.create', 'attendance.store', 'attendance.edit', 'attendance.update', 'attendance.destroy', 'attendance.check-in', 'attendance.check-out',

            // leave stuff
            'leave_request.index', 'leave_request.data', 'leave_request.create', 'leave_request.store', 'leave_request.edit', 'leave_request.update', 'leave_request.status', 'leave_request.destroy', 'leave_request.show',
        ];

        // for loop to create them
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // roles
        $employee = Role::firstOrCreate(['name' => 'employee']);
        $hr = Role::firstOrCreate(['name' => 'HR']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // permissions for employee
        $employee->syncPermissions([
            'attendance.check-in',
            'attendance.check-out',
            'attendance.index',
            'attendance.data',

            'leave_request.index',
            'leave_request.data',
            'leave_request.create',
            'leave_request.store',
            'leave_request.edit',
            'leave_request.update',
            'leave_request.destroy',
            'leave_request.show',
        ]);

        // Assign permissions to HR
        $hr->syncPermissions([
            // employee permissions
            'employee.index', 'employee.data', 'employee.create', 'employee.store',
            'employee.edit', 'employee.update', 'employee.destroy',

            // dept permissions
            'dept.index', 'dept.data', 'dept.create', 'dept.store', 'dept.edit', 'dept.update', 'dept.destroy',

            // attendance permissions
            'attendance.index', 'attendance.data', 'attendance.create', 'attendance.store',
            'attendance.edit', 'attendance.update', 'attendance.destroy',
            'attendance.check-in', 'attendance.check-out',

            // leave request permissions
            'leave_request.index', 'leave_request.data', 'leave_request.create', 'leave_request.store',
            'leave_request.edit', 'leave_request.update', 'leave_request.status', 'leave_request.destroy', 'leave_request.show',
        ]);

        // assign all to admin
        $admin->syncPermissions(Permission::all());
    }
}
