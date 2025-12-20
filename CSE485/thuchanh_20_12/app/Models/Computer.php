<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $primaryKey = 'computer_id';

    public function issues()
    {
        return $this->hasMany(Issue::class, 'computer_id', 'computer_id');
    }
}
