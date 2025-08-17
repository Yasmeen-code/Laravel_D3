<div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-6 my-6 border border-gray-200">
    <span class="text-sm text-gray-500 font-medium">{{$post['id']}}</span>
    <h2 class="text-2xl font-bold text-gray-800 mt-2 mb-3">{{ $post['title'] }}</h2>
    <p class="text-gray-600 leading-relaxed">{{ $post['content'] }}</p>
    <p class="text-sm text-gray-500 mt-3">
    Posted by <span class="font-bold">{{ $post->user->name }}</span> 
    on <span class="font-semibold">{{ $post->created_at->format('Y-m-d H:i') }}</span>
</p>

</div>
