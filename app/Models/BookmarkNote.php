<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookmark_id',
        'parent_id',
        'content'
    ];

    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class);
    }

    public function parent()
    {
        return $this->belongsTo(BookmarkNote::class, 'parent_id');
    }
}
