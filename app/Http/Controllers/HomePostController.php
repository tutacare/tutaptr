<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostUser;
use Auth, Input, Session, Redirect;

class HomePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      $posts = Post::find($id);
      return view('home.post.show', ['post' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function readPost()
    {
      $posts = new PostUser;
      $posts->user_id = Auth::user()->id;
      $posts->post_id = Input::get('post_id');
      $posts->save();
      Session::flash('message', 'You have successfully pay for read');
      return Redirect::to('/');
    }

    public function myPost()
    {
      $posts = PostUser::where('user_id', Auth::user()->id)->get();
      return view('home.post.mybook', ['post' => $posts]);
    }
}
