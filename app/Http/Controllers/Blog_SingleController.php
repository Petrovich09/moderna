<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog_SingleController extends Controller
{
  public function show($postId = 1) {
     if (View::exists('blog-single')) {
         
          $post = Post::find('created_at','DESC')->paginate(2);
          
          
          
      return view('blog', ['posts'=> $posts]); 
    }
    abort(404);
 }
}