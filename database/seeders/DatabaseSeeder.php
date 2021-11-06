<?php

namespace Database\Seeders;

use App\Models\Author;
use Database\Factories\AuthorFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AuthorFactory::factoryForModel(Author::class)->count(50)->create();
    }
}
