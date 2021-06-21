<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public static $availableTypes = [
        'VIDEO' => 'VIDEO',
        'LINK' => 'LINK',
        'IMAGE' => 'IMAGE',
        'TEXT' => 'TEXT'
    ];

    protected $fillable = [
        'type',
        'source',
        'content',
        'is_public',
        'self_destruct_at'
    ];


    protected $casts = [
        'is_public' => 'boolean',
        'self_destruct_at' => 'datetime'
    ];

}
