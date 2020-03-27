@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <form method="POST" action="
    @if (isset($currentuser))
        {{route('posts.update', ['post'=>$post->id])}}
    @else
        {{route('posts.store')}}
    @endif
    " enctype="multipart/form-data">
        @csrf
        @isset($currentuser)
            @method('PUT')
        @endisset
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="@if (isset($post)){{$post->title}}@endif">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User</label>
            <select name="user_id" class="form-control" id="exampleFormControlSelect1">
            @foreach($users as $user)  
            <option value="{{$user->id}}" @isset($currentuser) @if ( "{{$currentuser->id}}" == "{{$user->id}}" ) selected="selected" @endif @endisset >{{$user->name}}</option>
            @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">@if (isset($post)){{$post->description}}@endif</textarea>
        </div>
        <div class="form-group">
        <input type="file" name="image">
        </div>
        <button class="btn btn-success m-3" type="submit">Submit New Post</button>
    </form>
</div>
@endsection