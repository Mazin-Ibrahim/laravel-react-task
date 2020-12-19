<?php

namespace App\Http\Controllers\dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\Post as PostResource;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function store(CreatePostRequest $request)
    {
        return $request->store();
    }

    public function update(UpdatePostRequest $request, $id)
    {
        return $request->update($id);
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response("post has been deleted");
    }
}
