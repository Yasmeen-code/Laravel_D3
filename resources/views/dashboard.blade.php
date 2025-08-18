<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
    <h2 class="text-lg font-semibold mb-4">Your Posts</h2>

    @if($posts->isEmpty())
        <p class="text-gray-600">You haven't created any posts yet.</p>
    @else
        <ul class="space-y-3">
            @foreach ($posts as $post)
                <li class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                    <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">
                        Read more
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
