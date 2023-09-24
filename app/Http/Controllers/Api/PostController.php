<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('id')->get();
        return response([
            'success' => true,
            'message' => 'All Posts',
            'data' => $posts
        ]);
    }

    public function store(Request $request)
    {

        // return $request;

        $validator = Validator::make($request->all(), [
            'title' => 'required | string | max:255 | unique:posts',
            'content' => 'required | string',
            'photo' => 'nullable | image | max:2048 | mimes:jpeg,png,jpg',
            'category_id' => 'required | integer',
        ]);

        // return $validator;

        if ($validator->fails()) {
            return response()->json([
                'success' => true,
                'message' => 'Validation Error',
                'errors' => $validator->getMessageBag(),
            ], 422);
        }

        $data = $validator->validated();

        $data['slug'] = Str::slug($data['title']);

        if (array_key_exists('photo', $data)) {
            $data['photo'] = Storage::putFile('', $data['photo']);
        }

        Post::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => []
        ], 201);
    }

    public function show(Post $id)
    {
        return $id;
        // return response([
        //     'success' => true,
        //     'message' => 'Single post',
        //     'data' => $id
        // ]);
    }

    public function edit(Post $post)
    {
        return response([
            'success' => true,
            'message' => 'Single post edit',
            'data' => $post
        ]);
    }

    public function update(Request $request, Post $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | string | max:255 | unique:posts,title,' . $id->id,
            'content' => 'required | string',
            'photo' => 'nullable | image | max:2048 | mimes:jpeg,png,jpg',
            'category_id' => 'required | integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => true,
                'message' => 'Validation Error',
                'errors' => $validator->getMessageBag(),
            ], 422);
        }

        $data = $validator->validated();

        if (array_key_exists('photo', $data)) {
            Storage::delete($id->photo);
            $data['photo'] = Storage::putFile('', $data['photo']);
        }

        $id->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => []
        ]);
    }

    public function delete(Post $id)
    {
        // Get the path to the photo from the Post model
        $photoPath = $id->photo;

        // Check if the photoPath is not empty before attempting to delete
        if (!empty($photoPath)) {
            Storage::delete($photoPath);
        }

        // Delete the Post model
        $id->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
            'data' => []
        ]);
    }
}
