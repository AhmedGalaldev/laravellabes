<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Post; 
use Carbon\Carbon;
use App\User;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('user')->get();
        
        $dateOfCreatedAt = new Carbon($posts->get('created_at'));
        
  
        $posts = Post::paginate(3);
         

        return view('posts.index',[
            'posts'=>$posts,
           
           
        ]);
       }
    public function show(){
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        return view('posts.show',[
            'post' => $post,
           // 'userDate'=>$userDate,
        ]);
    
    }
    public function create(){
        $users=User::all();
        return view('posts.create',[
            'users'=>$users,
        ]);
    }
    public function store(){
        $request=request();
       $saveToDB= $request->only(['title', 'description','user_id']);
         Post::create($saveToDB);
       
        return redirect()->route('posts.index');
    }
    public function edit(){
        $request = request();
        $postId = $request->post;

        $post = Post::find($postId);
        $users=User::all();
        return view('posts.edit',[
            'post' => $post,
            'users'=>$users
           
        ]);
    }
    public function update(){
        $postId =request()->post;
        $post=Post::find($postId);
         
        $post->title=request()->title;
        $post->description=request()->description;
        $post->user_id=request()->user_id;
        $post->save();

        return redirect()->route('posts.index');
    
     }

     public function destroy(Request $request){
        
        $postId = $request->post;

        $post=Post::find($postId);
         
        $post->delete();
        return redirect()->route('posts.index');    
       
}




}