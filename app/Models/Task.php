<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'comment',
        'date',
        'mins_spent'
    ];

    protected $nullable = [
        'comment'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
