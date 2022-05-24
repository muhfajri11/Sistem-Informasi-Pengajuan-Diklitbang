<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function verifyemail(Request $request){
        $email = User::where('email', $request->email)->get();

        if (count($email) > 0) {
            if(Auth::check()){
                if(isset($request->id_user)){
                    $user = User::find($request->id_user);
                    if($user->email != $request->email){
                        return response()->json("Email sudah terdaftar");
                    }
                } else {
                    return response()->json("Email sudah terdaftar");
                }
            } else {
                return response()->json("Email sudah terdaftar");
            }
        } 

        return response()->json("true");
    }
}
