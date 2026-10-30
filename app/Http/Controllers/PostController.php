<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::select('id', 'title')->withCount('comments')->with('tags');
        $tag = request('tag');
        if ($tag) {
            $query->whereHas('tags', function ($tagquery) use ($tag) {
                $tagquery->where('name', $tag);
            });
        }
        $posts = $query->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('tags', 'comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
