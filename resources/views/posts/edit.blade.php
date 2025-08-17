<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">📚 My Blog</h1>
            <a href="{{ route('posts.index') }}" class="hover:underline">Back to Posts</a>
        </div>
    </nav>

    <div class="flex-grow flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-md w-full max-w-lg p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">✏️ Edit Post</h2>

            <form action="{{ route('posts.update', $post['id']) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" 
                           value="{{ old('title', $post['title']) }}" required
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                </div>

                <div>
                    <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                    <textarea id="content" name="content" rows="5" required
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">{{ old('content', $post['content']) }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        💾 Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
