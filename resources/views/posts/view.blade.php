<x-app-layout>
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8 my-10 border border-gray-200">

        <h1 class="text-3xl font-bold text-gray-900 mt-2 mb-4">
            {{ $post->title }}
        </h1>

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {{ $post->content }}
        </div>

        <div class="mt-6 text-sm text-gray-500 flex justify-between items-center">
            <p>
                Posted by 
                <span class="font-semibold text-gray-800">{{ $post->user->name }}</span>
                on 
                <span class="font-semibold">{{ $post->created_at->format('Y-m-d H:i') }}</span>
            </p>

            <a href="{{ route('posts.edit', $post->id) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-xl shadow hover:bg-blue-700 transition">
                Edit
            </a>
        </div>
    </div>
</x-app-layout>
