<?php

namespace App\Http\Controllers;

use App\{ResearchEthic, SelfAssesment};
use Carbon\Carbon;
use Illuminate\Http\Request;

class SelfAssesmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all($admin = null){
        if($admin){
            $ethics = ResearchEthic::with('self_assesment')->latest()->get();
        } else {
            $ethics = ResearchEthic::with('self_assesment')->where('user_id', auth()->user()->id)->get();
        }

        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->self_assesment){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $ethic->self_assesment->id;
                $response[$i]['judul'] = $ethic->research->judul;
                $response[$i]['start_date'] = Carbon::createFromFormat('Y-m-d', $ethic->research->start_date)->format('d F Y');
                $response[$i]['created_at'] = Carbon::parse($ethic->self_assesment->created_at)->format('d F Y');

                $i++;
            }
        }

        echo json_encode($response);
        exit;
    }

    public function form(){
        $data = [
            'user_id' => auth()->user()->id,
            'status'  => 'accept'
        ];

        $ethics = ResearchEthic::where($data)->latest()->get();
        $result = [];

        foreach($ethics as $ethic){
            if(!empty($ethic->protocol)){
                if(empty($ethic->self_assesment)){
                    $result[] = $ethic;
                }
            }
        }

        return view('dashboard.layaketik.form_selfassesment', compact('result'));
    }

    public function store(Request $request){
        // return response()->json([
        //     'success' => false,
        //     'msg'     => $request->all()
        // ], 200);  

        $req = $request->all();
        $req['research_ethic_id'] = $request->judul;
        
        $req['nilai_sosial'] = isset($request->nilai_sosial)? json_encode($request->nilai_sosial): null;
        $req['nilai_ilmiah'] = isset($request->nilai_ilmiah)? json_encode($request->nilai_ilmiah): null;
        $req['pemerataan'] = isset($request->pemerataan)? json_encode($request->pemerataan): null;
        $req['potensi'] = isset($request->potensi)? json_encode($request->potensi): null;
        $req['bujukan'] = isset($request->bujukan)? json_encode($request->bujukan): null;
        $req['privacy'] = isset($request->privacy)? json_encode($request->privacy): null;

        $req['research_ethic_id'] = $request->judul;
        unset($req['judul']);

        $self_assesment = SelfAssesment::create($req);

        if(!$self_assesment){
            return response()->json([
                'success' => false,
                'msg'     => "Terjadi kesalahan dalam menyimpan data"
            ], 200);    
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menyimpan data Self Assesment"
        ], 200);
    }
}
