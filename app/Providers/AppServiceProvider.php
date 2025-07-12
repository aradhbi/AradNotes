<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.aside', function ($view) {
            $view->with('lastPosts', Post::where('is_published', true)->latest()->take(6)->get());
            $view->with('mostViewedPosts', Post::where('is_published', true)->orderBy('views', 'desc')->take(6)->get());
            $view->with('categories', Category::whereHas('publishedPosts')->withCount('publishedPosts')->get());


        });
        View::composer(['layouts.aside','about'], function ($view) {
            $view->with('about', \App\Models\About::with(['skills', 'interests'])->first());
        });
    }
}
