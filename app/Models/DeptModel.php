<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeptModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dept'; 

    protected $fillable = ['nama'];

    protected $casts = [
        'nama' => 'string',
        'count' => 'integer',
    ];

    public function employees()
    {
        return $this->hasMany(EmployeeModel::class, 'id_dept');
    }
}
