<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cookie;

class blogController extends Controller
{

    public function post(Request $request,Post $post)
    {
        $minutes = 24 * 60; // 24 ساعت

        // کلید کوکی برای هر پست
        $cookieName = 'viewed_post_' . $post->id;

        // اگر کوکی موجود نباشه، ویو شمارش می‌شه
        if (! $request->hasCookie($cookieName)) {
            $post->increment('views');

            // کوکی می‌ذاریم تا 24 ساعت اعتبار داشته باشه
            Cookie::queue($cookieName, true, $minutes);
        }

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
