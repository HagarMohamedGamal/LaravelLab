@extends('layout.app')
@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <div class="text-muted"><small> written by {{$user}}</small></div>
            </div>
        </div>
    </div>
@endsection
