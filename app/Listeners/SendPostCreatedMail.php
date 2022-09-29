<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $post = Post::find($event->post->id);
        if (!$post) {
            return;
        }
        Mail::to(auth()->user()->email)->queue(new PostCreatedMail($event->post));
    }
}
