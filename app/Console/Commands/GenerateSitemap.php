<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Category;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate professional sitemap with yearly split, categories, static pages, and image support.';

    public function handle()
    {
        $baseUrl = config('app.url');
        $sitemapPath = public_path('sitemaps');
        File::ensureDirectoryExists($sitemapPath);

        $sitemapIndex = SitemapIndex::create();

        /*
        |==============================
        | 1. Static Pages
        |==============================
        */
        $staticSitemap = Sitemap::create()
            ->add(Url::create(route('index'))->setPriority(1))
            ->add(Url::create(route('about')))
            ->add(Url::create(route('projects')))
            ->add(Url::create(route('contact')));

        $staticPath = "$sitemapPath/page-sitemap.xml";
        $staticSitemap->writeToFile($staticPath);
        $sitemapIndex->add("$baseUrl/sitemaps/page-sitemap.xml");

        /*
        |==============================
        | 2. Categories
        |==============================
        */
        $categorySitemap = Sitemap::create();
        foreach (Category::all() as $category) {
            $categorySitemap->add(
                Url::create(route('category.show', $category->name))
            );
        }
        $categoryPath = "$sitemapPath/category-sitemap.xml";
        $categorySitemap->writeToFile($categoryPath);
        $sitemapIndex->add("$baseUrl/sitemaps/category-sitemap.xml");

        /*
        |==============================
        | 3. Posts by year and chunks
        |==============================
        */
        $postsByYear = Post::where('is_published', true)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(fn($post) => $post->created_at->format('Y'));

        foreach ($postsByYear as $year => $posts) {
            $chunks = $posts->chunk(1000);

            foreach ($chunks as $index => $chunk) {
                $fileName = "post-sitemap{$year}-" . ($index + 1) . ".xml";
                $filePath = "$sitemapPath/$fileName";
                $postSitemap = Sitemap::create();

                foreach ($chunk as $post) {
                    $url = Url::create(route('post', $post->slug))
                        ->setLastModificationDate($post->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.9);

                    // اگر تصویر هست و در public/uploads قرار داره
                    if ($post->image) {
                        $url->addImage(asset('uploads/' . $post->image));
                    }

                    $postSitemap->add($url);
                }

                $postSitemap->writeToFile($filePath);
                $sitemapIndex->add("$baseUrl/sitemaps/$fileName");
            }
        }

        /*
        |==============================
        | 4. Sitemap Index File
        |==============================
        */
        $sitemapIndex->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ سایت‌مپ حرفه‌ای با موفقیت ساخته شد. بدون پاک شدن هیچ فایل قبلی 🚀');
    }
}
