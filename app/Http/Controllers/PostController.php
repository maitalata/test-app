<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view(
            'posts',
            [
                'posts' => $this->getPost(),
                'categories' => Category::all()
            ]
        );
    }

    public function show(Post $post)
    {
        return view('post', [
                'post' => $post
            ]
        );
    }

    public function getPost()
    {
        return Post::latest()->filter()->get();
    }

}
