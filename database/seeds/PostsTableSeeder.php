<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = Tag::pluck('id');
        $userIds = User::pluck('id');
        $categoryIds = Category::pluck('id');

        factory(Post::class, 40)->make()
            ->each(function ($post) use ($tagIds, $userIds, $categoryIds) {
                $post->user_id = $userIds->random(1)->first();
                $post->category_id = $categoryIds->random(1)->first();

                $post->save();

                $post->tags()->attach($tagIds->random(3)->all());
            });
    }
}
