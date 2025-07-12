@extends('layouts.master')
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
        <div class="bg-white p-6 md:p-10 rounded-xl shadow-md border border-gray-200 max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 text-center">تماس با من</h1>
            <p class="text-center text-lg text-gray-700 mb-8">
                برای هرگونه سوال، پیشنهاد یا همکاری، می‌توانید از طریق فرم زیر با من در ارتباط باشید یا از اطلاعات تماس مستقیم استفاده کنید.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- فرم تماس -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">ارسال پیام</h2>
                    <form class="space-y-4">
                        <div>
                            <label for="contact-name" class="block text-sm font-medium text-gray-700 mb-1">نام شما:</label>
                            <input type="text" id="contact-name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="نام خود را وارد کنید" required>
                        </div>
                        <div>
                            <label for="contact-email" class="block text-sm font-medium text-gray-700 mb-1">ایمیل شما:</label>
                            <input type="email" id="contact-email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ایمیل خود را وارد کنید" required>
                        </div>
                        <div>
                            <label for="contact-subject" class="block text-sm font-medium text-gray-700 mb-1">موضوع:</label>
                            <input type="text" id="contact-subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="موضوع پیام را وارد کنید">
                        </div>
                        <div>
                            <label for="contact-message" class="block text-sm font-medium text-gray-700 mb-1">پیام شما:</label>
                            <textarea id="contact-message" name="message" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="پیام خود را بنویسید..." required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300 font-medium shadow-md w-full">ارسال پیام</button>
                    </form>
                </div>

                <!-- اطلاعات تماس -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-b pb-2">اطلاعات تماس</h2>
                    <div class="space-y-4 text-lg text-gray-700">
                        <p class="flex items-center">
                            <i class="fas fa-envelope text-blue-500 ml-3"></i> ایمیل: <a href="mailto:your.email@example.com" class="text-blue-600 hover:underline">me@aradnotes.ir</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fab fa-linkedin text-blue-500 ml-3"></i> لینکدین: <a href="https://linkedin.com/in/yourprofile" target="_blank" class="text-blue-600 hover:underline">t.me/arad_hbi</a>
                        </p>
                        <p class="flex items-center">
                            <i class="fab fa-twitter text-blue-500 ml-3"></i> توییتر: <a href="https://twitter.com/yourprofile" target="_blank" class="text-blue-600 hover:underline">twitter.com/arad_hbi</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
