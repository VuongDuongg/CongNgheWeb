<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class store extends Model
{
    //
    use HasFactory;
    protected $table = 'stores';
    protected $filltable = ['name', 'address', 'phone'];
}
