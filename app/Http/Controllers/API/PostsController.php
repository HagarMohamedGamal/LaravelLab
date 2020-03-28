<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    function index(){
        return PostResource::collection(Post::paginate(3));
    }

    function show($post){
        return new PostResource(Post::find($post));
    }

    function store(StorePostRequest $request){
        return new PostResource(Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $request->file('image') ? $request->file('image')->store("public/imgs") : ""
        ]));
    }
}
