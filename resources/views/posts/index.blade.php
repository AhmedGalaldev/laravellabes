
@extends('layouts.app')
@section('content')
 
    <div class="container">
    <a href="{{route('posts.create')}}" class="btn btn-success  m-5">Create Post</a>
  
    <div class="card">
  <div class="card-body">
  <table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <!-- <th scope="col">slug</th> -->
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <!-- <td>{{$post->slug}}</td> -->
      <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
      <td>{{$dateFormat}}</td>
      <td>
      <div class="row">
        <div class="col-2">
        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
        </div>
        <div class="col-2">
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
        </div>
        <div class="col-2">
        <form method="POST"action="{{route('posts.show', $post->id)}}">
             @csrf @method('delete')<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this post ?')">Delete </button></form>
       
        </div>
        
       
      </div>
        
       
      </td>
   </tr>
   
    @endforeach
 
  </tbody>
</table>
{{ $posts->links() }}
  </div>
  


</div>
    
</div>
   
@endsection