@extends('layout.app')
@section('content')

<div class="container">
<a href="{{route('posts.create')}}" class="btn btn-success m-3">create post</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">title</th>
      <th scope="col">Desc</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
        <tr>
          <td>{{$post->title}}</td>
          <td>{{$post->description}}</td>
          <td>{{$post->user_id}}</td>
          <td>{{$post->created_at->toDateString()}}</td>
          
          
            <td><a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary btn-success">View</a>
            <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary btn-warning">Edit</a>
            

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
            Delete
          </button></td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleteing Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this post?!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{route('posts.delete', ['post' => $post->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Confirm Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach
    
        
</table>
{{ $posts->links() }}
</div>
@endsection
