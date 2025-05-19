<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'employee'; 

    protected $fillable = [
        'nama_lengkap',
        'no_telp',
        'alamat',
        'gaji_bulan',
        'type',
        'status',
        'id_dept',
    ];

    // ensures correct data types
    protected $casts = [
        'nama_lengkap' => 'string',
        'no_telp' => 'string',
        'alamat' => 'string',
        'gaji_bulan' => 'integer',
        'type' => 'string',
        'status' => 'string',
        'id_dept' => 'integer',
    ];

    public function department()
    {
        return $this->belongsTo(DeptModel::class, 'id_dept')->withTrashed();  // Using DeptModel as the related model, withTrashed so deleted departments still show
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_employee');
    }
}
