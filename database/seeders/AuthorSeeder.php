<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory(10)->create()->each(function ($author) {
            Book::factory(rand(1, 5))->create([
                'author_id' => $author->id
            ]);
        });
    }
}
