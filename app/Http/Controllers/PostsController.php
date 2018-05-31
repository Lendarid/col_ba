<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\auth;

class PostsController extends Controller
{
public function index()
{

  dd(auth::check());
  $posts = Post::with('category')->get();
  returnview('posts.index',compact('psots'));

}

  public function update($id, EditPostRequest $request)
  {

    $post = Post::findOrFail($id);
    $post->update($request->all());
    return redirect(route('panel',$id))->with('info','L\'jul');

  }






}
