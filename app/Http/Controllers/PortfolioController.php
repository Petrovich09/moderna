<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Post;

class PortfolioController extends Controller
{
  public function show() {
          if (View::exists('portfolio')) {

          $posts = Post::orderBy('created_at','DESC')->paginate(5);
          //dd(asset('storage/'.$posts[0]->image));

      return view('portfolio', ['posts'=> $posts]);
    }
    abort(404);
       
  }
}
