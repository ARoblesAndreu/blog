<?php

use Illuminate\Database\Seeder;
use App\Post;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $post = new Post();
        $post->title = "Mi primer Post";
        $post->slug = str_slug("Mi primer Post");
        $post->excerpt = "Extracto de mi primer Post";
        $post->body = "<p>Contenido de mi primer Post<p/>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(['1','2']);

        $post = new Post();
        $post->title = "Mi segundo Post";
        $post->slug = str_slug("Mi segundo Post");
        $post->excerpt = "Extracto de mi segundo Post";
        $post->body = "<p>Contenido de mi segundo Post<p/>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(['2','3']);

        $post = new Post();
        $post->title = "Mi tercer Post";
        $post->slug = str_slug("Mi tercer Post");
        $post->excerpt = "Extracto de mi tercer Post";
        $post->body = "<p>Contenido de mi tercer Post<p/>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 1;
        $post->save();

        $post->tags()->attach(['3','4']);

        $post = new Post();
        $post->title = "Mi cuarto Post";
        $post->slug = str_slug("Mi cuarto Post");
        $post->excerpt = "Extracto de mi cuarto Post";
        $post->body = "<p>Contenido de mi cuarto Post<p/>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->save();

        $post->tags()->attach(['1','4']);
    }
}
