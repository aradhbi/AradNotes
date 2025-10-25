@extends('admin.layouts.master')
@section('content')
<section id="dashboard" class="bg-gray-100 min-h-screen p-6 font-sans text-right rounded-2xl">

    <a href="{{ route("admin.projects.create") }}" id="openModalBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 ">
        افزودن پست
    </a>

    <div class="container bg-gray-50 shadow-2xl rounded-2xl my-12 p-12">
        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden" dir="ltr">
            <thead>
                <tr>
                    <th class="px-4 py-2">تصویر</th>
                    <th class="px-4 py-2">عنوان پست</th>
                    <th class="px-4 py-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="hover:bg-gray-100 w-full min-h-32">
                    <td class="border px-4 py-2 w-24 h-24 object-cover col"><img src="{{ Storage::disk('s3')->url($project->image) }} " alt=""></td>
                    <td class="border px-4 py-2">{{ $project->title }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-yellow-600/10 ring-inset">ادیت</a>
                        <a href="{{ route('admin.projects.destroy', $project->id) }}" class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset">حذف</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->links() }} <!-- Pagination links -->
    </div>
@endsection
