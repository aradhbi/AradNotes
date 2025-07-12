<header class="bg-[#000] shadow-lg py-6">
        <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
            <a href="{{ route('index') }}" class="text-white text-3xl font-bold rounded-lg p-2 transition-transform transform hover:scale-105">
                Arad Notes
            </a>
            <nav class="mt-4 md:mt-0">
                <ul class="flex space-x-6 space-x-reverse">
                    @auth
                        @if (auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin.index') }}" class="text-gray-300 text-lg hover:text-white transition-colors duration-300 rounded-md px-3 py-1">پنل</a></li>    
                        @endif
                    @endauth
                    <li><a href="{{ route('index') }}" class="text-gray-300 text-lg hover:text-white transition-colors duration-300 rounded-md px-3 py-1">خانه</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-300 text-lg hover:text-white transition-colors duration-300 rounded-md px-3 py-1">درباره من</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 text-lg hover:text-white transition-colors duration-300 rounded-md px-3 py-1">تماس</a></li>
                </ul>
            </nav>
        </div>
    </header>
