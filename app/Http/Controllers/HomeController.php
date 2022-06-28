<?php

namespace App\Http\Controllers;

use App\{User, Comparative, Internship, Setting};
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
        $intern = Internship::all();
        $comparative = Comparative::all();
        $max_intern = Setting::byName(['kuota']);
        $max_intern = $max_intern->value->internship;

        $data = [
            'internship' => $intern,
            'comparative' => $comparative,
            'kuota_pkl'   => $max_intern
        ];

        return view('index', compact('data'));
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
