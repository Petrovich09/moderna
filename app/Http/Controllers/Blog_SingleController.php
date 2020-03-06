<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Comment;

class Blog_SingleController extends Controller
{
  public function show($postId = null) {

        if (View::exists('blog-single')) {
          
            $post = Post::find($postId)->comments;
            //dd($post);
            return view('blog-single', ['post' => $post,
                                        'comments' => $comments]);
        }
        abort(404);
    }
    public function addComment(Request $request) {

        if (isset($request)) {

            $user = Auth::id();

            $this->validate($request, [
                'name' => 'required|min:3|max:20',
                'email' => 'required', 'string', 'email', 'max:255',
                'website' => 'nullable|string',
                'comment' => 'required|min:5|max:255',
            ]);
          $comment = new Comment(['user_id' => $user,
                                  'post_id' => $request->post_id,
                                  'name' => $request->name,
                                  'email' => $request->email,
                                  'website' => $request->website,
                                  'comment' => $request->comment]);
          $comment -> save();
          return redirect()-> back()-> with('success', 'Форма успешно отправлена');

    }
  }
}
