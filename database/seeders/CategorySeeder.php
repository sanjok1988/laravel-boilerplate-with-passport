<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Sanjok\Blog\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name' => 'uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'name' => 'Entertainment',
                'slug' => 'entertainment'
            ],
            [
                'name' => 'Social',
                'slug' => 'social'
            ],
            [
                'name' => 'Main',
                'slug' => 'main'
            ]
        );
    }
}
