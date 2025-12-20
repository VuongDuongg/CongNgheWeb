<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';          // 👈 NÊN KHAI BÁO RÕ
    protected $primaryKey = 'issues_id';  // 👈 KHÓA CHÍNH

    public $timestamps = true;            // 👈 dùng created_at

    protected $fillable = [
        'computer_id',
        'reported_by',
        'severity',
        'status',
    ];

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id', 'computer_id');
    }
}
