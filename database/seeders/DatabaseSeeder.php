<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

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

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus porttitor tincidunt. Sed pellentesque malesuada massa, in maximus orci sagittis semper. Sed at sagittis mi. Sed quis metus tortor. In vel nunc nibh. Donec a elementum nisi. Ut ac suscipit justo. Nulla sed vulputate nulla. Pellentesque laoreet efficitur dapibus. Nunc vel vulputate erat, ut porttitor augue. Vestibulum auctor purus ac magna ullamcorper, eget semper ligula fermentum. Nullam ac est at eros aliquam pretium in in tellus. '
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempus porttitor tincidunt. Sed pellentesque malesuada massa, in maximus orci sagittis semper. Sed at sagittis mi. Sed quis metus tortor. In vel nunc nibh. Donec a elementum nisi. Ut ac suscipit justo. Nulla sed vulputate nulla. Pellentesque laoreet efficitur dapibus. Nunc vel vulputate erat, ut porttitor augue. Vestibulum auctor purus ac magna ullamcorper, eget semper ligula fermentum. Nullam ac est at eros aliquam pretium in in tellus. '
        ]);

    }
}
