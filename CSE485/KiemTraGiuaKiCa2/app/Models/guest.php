<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class guest extends Model
{
    //
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = [
        'guest_name',
        'email',
        'phone',
        'nationality',
        'id_number',
    ];
}
