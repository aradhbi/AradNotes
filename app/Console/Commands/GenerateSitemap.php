<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Category;
use Spatie\Sitemap\SitemapIndex;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
protected $signature = 'sitemap:full';
    protected $description = 'Generate full sitemap with multiple files by year and categories';

    public function handle()
    {
        $baseUrl = config('app.url');
        $sitemapPath = public_path('sitemaps');
        File::ensureDirectoryExists($sitemapPath);

        // حذف فایل‌های قبلی
        File::cleanDirectory($sitemapPath);

        $sitemapIndex = SitemapIndex::create();

        // دسته‌بندی‌ها
        $categorySitemap = Sitemap::create();
        foreach (Category::all() as $category) {
            $categorySitemap->add(
                Url::create(route('category.show', $category->name))
            );
        }
        $categorySitemap->writeToFile("$sitemapPath/sitemap-categories.xml");
        $sitemapIndex->add("$baseUrl/sitemaps/sitemap-categories.xml");

        // پست‌ها بر اساس سال
        $posts = Post::where('is_published', true)->get()->groupBy(function ($post) {
            return $post->created_at->format('Y');
        });

        foreach ($posts as $year => $yearPosts) {
            $yearSitemap = Sitemap::create();
            foreach ($yearPosts as $post) {
                $url = Url::create(route('post', $post->slug))
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.9);

                if ($post->image) {
                    $url->addImage(asset('storage/' . $post->image));
                }

                $yearSitemap->add($url);
            }

            $filename = "sitemap-posts-$year.xml";
            $yearSitemap->writeToFile("$sitemapPath/$filename");
            $sitemapIndex->add("$baseUrl/sitemaps/$filename");
        }

        // فایل اصلی sitemap.xml
        $sitemapIndex->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Full Sitemap generated successfully.');
    }
}
