<?php

namespace App\Http\Controllers;

use App\{ResultReview, Revision, RevisionProtocol};
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RevisionController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.layaketik.admin.result_perbaikan');
    }

    public function list($id){
        $id = $this->hashids->decode($id);
        if(empty($id)) return abort(404);

        $id = $id[0];
        $result = ResultReview::find($id);
        if(empty($result)) return abort(404);

        $id = $result->research_ethic_id;

        return view('dashboard.layaketik.telaah.list_telaahlanjut', compact('result', 'id'));
    }

    public function ready(){
        $results = ResultReview::all();

        $response = []; $i = 0; $_status = ['expedited', 'fullboard'];
        foreach($results as $result){
            if(in_array($result->status, $_status)){
                if(!$result->perbaikan){
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($result->id);
                    $response[$i]['judul'] = $result->research_ethic->research->judul;
                    $response[$i]['status'] = $result->status;
                    $response[$i]['revision'] = $result->revision;
                    $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $result->created_at)->format('d F Y');
                    $i++;
                }
            }
        }
        
        echo json_encode($response);
        exit;
    }

    public function all(){
        $revisions = Revision::latest()->get();

        $response = []; $i = 0;
        foreach($revisions as $revision){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $this->hashids->encode($revision->result_review->id);
            $response[$i]['rev'] = $revision->id;
            $response[$i]['judul'] = $revision->research_ethic->research->judul;
            $response[$i]['revision'] = $revision->revision;
            $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $revision->created_at)->format('d F Y');
            $i++;
        }
        
        echo json_encode($response);
        exit;
    }

    public function store(Request $request){
        $id = $this->hashids->decode($request->id);
        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);
        $id = $id[0];

        $req = $request->all();

        $result = ResultReview::find($id);
        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);

        $req['user_id'] = auth()->user()->id;
        $req['result_review_id'] = $id;
        $req['research_ethic_id'] = $result->research_ethic->id;
        $req['revision'] = $result->revision;

        $_revision = Revision::where('result_review_id', $id)->first();

        if(is_null($_revision)){
            $revision = Revision::create($req);

            if(!$revision) return response()->json([
                'success' => false,
                'msg'     => "Gagal menyimpan data"
            ], 200);

            if($request->hasFile('surat_perbaikan')){
                $image['surat_perbaikan'] = $this->uploadImage([
                    'path'      => 'public/layaketik/surat_perbaikan',
                    'file'      => $request->file('surat_perbaikan'),
                    'user'      => $result->research_ethic->user,
                    'id'        => $revision->id,
                    'prefix'    => 'layaketiksuratperbaikan_rev'.$result->revision.$result->research_ethic->id."_"
                ]);
            }
    
            $update = $revision->update($image);

            $msg = "Berhasil membuat masukan perbaikan";
        } else {
            if($request->hasFile('surat_perbaikan')){
                $req['surat_perbaikan'] = $this->uploadImage([
                    'path'      => 'public/layaketik/surat_perbaikan',
                    'file'      => $request->file('surat_perbaikan'),
                    'user'      => $result->research_ethic->user,
                    'id'        => $_revision->id,
                    'prefix'    => 'layaketiksuratperbaikan_rev'.$result->revision.$result->research_ethic->id."_"
                ]);
            }
    
            $update = $_revision->update($req);

            $msg = "Berhasil update data masukan perbaikan";
        }

        if(!$update) return response()->json([
            'success' => false,
            'msg'     => "Gagal mengupdate data"
        ], 200);

        return response()->json([
            'success' => true,
            'msg'     => $msg
        ], 200);
    }

    public function detail(Request $request){
        $revision = Revision::find($request->id);
        if(empty($revision)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi kesalahan mengambil data'
        ], 200);

        $revision->surat_perbaikan = is_null($revision->surat_perbaikan)? 
            $revision->surat_perbaikan : Storage::url('layaketik/surat_perbaikan/'.$revision->surat_perbaikan);

        $revision->research_ethic = $revision->research_ethic;
        $revision->result_review = $revision->result_review;
        $revision->research = $revision->research_ethic->research;
        $revision->institution = $revision->research->institution;
        $revision->user = $revision->research_ethic->user;

        return response()->json([
            'success' => true,
            'get'     => $revision
        ], 200);
    }

}
