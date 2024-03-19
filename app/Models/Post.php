<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    use HasRelationships;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
