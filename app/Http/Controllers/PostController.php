<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        if (auth()->id() === $post->user_id) {
            $post->delete();
        }

        return redirect('/');
    }


    public function updatePost(Request $request, Post $post)
    {

        if (auth()->id() !== $post->user_id) {
            return redirect('/');
        }

        $incomeFields = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|min:3',
        ]);

        $incomeFields['title'] = strip_tags($incomeFields['title']);
        $incomeFields['body'] = strip_tags($incomeFields['body']);

        $post->update($incomeFields);
        return redirect('/');
    }


    public function editPost(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect('/');
        }
        return view ('edit-post', ['post' => $post]);
    }



    public function createPost(Request $request)
    {
        $incomeFields = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|min:3',
        ]);

        $incomeFields['title'] = strip_tags($incomeFields['title']);
        $incomeFields['body'] = strip_tags($incomeFields['body']);
        $incomeFields['user_id'] = auth()->id();
        Post::create($incomeFields);
        return redirect('/');


        // Here you can handle the creation of the post, e.g., save it to the database.
        // For demonstration, we'll just return the validated data.

        return response()->json([
            'message' => 'Post created successfully!',
            'data' => $incomeFields
        ]);
    }
}
