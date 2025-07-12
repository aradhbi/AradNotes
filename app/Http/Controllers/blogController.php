<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class blogController extends Controller
{

    public function post(Post $post)
    {
        // incerment the view count
        $post->increment('views');

        return view('post', compact('post'));
    }
    public function categoryPosts(Category $category)
    {

        $posts = $category->posts()
                        ->where('is_published', true)->latest()
                        ->paginate(5);

        return view('index', compact('category', 'posts'));
    }

}
