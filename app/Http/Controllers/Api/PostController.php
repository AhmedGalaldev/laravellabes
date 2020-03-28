<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
       return PostResource::collection(
        Post::all()
           
       );
    }
    public function show($post){
        return new PostResource(
            Post::find($post)
        );
    }
}
