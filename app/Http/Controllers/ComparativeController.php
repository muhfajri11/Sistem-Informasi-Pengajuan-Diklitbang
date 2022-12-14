<?php

namespace App\Http\Controllers;

use App\{Comparative, Room, Institution, Setting};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

    public function all($type, $admin = null){
        $user = auth()->user();

        if(strpos($type, ',')){
            $type = explode(',', $type);
            
            $type2 = $type[1];
            $type = $type[0];
        }

        if($admin){
            $data = ['status'  => $type];
        } else {
            $data = ['user_id' => $user->id, 'status'  => $type];
        }

        $comparatives = Comparative::where($data);

        if(isset($type2)){
            $comparatives->orWhere('status', $type2);
        }

        $comparatives->latest()->get();
        $response = [];

        $comparatives->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['title'] = $data['title'];
            $response[$i]['visit'] = Carbon::createFromFormat('Y-m-d', $data['visit'])->format('d F Y');
            $response[$i]['members'] = $data['members']." Orang";
            $response[$i]['status'] = $data['status'];
            $response[$i]['paid'] = $data['paid'];
            $response[$i]['permohonan'] = Storage::url('studibanding/permohonan/'.$data['permohonan']);
        });

        echo json_encode($response);
        exit;
    }

    public function get_once(Request $request){
        $comparative = Comparative::with('rooms', 'user', 'institution')->find($request->id);

        $comparative->visited = $comparative->visit;
        $comparative->visit = Carbon::createFromFormat('Y-m-d', $comparative->visit)->format('d F Y');
        $comparative->member = $comparative->members;
        $comparative->members = $comparative->members." Orang";
        $comparative->names = json_decode($comparative->names);
        $comparative->questions = json_decode($comparative->questions);
        $comparative->docs = json_decode($comparative->docs);
        $comparative->permohonan = Storage::url('studibanding/permohonan/'.$comparative->permohonan);

        $comparative->eviden_paid = is_null($comparative->eviden_paid)? 
            $comparative->eviden_paid : Storage::url('studibanding/eviden_paid/'.$comparative->eviden_paid);

        if(!$comparative){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json(['success' => true, 'get' => $comparative], 200);
    }

    public function update_eviden(Request $request){
        $user = auth()->user();

        if($request->hasFile('eviden_paid')){
            $image_eviden = $this->uploadImage([
                'path'      => 'public/studibanding/eviden_paid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $request->id,
                'prefix'    => 'comparativeeviden_'
            ]);

            $update = Comparative::find($request->id)->update(['eviden_paid' => $image_eviden]);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan data eviden'
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi'
            ], 200);
        }

        return response()->json(['success' => true, 'msg' => "Berhasil upload bukti pembayaran"], 200);
    }

    public function delete(){
        $req = request()->all();
        $comparative = Comparative::find($req['id']);

        if($comparative->eviden_paid){
            $delete_image = $this->deleteImage([
                'path'  => 'public/studibanding/eviden_paid/',
                'image' => $comparative->eviden_paid
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Bukti Pembayaran'
                ], 500);
            }
        }

        $delete_image = $this->deleteImage([
            'path'  => 'public/studibanding/permohonan/',
            'image' => $comparative->permohonan
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Permohonan'
            ], 500);
        }
        
        $comparative->rooms()->detach();
        $comparative = Comparative::where([
            'id'      => $req['id']
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

        $req['user_id'] = $user->id;
        $req['institution_id'] = $req['institution'];

        unset($req['institution'], $req['eviden_paid']);

        $fee = Setting::byName(['fee']);

        if($req['members'] < 10){
            $req['total_paid'] = $req['members'] * $fee->value->comparative->kurang_dari;
        } else {
            $req['total_paid'] = $req['members'] * $fee->value->comparative->lebih_dari;
        }

        $req['permohonan'] = "-";
        $req['names'] = json_encode($req['names']);
        $req['questions'] = json_encode($req['questions']);
        $req['docs'] = json_encode($req['docs']);
    
        $comparative = Comparative::create($req);
        $comparative->rooms()->attach($req['rooms']);

        if(!$comparative){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }

        $image_permohonan = $this->uploadImage([
            'path'      => 'public/studibanding/permohonan',
            'file'      => $request->file('permohonan'),
            'user'      => $user,
            'id'        => $comparative->id,
            'prefix'    => 'comparativepermohonan_'
        ]);
        $data['permohonan'] = $image_permohonan;

        if($request->hasFile('eviden_paid')){
            $image_eviden = $this->uploadImage([
                'path'      => 'public/studibanding/eviden_paid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $comparative->id,
                'prefix'    => 'comparativeeviden_'
            ]);
            $data['eviden_paid'] = $image_eviden;
        }

        $update = Comparative::find($comparative->id)->update($data);

        if(!$update){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal menyimpan data eviden'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Pengajuan Studi Banding'
        ], 200);
    }

    public function update(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['institution_id'] = $req['institution'];
        unset($req['institution'], $req['permohonan'], $req['eviden_paid']);

        if($req['members'] < 10){
            $req['total_paid'] = $req['members'] * 300000;
        } else {
            $req['total_paid'] = $req['members'] * 240000;
        }

        $req['names'] = json_encode($req['names']);
        $req['questions'] = json_encode($req['questions']);
        $req['docs'] = json_encode($req['docs']);

        $comparative = Comparative::find($req['id']);
        $comparative->rooms()->sync($req['rooms']);

        if($request->hasFile('permohonan')){
            $image_permohonan = $this->uploadImage([
                'path'      => 'public/studibanding/permohonan',
                'file'      => $request->file('permohonan'),
                'user'      => $user,
                'id'        => $comparative->id,
                'prefix'    => 'comparativepermohonan_'
            ]);
            $req['permohonan'] = $image_permohonan;
        }

        if($request->hasFile('eviden_paid')){
            $image_eviden = $this->uploadImage([
                'path'      => 'public/studibanding/eviden_paid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $comparative->id,
                'prefix'    => 'comparativeeviden_'
            ]);
            $req['eviden_paid'] = $image_eviden;
        }

        $comparative = Comparative::find($req['id'])->update($req);

        if(!$comparative){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal update data pengajuan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Update Data Pengajuan Studi Banding'
        ], 200);
    }
}
