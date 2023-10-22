<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $users = User::all();

        foreach ($users as $user) {
            for ($i=0; $i < rand(1,5); $i++) { 
                Post::factory()->create([
                    'user_id' => $user->id
                ]); 
            }
        }

        $posts = Post::all();

        foreach ($posts as $post) {
            $users = User::all()->shuffle();
            for ($i=0; $i < rand(1,5); $i++) { 
                $post->likes()->create([
                    'user_id' => $users->pop()->id
                ]);
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
