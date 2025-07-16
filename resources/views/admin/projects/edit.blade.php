@extends('admin.layouts.master')
@section('content')
<section id="dashboard" class="bg-gray-100 min-h-screen p-4 font-sans text-right rounded-2xl">
    <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6">افزودن پروژه جدید</h2>
        <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان پروژه</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $project->title }}" required>
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">توضیحات </label>
                <input type="text" name="info" id="desc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $project->info }}" required>
                <label for="keywords" class="block text-sm font-medium text-gray-700">تکنولوژی</label>
                <input type="text" name="technologies" id="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $project->technologies }}" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">تصویر پست</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @if(!empty($project?->image))
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="w-32 mt-2 rounded">
                @endif
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                افزودن پروژه
            </button>
        </form>
    </div>
</section>
@endsection
