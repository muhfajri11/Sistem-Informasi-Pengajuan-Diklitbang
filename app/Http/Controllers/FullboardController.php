<?php

namespace App\Http\Controllers;

use App\Fullboard;
use App\ResearchEthic;
use App\ResultReview;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FullboardController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.layaketik.fullboard.atur');
    }

    public function notif(){
        return view('dashboard.layaketik.fullboard.notif');
    }

    public function user(){
        $ethics = ResearchEthic::where('user_id', auth()->user()->id)->latest()->get();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->fullboards){
                
                foreach($ethic->fullboards as $fullboard){
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($fullboard->result_review->id);
                    $response[$i]['id_'] = $fullboard->result_review->id;
                    $response[$i]['judul'] = $fullboard->research_ethic->research->judul;
                    $response[$i]['revision'] = $fullboard->result_review->revision;
                    $response[$i]['pengajuan'] = Carbon::parse($fullboard->created_at)->format('d F Y');
                    $response[$i]['pertemuan'] = Carbon::parse($fullboard->tanggal)->format('d F Y');
                    $i++;
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function ready($admin = null){
        $results = ResultReview::where('status', 'fullboard')->latest()->get();
        $response = []; $i = 0;

        foreach($results as $result){
            if($admin){
                if(empty($result->fullboard)) continue;

                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($result->id);
                $response[$i]['id_'] = $result->id;
                $response[$i]['judul'] = $result->research_ethic->research->judul;
                $response[$i]['revision'] = $result->revision;
                $response[$i]['pengajuan'] = Carbon::parse($result->created_at)->format('d F Y');
                $response[$i]['pertemuan'] = Carbon::parse($result->fullboard->tanggal)->format('d F Y');
                $i++;
            } else {
                if(empty($result->fullboard)){
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($result->id);
                    $response[$i]['id_'] = $result->id;
                    $response[$i]['judul'] = $result->research_ethic->research->judul;
                    $response[$i]['revision'] = $result->revision;
                    $response[$i]['pengajuan'] = Carbon::parse($result->created_at)->format('d F Y');
                    $i++;
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function detail(Request $request){
        $id = $this->hashids->decode($request->id);

        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi Kesalahan'
        ], 200);

        $id = $id[0];

        $result = ResultReview::find($id);

        if(!$result) return response()->json([
            'success' => false,
            'msg'     => 'Data keputusan tidak ada'
        ], 200);

        $fullboard = $result->fullboard;

        if(!$fullboard) return response()->json([
            'success' => false,
            'msg'     => 'Data fullboard tidak ada'
        ], 200);

        $fullboard->tanggal = Carbon::parse($fullboard->tanggal)->format('d F Y');
        $fullboard->jam = Carbon::parse($fullboard->jam)->format('H:i');

        $fullboard->surat_pemberitahuan = is_null($fullboard->surat_pemberitahuan)? 
            $fullboard->surat_pemberitahuan : Storage::url('layaketik/surat_pemberitahuan/'.$fullboard->surat_pemberitahuan);

        $fullboard->research = $fullboard->research_ethic->research;
        $fullboard->result_review = $fullboard->result_review;

        return response()->json([
            'success' => true,
            'get'     => $fullboard
        ], 200);
    }

    public function set_fullboard(Request $request){
        $id = $this->hashids->decode($request->id);

        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi Kesalahan'
        ], 200);

        $id = $id[0];
        
        $req = $request->all();
        $result = ResultReview::find($id);

        if(!$result) return response()->json([
            'success' => false,
            'msg'     => 'Data keputusan tidak ada'
        ], 200);

        if(!$result->fullboard){
            $req['result_review_id'] = $id;
            $req['research_ethic_id'] = $result->research_ethic->id;
            $req['revision'] = $result->revision;

            $fullboard = Fullboard::create($req);

            if(!$fullboard) return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat jadwal fullboard'
            ], 200);        

            if($request->hasFile('surat_pemberitahuan')){
                $data['surat_pemberitahuan'] = $this->uploadImage([
                    'path'      => 'public/layaketik/surat_pemberitahuan',
                    'file'      => $request->file('surat_pemberitahuan'),
                    'user'      => $result->research_ethic->user,
                    'id'        => $fullboard->id,
                    'prefix'    => 'layaketiksuratfullboard_rev'.$result->revision.$id."_"
                ]);
    
                $update = $fullboard->update($data);
    
                if(!$update) return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal membuat surat pemberitahuan fullboard'
                ], 200);
            }
            
            $msg = 'Berhasil Membuat Jadwal Fullboard';
        } else {

            if($request->hasFile('surat_pemberitahuan')){
                $req['surat_pemberitahuan'] = $this->uploadImage([
                    'path'      => 'public/layaketik/surat_pemberitahuan',
                    'file'      => $request->file('surat_pemberitahuan'),
                    'user'      => $result->research_ethic->user,
                    'id'        => $result->fullboard->id,
                    'prefix'    => 'layaketiksuratfullboard_rev'.$result->revision."_"
                ]);
            }

            $fullboard = $result->fullboard->update($req);

            if(!$fullboard) return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat jadwal fullboard'
            ], 200);        

            $msg = 'Berhasil Update Jadwal Fullboard';
        }

        return response()->json([
            'success' => true,
            'msg'     => $msg
        ], 200);
    }
}
