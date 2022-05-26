<?php

namespace App\Http\Controllers;

use App\{Comparative, Room, Institution};
use Illuminate\Http\Request;
use Carbon\Carbon;

class ComparativeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $rooms = Room::get(['id', 'name']);
        $institutions = Institution::get(['id', 'name']);

        return view('dashboard.studibanding.pengajuan', compact('rooms', 'institutions'));
    }

    public function all($type){
        $user = auth()->user();
        $comparatives = Comparative::where([
            'user_id' => $user->id,
            'status'  => $type
        ])->latest()->get();
        $response = [];

        $comparatives->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['title'] = $data['title'];
            $response[$i]['visit'] = Carbon::createFromFormat('Y-m-d', $data['visit'])->format('d F Y');;
            $response[$i]['members'] = $data['members']." Orang";
            $response[$i]['status'] = $data['status'];
        });

        echo json_encode($response);
        exit;
    }

    public function delete_user(){
        $req = request()->all();
        $user = auth()->user();

        $comparative = Comparative::where([
            'id'      => $req['id'],
            'user_id' => $user->id
        ])->delete();

        if(!$comparative){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Hapus Data'
        ], 200);
    }

    public function store(Request $request){
        
        
        $req = $request->all();
        $user = auth()->user();
        unset($req['eviden_paid']);

        $req['user_id'] = $user->id;
        $req['institution_id'] = $req['institution'];
        $req['status'] = 'review';
        unset($req['institution']);

        if($req['members'] < 10){
            $req['total_paid'] = $req['members'] * 300000;
        } else {
            $req['total_paid'] = $req['members'] * 240000;
        }

        $req['paid'] = 0;
        $req['attach'] = "-";
        $req['questions'] = json_encode($req['questions']);
        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 500);
        $comparative = Comparative::create($req);
        $comparative->rooms()->attach($req['rooms']);

        if(!$comparative){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }

        if($request->hasFile('attach')){
            $path = 'public/studibanding/lampiran';
            $image = $request->file('attach');

            $extension = $request->file('attach')->getClientOriginalExtension();
            $name = str_replace(' ', '', strtolower($user->name));

            $image_attach = "comparativeattach_".$name."_".$comparative->id.$extension;
            $img_store = $request->file('attach')->storeAs($path, $image_attach);

            $update = Comparative::find($comparative->id)->update(['attach' => $image_attach]);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan data attach'
                ], 200);
            }
        }

        if($request->hasFile('eviden_paid')){
            $path = 'public/studibanding/eviden_paid';
            $image = $request->file('eviden_paid');

            $extension = $request->file('eviden_paid')->getClientOriginalExtension();
            $name = str_replace(' ', '', strtolower($user->name));

            $image_eviden = "comparativeeviden_".$name."_".$comparative->id.$extension;
            $img_store = $request->file('eviden_paid')->storeAs($path, $image_eviden);

            $update = Comparative::find($comparative->id)->update(['eviden_paid' => $image_eviden]);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan data eviden'
                ], 200);
            }
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Pengajuan Studi Banding'
        ], 200);
    }
}
