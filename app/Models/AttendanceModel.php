<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'attendance'; 

    protected $fillable = [
        'id_employee',
        'check_in',
        'check_out',
    ];

    protected $casts = [
        'id_employee' => 'integer',
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'id_employee');
    }
}
