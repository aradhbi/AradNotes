@extends('layouts.master')
@section('title','درباره ما')
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12 flex-grow">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-md border border-gray-200 max-w-4xl mx-auto">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- تصویر پروفایل -->
                <div class="flex-shrink-0">
                    <img src="{{ Storage::disk('s3')->url($about->image) }}" alt="{{ $about->title }}" class="w-48 h-48 rounded-full object-cover shadow-lg border-4 border-blue-400 p-1">
                </div>
                <!-- متن درباره من -->
                <div class="text-center md:text-right flex-grow">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">سلام! من {{ $about->title }} هستم.</h1>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        {{ $about->description }}
                    </p>
                </div>
            </div>

            <hr class="my-8 border-gray-300">
            <!-- بخش مهارت‌ها و علایق -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">مهارت‌ها</h2>
                    <ul class="list-disc list-inside space-y-2 text-lg text-gray-700">
                        @foreach ($about->skills as $skill)
                            <li>{{ $skill->title }}</li>

                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">علایق</h2>
                    <ul class="list-disc list-inside space-y-2 text-lg text-gray-700">
                        @foreach ($about->interests as $interest)
                            <li>{{ $interest->title }}</li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
