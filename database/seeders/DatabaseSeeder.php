<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'slug' => 'my-family-post',
            'title' => 'Family Post',
            'excerpt' => '<p>This is a family post</p>',
            'body' => '<p>This is a personal post. It is seeded by laravel seeder class.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'slug' => 'my-work-post',
            'title' => 'Work Post',
            'excerpt' => '<p>This is a work post</p>',
            'body' => '<p>This is a work post. Everything related to my work.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobbies->id,
            'slug' => 'my-hobbies-post',
            'title' => 'Hobbies Post',
            'excerpt' => '<p>This is a hobiies post</p>',
            'body' => '<p>This is hobbies post. I have a lot of hobbies.</p>'
        ]);

    }
}
