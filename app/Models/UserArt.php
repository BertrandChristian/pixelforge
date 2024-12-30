<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserArt extends Model
{
    use HasFactory;

    protected $table = 'users_art';

    protected $fillable = [
        'users_id',
        'art_art_id',
        'like_status'
    ];

    public function art()
    {
        return $this->belongsTo(Art::class, 'art_id', 'art_art_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
