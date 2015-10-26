<?php

namespace RS\Http\Controllers;

use Illuminate\Http\Request;
use RS\Http\Requests;
use RS\Http\Requests\LoginRequest;
use RS\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    public function index() // login form
    {
        return view('login.index');
    }

    public function create() // register form
    {
        //
    }

    public function store(Request $request) // register
    {
        //
    }

    public function show(LoginRequest $request) // login
    {
        if (Auth::attempt(['name' => $request->get('name'), 'password' => $request->get('password')])) {
            return redirect()->intended('dashboard');
        }else{
            return redirect()->route('home')->with('error','Invalid login'); //session
        }
    }

    public function edit($id) // edit profile / user
    {
        //
    }

    public function update(Request $request, $id) // update profile / user
    {
        //
    }

    public function destroy() // logout
    {
        Auth::logout();
        return redirect()->route('home')->with('success','Successfully logout.');
    }
}
