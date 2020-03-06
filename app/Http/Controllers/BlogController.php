<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Post;
use App\User;

class BlogController extends Controller
{
  public function show() {

      if (View::exists('blog')) {

          $posts = Post::orderBy('created_at','DESC')->paginate(2);

      return view('blog', ['posts'=> $posts]);
    }
    abort(404);
 }

 public function ajax(Request $request) {

          $posts = Post::orderBy('created_at','DESC')->paginate($request->addBlog);

      return view('blog', ['posts'=> $posts]);
    }
    
 
 
}
