<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    //
    protected $primaryKey = 'id_employee';
    protected $fillable = [
        'name_employee',
        'email_employee',
        'position_employee',
        'department_id',
        'phone_employee',
        'salary_employee',
    ];
    function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id_department');
    }
}
