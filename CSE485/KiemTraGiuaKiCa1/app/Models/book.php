<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    //
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'member_id',
        'title',
        'author',
        'isbn',
        'publication_year',
        'copies_available', 
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

}
