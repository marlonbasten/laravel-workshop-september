<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class DeleteOldPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete posts older than 3 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Post::where('created_at', '<=', now()->subDays(3))->delete();

        return 0;
    }
}
