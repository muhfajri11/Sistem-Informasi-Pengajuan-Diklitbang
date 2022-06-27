<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $rates = ['Beginner' => 1, 'Intermediate' => 2, 'Expert' => 3];

        return view('dashboard.masteradmin.managerooms', compact('rates'));
    }

    public function get_rooms(){
        $rooms = Room::get();

        echo json_encode($rooms);
        exit;
    }

    public function get_room(Request $request){
        $req = $request->all();
        $rooms = Room::find($req['id']);

        if(!$rooms){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'get'     => $rooms
        ], 200);
    }

    public function check(Request $request){
        $room = Room::where('name', $request->name)->get();

        if(count($room) > 0){
            return response()->json("Nama ruangan sudah terpakai");
        }

        return response()->json("true");
    }

    public function add_room(){
        $req = request()->all();
        $room = Room::create($req);

        if(!$room){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Tambah Ruangan'
        ], 200);
    }

    public function update_room(){
        $req = request()->all();
        $room = Room::find($req['id'])->update($req);

        if(!$room){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Update Ruangan'
        ], 200);
    }

    public function delete_room(){
        $req = request()->all();

        $room = Room::find($req['id'])->delete();

        if(!$room){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Hapus Ruangan'
        ], 200);
    }
}
