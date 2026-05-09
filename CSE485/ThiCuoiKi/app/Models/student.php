<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    //
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['school_id', 'full_name', 'email', 'phone'];
    public function school(){
        return $this->belongsTo(school::class, 'school_id');
    }
}
