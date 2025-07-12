@extends('layouts.master')
@section('extra-meta')
   <title>{{$post->title}}</title>
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
    <meta name="author" content="آراد حبیبی">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url()->current()}}" />
    <!-- OG Basic meta_description -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:title" content="{{$post->title}}">
    <meta property="og:description" content="{{$post->meta_description}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:site_name" content="Arad Notes📒 - آراد حبیبی">
    <!-- OG Image -->
    <meta property="og:image" content="{{url("/uploads/images/" . $post->image)}}">
    <meta property="og:image:alt" content="{{$post->title}}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$post->title}}">
    <meta name="twitter:description" content="
        {{$post->meta_description}}">
    <meta name="twitter:image" content="{{url("/uploads/images/" . $post->image)}}">
    <meta name="twitter:site" content="{{env("APP_URL")}}">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        },
        "headline": "{{ $post->title }}",
        "description": "{{ $post->meta_description }}",
        "image": "{{ url('/uploads/images/' . $post->image) }}",
        "author": {
            "@type": "Person",
            "name": "آراد حبیبی,
            "url": "https://{{env("APP_URL")}}/about"
        },
        "publisher": {
            "@type": "Organization",
            "name": "آراد حبیبی",
            "logo": {
            "@type": "ImageObject",
            "url": "{{ url('logo.ico') }}"
            }
        },
        "datePublished": "{{ $post->created_at->toDateString() }}",
        "dateModified": "{{ $post->updated_at->toDateString() }}"
        }
    </script>
@endsection
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- بخش اصلی مقاله -->
            <section class="md:col-span-2">
                <article class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                    <!-- عنوان مقاله -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">{!! $post->title !!}</h1>
                    <!-- اطلاعات متا -->
                    <p class="text-gray-600 text-sm mb-6">
                        تاریخ انتشار: {!! $post->created_at_jalali !!} | نویسنده: آراد | بازدید: {{ $post->views }}
                    </p>

                    <!-- تصویر اصلی مقاله -->
                    <img src="{{env("APP_URL") ."/uploads//" .  $post->image }}" alt="{{ $post->title }}" class="w-full min-h-80 max-h-96 rounded-lg mb-8 shadow-md object-cover">

                    <!-- محتوای کامل مقاله -->
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                        {!! $post->content !!}
                    </div>
                </article>
            </section>
            @include('layouts.aside')
        </div>

    </main>
@endsection
