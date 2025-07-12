@extends('admin.layouts.master')
@section('content')
<section id="dashboard" class="bg-gray-100  min-h-screen p-4 font-sans text-right rounded-2xl">

    <button id="openModalBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 my-4">
        افزودن
    </button>

    <!-- Modal پس زمینه تیره -->
    <div id="myModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <!-- Modal محتوا -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-auto overflow-hidden">
            <!-- Modal سربرگ -->
            <div class="flex justify-between items-center p-5 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">عنوان جدید</h2>
                <button id="closeModalBtnHeader" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Modal بدنه (محتوا و ورودی‌ها) -->
            <div class="p-6">
                <form action="{{ route('admin.categories.store') }}" method="POST" class="mb-4">
                    @csrf
                    <label for="modalInput" class="block text-gray-700 text-sm font-bold mb-2">نام آیتم:</label>
                    <input type="text" id="name" class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="name" placeholder=" نام دستبندی رو وارد کنید">
                </div>
                <!-- می‌توانید ورودی‌های بیشتری اینجا اضافه کنید -->
            </div>


        </div>
    </div>
    <div class="container bg-gray-50 shadow-2xl rounded-2xl p-12 ">
        <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden " dir="ltr">
            <thead>
                <tr>
                    <th class="px-4 py-2">ردیف</th>
                    <th class="px-4 py-2">نام دسته‌بندی</th>
                    <th class="px-4 py-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">
                        <!-- دکمه‌های ویرایش و حذف -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="GET" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
@section('scripts')
<script>
        // گرفتن ارجاع به عناصر DOM
        const openModalBtn = document.getElementById('openModalBtn');
        const myModal = document.getElementById('myModal');
        const closeModalBtnHeader = document.getElementById('closeModalBtnHeader');
        const closeModalBtnFooter = document.getElementById('closeModalBtnFooter');
        const modalInput = document.getElementById('modalInput');
        const saveBtn = document.getElementById('saveBtn');

        // تابع برای باز کردن modal
        function openModal() {
            myModal.classList.remove('hidden'); // حذف کلاس hidden
            myModal.classList.add('flex');    // اضافه کردن کلاس flex برای نمایش
        }

        // تابع برای بستن modal و پاک کردن ورودی‌ها
        function closeModal() {
            myModal.classList.remove('flex');    // حذف کلاس flex
            myModal.classList.add('hidden');     // اضافه کردن کلاس hidden برای پنهان کردن
            modalInput.value = ''; // پاک کردن مقدار ورودی
            console.log('Modal بسته شد و ورودی پاک شد.');
        }

        // افزودن شنونده رویداد برای دکمه "افزودن"
        openModalBtn.addEventListener('click', openModal);

        // افزودن شنونده رویداد برای دکمه "بستن" در سربرگ modal
        closeModalBtnHeader.addEventListener('click', closeModal);

        // افزودن شنونده رویداد برای دکمه "بستن" در پاورقی modal
        closeModalBtnFooter.addEventListener('click', closeModal);

        // افزودن شنونده رویداد برای دکمه "ذخیره"
        saveBtn.addEventListener('click', () => {
            const inputValue = modalInput.value;
            if (inputValue) {
                console.log('مقدار ذخیره شده:', inputValue);
                // اینجا می‌توانید منطق ذخیره سازی داده را اضافه کنید
                // مثلاً ارسال به سرور یا اضافه کردن به لیست
                closeModal(); // بستن modal پس از ذخیره
            } else {
                console.log('لطفاً یک مقدار وارد کنید.');
                // می‌توانید یک پیام خطا به کاربر نمایش دهید
            }
        });

        // بستن modal با کلیک در خارج از آن
        myModal.addEventListener('click', (event) => {
            if (event.target === myModal) {
                closeModal();
            }
        });
    </script>
@endsection
