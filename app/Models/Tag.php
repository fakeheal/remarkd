<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'description'
    ];

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class);
    }

}
