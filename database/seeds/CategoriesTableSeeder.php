<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::all(['id'])->pluck('id');

        factory(Category::class, 30)->make()
            ->each(function ($category) use ($userIds) {
                $category->user_id = $userIds->random(1)->first();

                $category->save();
            });
    }
}
