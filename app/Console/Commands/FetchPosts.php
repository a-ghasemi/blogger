<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class FetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Posts from some URL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Fetch Posts, No Duplicates');

        $url = 'https://jsonplaceholder.typicode.com/posts';
        $items = json_decode(file_get_contents($url), true);

        $ret = [0, 0];

        $model = Post::class;
        foreach ($items as $item) {
            $ret[1]++;
            if ($model::find($item['id'])) {
                continue;
            }
            $model::create($item);
            $ret[0]++;
        }

        $this->info("Finished, {$ret[0]} imported, {$ret[1]} total");
    }
}
