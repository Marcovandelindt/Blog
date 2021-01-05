<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Validation\ValidationException;

class PostObserver
{
    /**
     * Handle the "retrieved" event
     * 
     * @param \App\Models\Post $post
     */
    public function retrieved(Post $post)
    {

    }
    
    /**
     * Handle the "creating" event
     * 
     * @param \App\Models\Post $post
     */
    public function creating(Post $post)
    {
        $existing = Post::where('slug', $post->slug)->first();
        
        if ($existing) {
           throw new ValidationException([
               'error' => 'Post with this slug already exists: ' . $post->slug
           ]);
        } 
    }

    /**
     * Handle the "created" event
     * 
     * @param \App\Models\Post $post
     */
    public function created(Post $post)
    {

    }

    /**
     * Handle the "updating" event
     * 
     * @param \App\Models\Post $post
     */
    public function updating(Post $post)
    {

    }

    /**
     * Handle the "updated" event
     * 
     * @param \App\Models\Post $post
     */
    public function updated(Post $post)
    {

    }

    /**
     * Handle the "saving" event
     * 
     * @param \App\Models\Post $post
     */
    public function saving(Post $post)
    {

    }

    /**
     * Handle the "saved" event
     * 
     * @param \App\Models\Post $post
     */
    public function saved(Post $post)
    {

    }

    /**
     * Handle the "deleting" event
     * 
     * @param \App\Models\Post $post
     */
    public function deleting(Post $post)
    {

    }

    /**
     * Handle the "deleted" event
     * 
     * @param \App\Models\Post $post
     */
    public function deleted(Post $post)
    {

    }

    /**
     * Handle the "restoring" event
     * 
     * @param \App\Models\Post $post
     */
    public function restoring(Post $post)
    {

    }

    /**
     * Handle the "restored" event
     * 
     * @param \App\Models\Post $post
     */
    public function restored(Post $post)
    {

    }

    /**
     * Handle the "replicating" event
     * 
     * @param \App\Models\Post $post
     */
    public function replicating(Post $post)
    {

    }
}
