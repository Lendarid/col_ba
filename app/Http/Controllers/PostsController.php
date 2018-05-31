<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\auth;

class PostsController extends Controller
{
  public function update($id, EditPostRequest $request)
  {

    $post = Post::findOrFail($id);
    $post->update($request->all());
    return redirect(route('home',$id))->with('info','');

  }






}
