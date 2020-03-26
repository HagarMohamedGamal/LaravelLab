@extends('layout.app')
@section('content')
<h1>hello from hagar</h1>
<div class="container">
<a href="{{route('posts.create')}}" class="btn btn-success m-3">create post</a>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">title</th>
      <th scope="col">Desc</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
        <tr>
        <td>{{$post['title']}}</td>
        <td>{{$post['description']}}</td>
        <td><a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary">View</a>
        <!-- <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary">Edit</a>
        <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary">Delete</a></td> -->
        </tr>
    @endforeach
</table>
</div>
@endsection
