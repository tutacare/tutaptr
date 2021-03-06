<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostUser;
use App\User;
use Auth, Input, Session, Redirect;

class HomePostController extends Controller
{
  public function __construct()
	{
		$this->middleware('auth');
	}
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
      $status = 0;
      if(PostUser::where('user_id', Auth::user()->id)->where('post_id', $id)->first())
      {
          $status = 1;
      }
      $posts = Post::find($id);
      return view('home.post.show', ['post' => $posts, 'stat' => $status]);
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
      $postuser = PostUser::find($id);
          $postuser->delete();
          // redirect
          Session::flash('message', 'You have successfully deleted post');
          return Redirect::to('mybook');
    }

    public function readPost()
    {
      if ($this->getBalance()->balance >= Input::get('post_price'))
      {
      $amounts = User::find(Auth::user()->id)->first();
      $amounts->balance = $amounts->balance - Input::get('post_price');
      $amounts->save();
      $posts = new PostUser;
      $posts->user_id = Auth::user()->id;
      $posts->post_id = Input::get('post_id');
      $posts->save();
      Session::flash('message', 'You have successfully pay for read');
      return Redirect::to('mybook');
      }
      else {
        return Redirect::back()->with('message','Your balance not enought for read post !');
      }
    }

    public function myPost()
    {
      $posts = PostUser::where('user_id', Auth::user()->id)->get();
      return view('home.post.mybook', ['post' => $posts]);
    }

    function getBalance()
    {
      $balances = User::find(Auth::user()->id)->first();
      return $balances;
    }

    public function deposit()
    {
      return view('home.post.deposit', ['balance' => $this->getBalance()]);
    }
}
