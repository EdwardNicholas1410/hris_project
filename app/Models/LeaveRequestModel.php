<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveRequestModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leaverequest';
    protected $fillable = [
        'id_employee',
        'jenis_cuti',
        'tanggal_cuti',
        'tanggal_kembali',
        'status_request',
        'pembuat_request',
    ];

    protected $casts = [
        'id_employee' => 'integer',
        'jenis_cuti' => 'string',
        'tanggal_cuti' => 'date',
        'tanggal_kembali' => 'date',
        'status_request' => 'string',
        'pembuat_request' => 'string',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'id_employee');
    }
}
