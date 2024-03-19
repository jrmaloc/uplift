<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'caption',
        'description',
        'user_id',
        'reaction_count',
        'privacy',
    ];

    protected $table = 'posts';
}
