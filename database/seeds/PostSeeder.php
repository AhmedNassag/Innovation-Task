<?php

use App\Models\Api\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create
        ([
            'title_en' => 'English Title',
            'title_ar' => 'العنوان العربى',
            'body' => 'This is The Body',
        ]);
    }
}
