<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class AutoLoginLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','token'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
