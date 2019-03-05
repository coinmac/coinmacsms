<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Phonebook;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Post::class, 30)->create();
        factory(Phonebook::class, 30)->create();
    }
}
