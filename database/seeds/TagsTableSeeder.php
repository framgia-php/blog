<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::pluck('id');

        factory(Tag::class, 30)->make()
            ->each(function ($tag) use ($userIds) {
                $tag->user_id = $userIds->random(1)->first();
                $tag->save();
            });
    }
}
