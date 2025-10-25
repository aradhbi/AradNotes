@extends('admin.layouts.master')

@section('content')
    <div class="container bg-gray-50 shadow-2xl rounded-2xl p-12 mb-12">
        <h1 class="text-xl font-bold mb-4">درباره من</h1>

        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 space-y-2">
                <label for="title" class="block font-medium">عنوان</label>
                <input type="text" name="title" id="title" class="form-input w-full rounded-lg py-3 px-2 shadow-md" value="{{ old('title', $about->title ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block font-medium">توضیحات</label>
                <textarea name="description" id="description" rows="5" class="form-textarea  w-full rounded-lg py-3 px-2 shadow-md">{{ old('description', $about->description ?? '') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block font-medium">تصویر</label>
                <input type="file" name="image" id="image" class="form-input w-full rounded-lg py-3 px-2 shadow-md">
                @if(!empty($about?->image))
                    <img src="{{ Storage::disk('s3')->url($about->image) }}" alt="Current Image" class="w-32 mt-2 rounded">
                @endif
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                ذخیره تغییرات
            </button>
        </form>

    </div>
    <div class="container bg-gray-50 shadow-2xl rounded-2xl p-12">
        <form action="{{ route('admin.about.update_all') }}" method="POST">
            @csrf
            @method('PUT')

            <h2 class="text-xl font-bold mb-4">علایق و مهارت‌ها</h2>

            <label for="skills">انتخاب مهارت‌ها:</label>
            <select name="skills[]" id="skills" multiple class="w-full p-2 rounded border form-control">
                @foreach ($allSkills as $skill)
                    <option value="{{ $skill->id }}" {{ $about->skills->contains($skill->id) ? 'selected' : '' }}>
                        {{ $skill->title }}
                    </option>
                @endforeach
            </select>

            <label for="interests" class="mt-4">انتخاب علایق:</label>
            <select name="interests[]" id="interests" multiple class="w-full p-2 rounded border form-control">
                @foreach ($allInterests as $interest)
                    <option value="{{ $interest->id }}" {{ $about->interests->contains($interest->id) ? 'selected' : '' }}>
                        {{ $interest->title }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">ذخیره</button>
        </form>

    </div>
@endsection
