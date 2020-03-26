<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController{

    function index () {
        $posts = Post::all();
        // $posts=[
        //     [
        //         "title"=>"first title1",
        //         "body" => "first body1",
        //     ],
        //     [
        //         "title"=>"first title2",
        //         "body" => "first body2",
        //     ],
        //     [
        //         "title"=>"first title3",
        //         "body" => "first body3",
        //     ],
        //     [
        //         "title"=>"first title4",
        //         "body" => "first body4",
        //     ],
        // ];
        return view('index', [
            'posts' => $posts,
        ]);
    }

    function show () {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        // $post = Post::where('id', $postId)->get();
        return view('show', [
            'post' => $post
        ]);
    }

    function create(){
        $users = User::all();
        return view('create', [
            'users' => $users
        ]);
    }

    function store(){
        $request = request();
        // dd($request->title, $request->description);
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('posts.index');
    }
}