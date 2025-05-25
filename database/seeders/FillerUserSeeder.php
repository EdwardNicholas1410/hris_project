<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EmployeeModel;
use App\Models\DeptModel;
use Spatie\Permission\Models\Role;


class FillerUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create departments
        $deptGeneral = DeptModel::create(['nama' => 'General']);
        $deptHR = DeptModel::create(['nama' => 'Human Resources']);

        $departments = [$deptGeneral, $deptHR];

        // Helper function to create employee + user
        $makeUser = function ($name, $email, $role, $dept) {
            $employee = EmployeeModel::create([
                'nama_lengkap' => $name,
                'no_telp' => '08' . rand(100000000, 999999999),
                'alamat' => 'Some Street, Some City',
                'gaji_bulan' => rand(3000000, 8000000),
                'type' => 'permanent',
                'id_dept' => $dept->id,
            ]);

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => $role,
                'id_employee' => $employee->id,
            ]);

            $user->assignRole($role);
        };

        // admin user (in General)
        $makeUser('Admin User', 'admin@example.com', 'admin', $deptGeneral);

        // HR user (in HR)
        $makeUser('HR User', 'hr@example.com', 'HR', $deptHR);

        // 10 employee users, random dept assignment
        for ($i = 1; $i <= 10; $i++) {
            $dept = $departments[array_rand($departments)];
            $makeUser("Employee $i", "employee$i@example.com", 'employee', $dept);
        }
    }
}