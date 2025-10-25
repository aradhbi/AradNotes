<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all(); // Assuming you have a Category model
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create validate all request image,title,category,desc,published status,slug,keywords
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'slug' => 'required|string|unique:posts',
            'image' => 'nullable|image|max:20480',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        // image upload if exists stroage/app/public/posts
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 's3');
        } else {
            $imagePath = null;
        }
        // create post
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published,
            'slug' => $request->slug,
            'image' => $imagePath,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        // $workerUrl = 'https://telegram-proxy.aradhabibi1387.workers.dev/';
        // $token = '7121855189:AAHBasSgcIcBlG18kQ-WNnAmyhjN_U1nLn0';
        // $chatId = '@aradnotes';
        // $cleanContent = strip_tags($request->content, '<b><i><u><a><code><pre>'); // فقط تگ‌های مجاز
        // Http::post("{$workerUrl}bot{$token}/sendMessage", [

        //     'chat_id' => $chatId,
        //     'text' => "{$request->title}\n\n{$cleanContent}",
        //     "parse_mode"=>"HTML"
        // ]);
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = \App\Models\Category::all(); // Assuming you have a Category model
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // validate all request image,title,category,desc,published status,slug,keywords
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'image' => 'nullable|image|max:20480',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);
        // image upload if exists stroage/app/public/posts
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 's3');
        } else {
            $imagePath = $post->image; // keep the old image if no new one is uploaded
        }
        // update post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published,
            'slug' => $request->slug,
            'image' => $imagePath,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
