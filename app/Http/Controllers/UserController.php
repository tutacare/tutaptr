<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator, Input, Session, Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $users = User::all();
      return view('dashboard.user.index', ['user' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.user.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('dashboard.user.edit', ['user' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
      $rules = array(
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id .'',
      'password' => 'min:6|max:30|confirmed',
      );
      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails())
      {
         return Redirect::to('dashboard/users/' . $id . '/edit')
        ->withErrors($validator);
      } else {
              $users = User::find($id);
              $users->name = Input::get('name');
              $users->email = Input::get('email');
              if(!empty(Input::get('password')))
              {
                $users->password = Hash::make(Input::get('password'));
              }
              $users->save();
              // redirect
              Session::flash('message', 'You have successfully updated user');
              return Redirect::to('dashboard/users');
          }
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
}
