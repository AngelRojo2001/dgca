<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['login' => $request['login'], 'password' => $request['password'], 'active' => 1])) {
            return redirect('inicio');
        }
        return redirect('/')->with('message-error', 'Datos son incorrectos');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
