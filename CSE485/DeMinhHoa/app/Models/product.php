<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class product extends Model
{
    //
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'description', 'store_id'];

    public function store(){
        return $this->belongsTo(Store::class, 'store_id');
    }

}

