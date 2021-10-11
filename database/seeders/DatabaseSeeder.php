<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (in_array(App::environment(), ['local', 'develop', 'stage'])) {
            if (!User::first()) {
                User::factory(10)->create();
            }
            if (!Post::first()) {
                Post::factory(10)->create();
            }
        }
    }

}
