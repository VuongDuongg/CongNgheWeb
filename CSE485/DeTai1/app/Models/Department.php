<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Department extends Model
{
    use HasFactory;
    //
    protected $primaryKey = 'id_department';
    protected $fillable = [
        'name_department',
        'location_department',
        'manager_department',
    ];

    function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id_department');
    }
}
