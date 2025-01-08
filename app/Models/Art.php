<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $fillable = [
        'art_id',
        'art_picture',
        'name',
        'like',
        'description',
    ];

    protected $primaryKey = 'art_id';

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_art', 'art_art_id', 'users_id')
            ->withPivot('like_status');
    }
    public function userLikes()
    {
        return $this->belongsToMany(User::class, 'users_art', 'art_art_id', 'users_id')
            ->withPivot('like_status')
            ->wherePivot('like_status', true);
    }

    public function usersArt()
    {
        return $this->belongsToMany(User::class, 'users_art', 'art_art_id', 'users_id')
            ->withPivot('like_status');
    }
}
