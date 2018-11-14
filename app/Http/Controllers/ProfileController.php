<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store', 'create' , 'edit','destroy','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profile.profile');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Likes  $likesDisLikes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validateUser($request);
        $user=auth()->user();

        $user->update($request->all());
        return redirect()->route('profile.show ');

    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateUser(Request $request)
    {
        $this->validate($request,[
            "phone"=>'required|numeric',
            "name"=>'required',
            "email"=> 'required|email'

        ]);
    }
}
