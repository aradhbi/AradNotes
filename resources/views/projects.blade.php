@extends('layouts.master')
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">پروژه‌های من</h1>
        <p class="text-center text-lg text-gray-700 font-semibold mb-8 max-w-2xl mx-auto">
            در این بخش می‌توانید نگاهی به پروژه‌های مختلف من در زمینه‌های گوناگون بیندازید. هر پروژه نشان‌دهنده علاقه و تخصص من در آن حوزه است.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            @if (isset($projects))
                @foreach ($projects as $project)
                    <a href="{{ $project->link }}" class="bg-white p-6 rounded-xl shadow-md border border-gray-200 flex flex-col justify-start transition-all duration-200 ease-in-out hover:-translate-y-1.5 hover:shadow-lg">
                        <img src="{{env("APP_URL") ."/uploads//" .  $project->image }}" alt="{{ $project->title }}" class="w-full h-auto object-cover rounded-lg mb-4 border border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h2>
                        <p class="text-gray-700 text-base mb-4">
                            {{ $project->info }}
                        </p>
                        <span class="text-sm text-gray-500 mt-auto">تکنولوژی: {{ $project->technologies }}</span>
                    </a>
                @endforeach
            @else
                <p>پروژه ای یافت نشد</p>
            @endif


        </div>
    </main>
@endsection
