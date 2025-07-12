@extends('admin.layouts.master')
@section('content')
<section id="dashboard" class="space-y-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">خلاصه فعالیت‌ها</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                    <i class="fas fa-newspaper text-gray-700 text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">تعداد کل پست‌ها</h3>
                    <p class="text-5xl font-extrabold text-gray-800">{{$postCount}}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 text-center">
                    <i class="fas fa-comment-dots text-gray-700 text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">دسته بندی ها</h3>
                    <p class="text-5xl font-extrabold text-gray-800">{{ $categorieCount }}</p>
                </div>
                
                
            </div>
</section>
@endsection