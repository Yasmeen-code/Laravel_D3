<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::with('user:id,name')
                ->select('id', 'title', 'content', 'user_id') 
                ->latest()
                ->paginate(10);

            $data = $posts->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'creator' => $post->user->name, 
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch posts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StorePostRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['user_id'] = Auth::id();

            $post = Post::create($validated);
            $post->load('user');

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'data' => $post
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = Post::with('user')->find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(StorePostRequest $request, $id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ], 404);
            }
            $post->update($request->validated());
            $post->load('user');

            return response()->json([
                'success' => true,
                'message' => 'Post updated successfully',
                'data' => $post
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update post',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ], 404);
            }

            if ($post->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to delete this post'
                ], 403);
            }

            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete post',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
