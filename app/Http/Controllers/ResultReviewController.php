<?php

namespace App\Http\Controllers;

use App\ResultReview;
use App\Revision;
use App\RevisionProtocol;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultReviewController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function ready(){
        $revisions = Revision::all();

        $response = []; $i = 0; 
        foreach($revisions as $revision){
            $data = [
                'research_ethic_id' => $revision->research_ethic->id,
                'revision' => $revision->revision,
            ];
            $rev_protocol = RevisionProtocol::where($data)->first();

            if($rev_protocol){
                if(!$rev_protocol->is_ready) continue;
                $data['revision'] += 1;

                $result = ResultReview::where($data)->first();
                if($result) continue;
            } else {
                continue;
            }

            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $this->hashids->encode($revision->id);
            $response[$i]['rev'] = $revision->id;
            $response[$i]['judul'] = $revision->research_ethic->research->judul;
            $response[$i]['status'] = $revision->result_review->status;
            $response[$i]['revision'] = $revision->revision;
            $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $revision->created_at)->format('d F Y');
            $i++;
        }
        
        echo json_encode($response);
        exit;
    }

    public function all(){
        $results = ResultReview::all();

        $response = []; $i = 0; 
        foreach($results as $result){
            if($result->revision < 1) continue;
            
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $this->hashids->encode($result->id);
            $response[$i]['rev'] = $result->id;
            $response[$i]['judul'] = $result->research_ethic->research->judul;
            $response[$i]['status'] = $result->status;
            $response[$i]['revision'] = $result->revision;
            $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $result->created_at)->format('d F Y');
            $i++;
        }
        
        echo json_encode($response);
        exit;
    }

    public function store_keputusanlanjut(Request $request){
        $revision = Revision::find($request->id);

        if(!$revision) return response()->json([
            'success' => false,
            'msg'     => "Kesalahan mengambil data"
        ], 200);

        $req = $request->all();
        unset($req['sertifikat_layaketik']);

        $req['research_ethic_id'] = $revision->research_ethic->id;
        $req['revision'] = $revision->revision + 1;

        $data = [
            'research_ethic_id' => $revision->research_ethic->id,
            'revision'          => $revision->revision + 1
        ];

        $check = ResultReview::where($data)->get();
        if(count($check) > 0) return response()->json([
            'success' => false,
            'msg'     => 'Keputusan telaah lanjut sudah dibuat'
        ], 200);

        $result = ResultReview::create($req);

        if(!$result) return response()->json([
            'success' => false,
            'msg'     => 'Gagal membuat keputusan telaah lanjut'
        ], 200);

        if($request->hasFile('sertifikat_layaketik')){
            $data['sertifikat_layaketik'] = $this->uploadImage([
                'path'      => 'public/layaketik/surat_hasil',
                'file'      => $request->file('sertifikat_layaketik'),
                'user'      => $revision->research_ethic->user,
                'id'        => $result->id,
                'prefix'    => 'layaketiksurathasil_rev'.$req['revision'].$req['research_ethic_id']."_"
            ]);

            $update = $result->update($data);

            if(!$update) return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat surat keputusan telaah lanjut'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Keputusan Telaah Lanjut'
        ], 200);
    }
}
