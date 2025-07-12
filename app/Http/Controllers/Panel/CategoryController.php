<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("created_at","desc")->get();
        return view("admin.categories.index", compact("categories"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name'));

        return redirect()->back()->with('success', 'دسته بندی با موفقیت ایجاد شد.');
    }

    public function destroy(Category  $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'دسته بندی با موفقیت حذف شد.');
    }
}
