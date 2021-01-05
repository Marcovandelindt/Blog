<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Attributes which are mass assignable
     */
    protected $fillable = [
        'online',
        'title',
        'body',
        'slug',
        'author_id'
    ];

    /**
     * Return an instance of the author of the post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
