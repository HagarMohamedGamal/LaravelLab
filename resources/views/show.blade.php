@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="card" style="width: 30%;">
        <img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title">Title: {{$post->title}}</h3>
                <p class="card-text">Description: {{$post->description}}</p>
                <div class="text-muted"><small> written by {{$post->user->name}}</small></div>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <div class="card" style="width: 30%;">
            <div class="card-body">
                <h3 class="card-title">Post Creator info</h3>
                <p class="card-text">Name: {{$post->user->name}}</p>
                <p class="card-text">Email: {{$post->user->email}}</p>
                <p class="card-text">Created At: {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</p>

            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <div class="card" style="width: 30%;">
            <div class="card-body">
                <h3 class="card-title">Comments</h3>
                <p class="card-text">Name: {{$post->user->name}}</p>
                <p class="card-text">Email: {{$post->user->email}}</p>
                <p class="card-text">Created At: {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</p>

            </div>
        </div>
    </div>
@endsection
