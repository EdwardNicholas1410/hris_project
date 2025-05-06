<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert RootDept department
        $deptId = DB::table('dept')->insertGetId([
            'nama' => 'RootDept',
            'count' => 1, // Start with 1 since only 1 employee will be added
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert a placeholder employee
        $employeeId = DB::table('employee')->insertGetId([
            'nama_lengkap' => 'RootEmployee',
            'no_telp' => 123456789,
            'alamat' => 'Placeholder Address',
            'gaji_bulan' => 1000000,
            'type' => 'permanent',
            'status' => 'active',
            'id_dept' => $deptId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert Root user
        DB::table('users')->insert([
            'name' => 'RootUser',
            'email' => 'root@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'admin',
            'id_employee' => $employeeId,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
