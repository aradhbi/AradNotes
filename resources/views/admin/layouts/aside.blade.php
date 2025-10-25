<aside class="w-64 min-w-64 bg-gray-800 text-gray-300 p-6 flex flex-col rounded-s-xl shadow-lg
                  md:h-screen md:sticky md:top-0">
        <h2 class="text-2xl font-bold mb-8 text-white hidden md:block">پنل ادمین</h2>
        <nav class="flex-grow flex flex-row md:flex-col flex-wrap md:flex-nowrap justify-center md:justify-start">
            <ul>
                <li><a href="{{ route('admin.index') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="dashboard"><i class="fas fa-tachometer-alt ml-3"></i> داشبورد</a></li>
                <!-- These links would navigate to separate pages in a Laravel app -->
                <li><a href="{{ route('admin.posts.index') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="posts"><i class="fas fa-pencil-alt ml-3"></i> مدیریت پست‌ها</a></li>
                <li><a href="{{ route('admin.categories') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="categories"><i class="fas fa-tags ml-3"></i> مدیریت دسته‌بندی‌ها</a></li>
                <li><a href="{{ route('admin.projects.index') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="categories"><i class="fas fa-tags ml-3"></i> مدیریت پروژه‌ها</a></li>
                <li><a href="{{ route('admin.about') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="about"><i class="fas fa-user-circle ml-3"></i> مدیریت درباره من</a></li>
                <li><a href="#" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="contact"><i class="fas fa-address-book ml-3"></i> مدیریت تماس با من</a></li>
                <li><a href="{{ route('logout') }}" class="nav-link flex items-center py-3 px-4 mb-2 rounded-lg font-semibold transition-colors duration-300" data-target="logout"><i class="fas fa-sign-out-alt ml-3"></i> خروج</a></li>
            </ul>
        </nav>
        <div class="mt-auto text-center text-sm text-gray-400">
            <p>&copy; ۱۴۰۳ وبلاگ شخصی</p>
        </div>
    </aside>
