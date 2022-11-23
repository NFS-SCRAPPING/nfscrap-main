<?php

namespace App\Http\Controllers;

#PACKAGE
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Validator;
use Hash;
#HELPER
use Cron;
use Date;
use Fibonanci;
use Helper;
use Nfs;
use Payments;
use Wa;
#MODEL
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email:rfc,dns',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {

            #CREATE NEW TOKEN
            $token_app=ENV('TOKEN_APP');
            $token = auth()->user()->createToken($token_app)->accessToken;
            $user = Auth::user();

            #GET DATA USERS
            $user = User::where('email',$request->email)->first();

            #ADD SESSION
            Session::put('email',$request->email);
            Session::put('token',$token);
            Session::put('id',$user->id);

            return redirect()->intended('dashboard');
        }else{
            return back()->with('error','somethings else please try again');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail()
    {
        //
    }

    public function validasiEmail()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendOtp()
    {
        //
    }

    public function validasiOtp()
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        Session::flush();
     
        return redirect('login')->with('success','Thanks !!!');
    }

}
