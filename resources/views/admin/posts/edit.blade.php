@extends('admin.layouts.master')
@section('extralinks')
<link rel=stylesheet href={{asset('assets/richtexteditor/rte_theme_default.css')}}>
<script src={{asset('assets/richtexteditor/rte.js')}}></script>
<script src='{{asset('assets/richtexteditor/plugins/all_plugins.js')}}'></script>
@endsection
@section('content')
<section id="dashboard" class="bg-gray-100 min-h-screen p-4 font-sans text-right rounded-2xl">
    <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6">افزودن پست جدید</h2>
        <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان پست</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $post->title }}" required>
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">توضیحات </label>
                <input type="text" name="meta_description" id="desc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $post->meta_description }}" required>
                <label for="keywords" class="block text-sm font-medium text-gray-700">کلیدواژه ها</label>
                <input type="text" name="meta_keywords" id="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $post->meta_keywords }}" required>
                <label for="title" class="block text-sm font-medium text-gray-700">slug</label>
                <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ $post->slug }}" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">دسته بندی</label>
                <select name="category_id" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">انتخاب دسته بندی</option>
                    <!-- Assuming categories are passed to the view -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">تصویر پست</label>
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @if(!empty($post?->image))
                    <img src="{{ Storage::disk('s3')->url($post->image) }}" alt="Current Image" class="w-32 mt-2 rounded">
                @endif
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">محتوای پست</label>
               <textarea id="inp_editor1" name="content">
               {!! $post->content !!}
               </textarea>
            </div>
            <div class="mb-4">
                {{-- published status --}}
                <label for="published" class="block text-sm font-medium text-gray-700">وضعیت انتشار</label>
                <select name="is_published" id="published" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" aria-selected="{{ $post->is_published }}">
                    <option value="1">منتشر شده</option>
                    <option value="0">پیش نویس</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                افزودن پست
            </button>
        </form>
    </div>
</section>
@endsection
@section('scripts')
<script>
    var editor1 = new RichTextEditor("#inp_editor1");
</script>
@endsection
