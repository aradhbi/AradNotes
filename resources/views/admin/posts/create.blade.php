@extends('admin.layouts.master')
@section('extralinks')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.10.0/dist/katex.min.css">
<script src="https://cdn.jsdelivr.net/npm/katex@0.10.0/dist/katex.min.js"></script>
<style>
  .ql-editor[dir="rtl"] {
    direction: rtl;
    text-align: right;
  }
</style>

@endsection
@section('content')
<section id="dashboard" class="bg-gray-100 min-h-screen p-4 font-sans text-right rounded-2xl">
    <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6">افزودن پست جدید</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان پست</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">توضیحات </label>
                <input type="text" name="meta_description" id="desc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <label for="keywords" class="block text-sm font-medium text-gray-700">کلیدواژه ها</label>
                <input type="text" name="meta_keywords" id="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <label for="title" class="block text-sm font-medium text-gray-700">slug</label>
                <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
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
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">محتوای پست</label>
                <div id="toolbar">
                    <!-- Formatting -->
                    <select class="ql-font"></select>
                    <select class="ql-size"></select>
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                    <button class="ql-code"></button>
                    <button class="ql-link"></button>

                    <!-- Color -->
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>

                    <!-- Script -->
                    <button class="ql-script" value="sub"></button>
                    <button class="ql-script" value="super"></button>

                    <!-- Block -->
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                    <select class="ql-header">
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option selected></option>
                    </select>

                    <!-- Lists & Indent -->
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-indent" value="-1"></button>
                    <button class="ql-indent" value="+1"></button>

                    <!-- Direction & Align -->
                    <button class="ql-direction" value="rtl"></button>
                    <select class="ql-align"></select>

                    <!-- Media -->
                    <button class="ql-image"></button>
                    <button class="ql-video"></button>
                    <button class="ql-formula"></button>

                    <!-- Clean -->
                    <button class="ql-clean"></button>
                    </div>
                <div id="editor" class="mt-1"></div>
                <input type="hidden" name="content" id="content-input">
            </div>
            <div class="mb-4">
                {{-- published status --}}
                <label for="published" class="block text-sm font-medium text-gray-700">وضعیت انتشار</label>
                <select name="is_published" id="published" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
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
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
const quill = new Quill('#editor', {
    modules: {
      toolbar: '#toolbar',
    },
    theme: 'snow',
    formats: [
      'background', 'bold', 'color', 'font', 'code', 'italic', 'link', 'size',
      'strike', 'script', 'underline', 'blockquote', 'header', 'indent', 'list',
      'align', 'direction', 'code-block', 'formula', 'image', 'video'
    ]
  });

  // پیش‌فرض RTL
  quill.format('direction', 'rtl');
  quill.format('align', 'right');
    // موقع ارسال فرم مقدار quill رو بریز داخل hidden input
    const form = document.querySelector('form');
    const contentInput = document.querySelector('#content-input');

    form.addEventListener('submit', function () {
        const html = quill.root.innerHTML;
        contentInput.value = html;
    });
</script>
@endsection
