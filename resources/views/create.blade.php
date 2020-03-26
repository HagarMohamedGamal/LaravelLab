@extends('layout.app')
@section('content')

<h1>hello create</h1>
<div class="container">
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select name="user_id" class="form-control" id="exampleFormControlSelect1">
            @foreach($users as $user)  
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-success m-3" type="submit">Submit New Post</button>
    </form>
</div>
@endsection