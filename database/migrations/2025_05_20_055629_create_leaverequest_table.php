<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaverequest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_employee')->constrained('employee');
            $table->enum('jenis_cuti', ['sakit', 'izin', 'dibayar']);
            $table->date('tanggal_cuti');
            $table->date('tanggal_kembali');
            $table->enum('status_request', ['accepted', 'rejected', 'pending'])->default('pending');
            $table->enum('pembuat_request', ['employee', 'HR', 'admin'])->default('employee');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaverequest');
    }
};
