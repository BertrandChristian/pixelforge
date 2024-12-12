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
        'users_id',
    ];

    protected $primaryKey = 'art_id';

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
