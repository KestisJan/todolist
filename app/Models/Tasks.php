<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'description', 'status'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
