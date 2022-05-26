<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function check(Request $request){
        $institutions = Institution::where('name', $request->name)->get();

        if(count($institutions) > 0){
            return response()->json("Institusi sudah ada");
        }

        return response()->json("true");
    }

    public function store(Request $request){
        $institution = Institution::create([
            'name' => $request->name
        ]);

        if(!$institution){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Tambah Institusi'
        ], 200);
    }

    public function get(){
        $institution = Institution::get();

        echo json_encode($institution);
        exit();
    }
}
