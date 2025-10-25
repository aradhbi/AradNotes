@extends('layouts.master')
@section('extra-meta')
    <meta name="description" content="وبلاگ شخصی من - مقالات و یادداشت‌های روزمره">
    <meta name="keywords" content="وبلاگ, مقالات, یادداشت‌ها, شخصی, آراد">
    <meta name="author" content="آراد">
    <title>Arad Notes📒</title>
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- بخش مقالات/پست‌ها -->
            <section class="md:col-span-2 space-y-8">
                <!-- مقاله ۱ -->

                @foreach ($posts as $post)
                    <article class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-300 ">
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">{!! $post->title !!}</h2>
                        <p class="text-gray-600 text-sm mb-4">تاریخ انتشار: {!! $post->created_at_jalali !!} </p>
                        <img src="{{ Storage::disk('s3')->url($post->image) }}" alt="تصویر مقاله ۱" class="w-full h-80 rounded-lg mb-4 shadow-sm border border-gray-200 object-cover" loading="lazy">
                        <p class="text-lg text-gray-700 leading-relaxed mb-4">
                            {!! Str::limit($post->meta_description, 150, '...') !!}
                        </p>
                        <a href="{{ route('post',$post->slug) }}" class="inline-block px-6 py-2 rounded-lg font-medium shadow-md newspaper-button">ادامه مطلب</a>
                    </article>
                @endforeach
            </section>
            @include('layouts.aside')
            {{ $posts->onEachSide(1)->links() }}

        </div>
    </main>
@endsection
