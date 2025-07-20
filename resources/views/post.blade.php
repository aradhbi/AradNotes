@extends('layouts.master')
@section('title',$post->title)
@section('extra-meta')
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
    <style>
        h2{
            font-size: larger;
            font-weight: 600;
        }
        h3{
            font-size: medium;
            font-weight: 600;
        }
        /* استایل‌دهی به کانتینر اصلی بلوک کد */
        .ql-code-block-container {
            background-color: #282c34; /* رنگ پس‌زمینه اصلی برای تم تیره (مشابه Atom One Dark) */
            color: #abb2bf; /* رنگ متن پیش‌فرض */
            font-family: 'Fira Code', 'Cascadia Code', 'Consolas', 'Monaco', monospace; /* فونت مونو‌اسپیس برای کد */
            padding: 1.5rem; /* فاصله داخلی */
            border-radius: 0.5rem; /* گوشه‌های گرد */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* سایه برای عمق بیشتر */
            /* overflow-x: auto; /* برای خطوط طولانی، اسکرول افقی را فعال می‌کند - با white-space: pre-wrap دیگر نیازی نیست */
            direction: ltr; /* اطمینان از جهت‌دهی چپ به راست برای کد */
            max-width: 90%; /* حداکثر عرض برای ریسپانسیو بودن */
            width: 100%; /* عرض کامل در داخل حداکثر عرض */
        }

        /* استایل‌دهی به هر خط کد */
        .ql-code-block {
            line-height: 1.6; /* ارتفاع خط برای خوانایی بهتر */
            white-space: pre-wrap; /* خطوط طولانی اکنون Wrap می‌شوند */
            word-break: break-word; /* اطمینان از شکستن کلمات طولانی برای جلوگیری از سرریز */
            padding-left: 0.5rem; /* کمی تورفتگی برای خطوط کد */
            transition: background-color 0.2s ease; /* انیمیشن برای تغییر رنگ پس‌زمینه */
            font-size: 0.9rem; /* اندازه فونت کمی کوچک‌تر شد */
            font-weight: normal; /* ضخامت فونت به حالت عادی تنظیم شد */
        }

        /* استایل‌دهی برای خطی که دارای ویژگی data-language="plain" است (مانند "php") */
        .ql-code-block[data-language="plain"] {
            color: #61afef; /* رنگ آبی برای برجسته‌سازی زبان */
            font-weight: bold; /* پررنگ کردن متن */
            padding-bottom: 0.5rem; /* فاصله پایین */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* خط جداکننده زیر زبان */
            margin-bottom: 0.5rem; /* فاصله از خطوط بعدی */
            text-transform: uppercase; /* تبدیل به حروف بزرگ */
            width: 100%; /* اطمینان از اینکه خط جداکننده تمام عرض را پوشش می‌دهد */
            box-sizing: border-box; /* برای محاسبه صحیح عرض با در نظر گرفتن padding */
        }

        /* استایل‌دهی برای خط "CopyEdit" (اگر بخواهیم آن را متمایز کنیم) */
        .ql-code-block:nth-child(2) { /* این انتخابگر دومین ql-code-block را هدف قرار می‌دهد */
            color: #c678dd; /* رنگ بنفش برای برجسته‌سازی (مثلاً برای عملیات) */
            font-style: italic; /* ایتالیک کردن متن */
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* استایل‌دهی برای خطوط کد واقعی */
        .ql-code-block:not([data-language="plain"]):not(:nth-child(2)) {
            color: #abb2bf; /* رنگ متن پیش‌فرض برای کد */
        }

        /* استایل‌دهی هنگام هاور روی خطوط کد (اختیاری) */
        .ql-code-block:hover {
            background-color: rgba(255, 255, 255, 0.05); /* هایلایت خفیف هنگام هاور */
        }

        /* استایل‌دهی برای کلمات کلیدی (مثال: function, return) - بدون تغییر HTML، این کار دشوار است.
           اینجا فقط یک مثال است و نیاز به پردازشگر کد یا کلاس‌های بیشتر دارد. */
        /* این بخش فقط یک مثال مفهومی است و در این HTML کار نمی‌کند */
        /* .ql-code-block span.keyword { color: #c678dd; } */
        /* .ql-code-block span.string { color: #98c379; } */
        /* .ql-code-block span.variable { color: #e06c75; } */
    </style>
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
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-3">
                        {!! $post->content !!}
                    </div>
                </article>
            </section>
            @include('layouts.aside')
        </div>

    </main>
@endsection
