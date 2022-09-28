<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private Post $post)
    {
    }

    public function build(): self
    {
        return $this->from('mark@facebook.com')->subject('Vielen Dank für Ihren Post!')->view('mails.post.created', [
            'post' => $this->post,
        ]);
    }
}
