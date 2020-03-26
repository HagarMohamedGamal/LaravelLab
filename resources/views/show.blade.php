@extends('layout.app')
@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">Title: {{$post->title}}</h3>
                <p class="card-text">Description: {{$post->description}}</p>
                <div class="text-muted"><small> written by {{$user->name}}</small></div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">Post Creator info</h3>
                <p class="card-text">Name: {{$user->name}}</p>
                <p class="card-text">Email: {{$user->email}}</p>
                <p class="card-text">Created At: {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</p>
            </div>
        </div>
    </div>
@endsection
