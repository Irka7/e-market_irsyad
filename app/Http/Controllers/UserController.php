<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($user = Auth::user()){
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
        }
        return view('auth.login');
    }

    public function cekLogin(AuthRequest $request)
    {
        $credential = $request->only('email', 'password');
        // dd($credential);
        $request->session()->regenerate();
        if(Auth::attempt($credential)){
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'nofound' => 'Email or Password wrong'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
