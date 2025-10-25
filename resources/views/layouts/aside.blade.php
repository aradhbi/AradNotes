            <aside class="md:col-span-1 space-y-8">
                <!-- درباره من -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-300">
                    @if (isset($about))
                        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">درباره من</h3>
                        <img src="{{ Storage::disk('s3')->url($about->image) }}" alt="تصویر پروفایل" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-sm border-2 border-gray-400 p-1">
                        <p class="text-gray-700 text-center leading-relaxed">
                            {{ $about->description }}
                        </p>

                    @else
                        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">درباره من</h3>
                        <img src="https://placehold.co/200x200/cbd5e1/ffffff?text=تصویر+پروفایل" alt="تصویر پروفایل" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-sm border-2 border-gray-400 p-1">
                        <p class="text-gray-700 text-center leading-relaxed">
                            اطلاعات درباره من در دسترس نیست.
                        </p>
                    @endif
                    {{-- <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">درباره من</h3>
                    <img src="{{ $about->image }}" alt="تصویر پروفایل" class="w-24 h-24 rounded-full mx-auto mb-4 shadow-sm border-2 border-gray-400 p-1">
                    <p class="text-gray-700 text-center leading-relaxed">
                        {{ $about->description }}
                    </p> --}}
                </div>

                <!-- دسته‌بندی‌ها -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">دسته‌بندی‌ها</h3>
                    <ul class="space-y-2">
                        @if ($categories->isEmpty())
                            <li class="text-gray-500">هیچ دسته‌بندی وجود ندارد.</li>
                        @else
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category.show', $category) }}" class="newspaper-link">{{ $category->name }} ({{ $category->published_posts_count }})</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <!-- جدیدترین پست‌ها -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">جدیدترین پست‌ها</h3>
                    <ul class="space-y-3">
                        @if ($lastPosts->isEmpty())
                            <li class="text-gray-500">هیچ پستی وجود ندارد.</li>
                        @else
                            @foreach ($lastPosts as $lpost)
                                <li class="pb-2 border-b last:border-b-0 border-gray-200">
                                    <a href="{{ route('post',$lpost) }}" class="newspaper-link block">{{ $lpost->title }}</a>
                                    <p class="text-gray-500 text-sm">{{ $lpost->created_at_jalali }}</p>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2 border-gray-300">پربازدید‌‌‌‌‌ ترین پست‌ها</h3>
                    <ul class="space-y-3">
                        @if ($mostViewedPosts->isEmpty())
                            <li class="text-gray-500">هیچ پستی وجود ندارد.</li>
                        @else
                            @foreach ($mostViewedPosts as $vpost)
                                <li class="pb-2 border-b last:border-b-0 border-gray-200">
                                    <a href="{{ route('post',$vpost) }}" class="newspaper-link block">{{ $vpost->title }}</a>
                                    <p class="text-gray-500 text-sm">{{ $vpost->created_at_jalali }} | بازدید: {{ $vpost->views }}</p>
                                </li>
                            @endforeach
                        @endif


                    </ul>
                </div>
            </aside>
