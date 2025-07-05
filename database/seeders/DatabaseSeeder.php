<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\String\ByteString;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=> bcrypt(12345678),
        ]);

        Category::factory(10)->create();
        Post::factory(50)->create();
        tag::factory(20)->create();

        
    }
}
