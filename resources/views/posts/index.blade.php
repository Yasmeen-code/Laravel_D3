<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">My Blog</h1>
            <a href="{{ url('/dashboard') }}" class="hover:underline">Home</a>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">All Posts</h2>

        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition">
                        <h3 class="text-xl font-semibold text-blue-600 mb-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-700 mb-4 leading-relaxed line-clamp-3">
                            {{ $post->content }}
                        </p>
                        <p class="text-sm text-gray-500 mb-4">
                        {{ $post->created_at->format('Y-m-d H:i') }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" 
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Read More
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 text-lg">No Posts Yet</p>
        @endif
    </div>


</body>
</html>
