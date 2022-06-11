<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body', 'image', 'is_public', 'theme_name', 'background_color', 'text_color'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
