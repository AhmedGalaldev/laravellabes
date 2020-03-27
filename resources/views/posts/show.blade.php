@extends('layouts.app')

@section('content')
<div class="container">
<div class=" mt-5">
<div class="card w-75">
  <div class="card-body">
  
    <h5 class="card-title">Title: {{$post->title}}</h5>
    <p class="card-text">Description : {{$post->description}}</p>
    
  </div>
</div>

</div>
</div>


<div class="container">
<div class=" mt-5">
<div class="card w-75">
  <div class="card-body">
    <h5 class="card-title">Name : {{ $post->user ? $post->user->name : 'not exist'}}</h5>
    <p class="card-text">Email : {{$post->user() ? $post->user->email :'not exist'}}</p>
    <p class="card-text">Created At : {{$post->user() ? $post->user->created_at :'not exist'}}</p>

    
  </div>
</div>

</div>
</div>


@endsection