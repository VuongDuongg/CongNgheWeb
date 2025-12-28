<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class member extends Model
{
    //
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'member_code',
        'fullname',
        'email',
        'phone',
        'membership_type',
    ];
}
