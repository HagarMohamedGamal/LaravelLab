@extends('layout.app')
@section('content')

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
        <form action="{{route('posts.delete', ['post' => $post->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <td><a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary">View</a>
          <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Edit</a>
          <button type="submit" class="btn btn-primary">Delete</button></td>
        </form>
        </tr>
    @endforeach
</table>
</div>
@endsection
