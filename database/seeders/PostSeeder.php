<?php

use Sanjok\Blog\Models\User;
use Sanjok\Blog\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 2)->create()->each(function ($user) {
            $posts = factory(Post::class, 10)->make();
            $user->posts()->saveMany($posts);
        });
        // factory(Post::class, 50)->create();
    }
}
