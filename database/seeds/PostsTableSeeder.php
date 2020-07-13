<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $dataPost = [
            [
            'title' => 'Um lindo dia de verao',
            'content' => 'Era uma vez em uma linda cidade perto das montanhas e a beira de um lago...',
            'slug' => 'um-lindo-dia-de-verao'
            ],
            [
            'title' => 'How to get away with murder',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug' => 'how-to-get-away-with-murder'
            ]
        ];
        foreach ($dataPost as $singlePost) {
            $newPost = new Post;
            $newPost->title = $singlePost['title'];
            $newPost->content = $singlePost['content'];
            $newPost->save();
        }
    }
}
