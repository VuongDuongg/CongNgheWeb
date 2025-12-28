<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Student extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'student_code',
        'name',
        'email',
        'phone',
        'date_of_birth',
        'class_id',
        'gender',
        'status'
    ];

    public function classs()
    {
        return $this->belongsTo(Classs::class, 'class_id');
    }
}
