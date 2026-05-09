<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class school extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'principal',
        'address',
    ];

    protected $table ='schools';
}
