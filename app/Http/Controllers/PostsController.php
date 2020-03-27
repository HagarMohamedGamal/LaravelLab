<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
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
        return view('index', [
            'posts' => $posts
        ]);
    }

    function show (Request $request) {
        $postId = $request->post;
        $post = Post::find($postId);
        $post->image = Storage::url($post->image);
        return view('show', [
            'post' => $post
        ]);
    }

    function edit (Request $request) {
        $postId = $request->post;
        $post = Post::find($postId);
        $currentUser = User::find($post->user_id);
        $users = User::all();
        return view('create', [
            'post' => $post,
            'users' => $users,
            'currentuser' => $currentUser
        ]);
    }

    function update (UpdatePostRequest $request) {
        $uploadedFile = $request->file('image');
        if (isset($uploadedFile))
            $filename =  time().'_'.$uploadedFile->getClientOriginalName();

        $postId = $request->post;
        $post = Post::find($postId);
        Storage::delete($post->image);

        $post->slug = null;
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => isset($filename) ? $request->file('image')->storeAs("public/imgs", $filename) : ""
            ]);
        return redirect()->route('posts.index');

    }

    function delete (Request $request) {
        $post = Post::find($request->post);
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }

    function create(){
        $users = User::all();
        return view('create', [
            'users' => $users
        ]);
    }

    function store(StorePostRequest $request){
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $request->file('image') ? $request->file('image')->store("public/imgs") : ""
        ]);

        return redirect()->route('posts.index');
    }
}

        //          Notes       //
        // $request = request();
        // $validateData = $request->validate([
        //     'title' => 'required|min:3',
        //     'description' => 'required|min:5'
        // ],[
        //     'title.min' => "you enterd less than 3 chars",
        //     'title.required' => "please enter anything in title"
        // ]);
        // dd($request->title, $request->description);