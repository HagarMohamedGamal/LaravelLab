<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\User;

class PostsController{

    function index () {
        $posts = Post::simplePaginate(3);
        $users = User::all();
        $newPosts=[];
        foreach($posts as $post){
            foreach($users as $user ){
                if($user->id == $post->user_id){
                    $post->user_id = $user->name;
                    $newPosts[] = $post;
                }
            }
        }
        // dd($newPosts);
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
            'posts' => $posts
        ]);
    }

    function show () {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        // dd($user->id);
        // $post = Post::where('id', $postId)->get();
        return view('show', [
            'post' => $post
        ]);
    }

    function edit () {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        $currentUser = User::find($post->user_id);
        // dd($currentUser);
        $users = User::all();
        // $post = Post::where('id', $postId)->get();
        return view('create', [
            'post' => $post,
            'users' => $users,
            'currentuser' => $currentUser
        ]);
    }

    function update () {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        // dd($request->title);
        $affected = Post::where('id', $postId)
                    ->update([
                        'title' => $request->title,
                        'description' => $request->description,
                        'user_id' => $request->user_id,
                    ]);
        return redirect()->route('posts.index');

    }

    function delete () {
        $request = request();
        // dd($request->post);
        Post::find($request->post)->delete();
        return redirect()->route('posts.index');
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