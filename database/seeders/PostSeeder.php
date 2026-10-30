<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'PHPの基礎',
                'tag_id' => [1, 4],
            ],
            [
                'title' => 'PHPの応用',
                'tag_id' => 1,
            ],
            [
                'title' => 'JavaScriptの基礎',
                'tag_id' => [3, 4],
            ],
            [
                'title' => 'JavaScriptの応用',
                'tag_id' => 3,
            ],
            [
                'title' => 'Laravelのリレーション入門',
                'tag_id' => [2, 4],
            ],
        ];
        foreach ($posts as $data) {
            $post = Post::factory()->create([
                'title' => $data['title'],
            ]);
            $post->tags()->attach($data['tag_id']);
        }
    }
}
