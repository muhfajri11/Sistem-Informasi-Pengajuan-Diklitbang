<?php

namespace App\Http\Controllers;

use App\{Research, ResearchEthic, ResearchFee, ResultReview};
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchEthicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->hashids = new Hashids();
    }

    public function index(){
        return view('dashboard.layaketik.pengajuan');
    }

    public function result(){
        return view('dashboard.layaketik.result');
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

        $researches = ResearchEthic::with('research')->where($data);

        if(isset($type2)) $researches->orWhere('status', $type2);

        $researches->latest()->get();
        $response = [];

        $researches->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['judul'] = $data['research']['judul'];
            $response[$i]['ketua'] = ucwords($data['research']['ketua']);
            $response[$i]['start_date'] = Carbon::createFromFormat('Y-m-d', $data['research']['start_date'])->format('d F Y');
            $response[$i]['status'] = $data['status'];
            $response[$i]['paid'] = $data['paid'];
        });

        echo json_encode($response);
        exit;
    }

    public function get_result(){
        $ethics = ResearchEthic::where('user_id', auth()->user()->id)->latest()->get();

        $response = []; $i = 0;
        foreach($ethics as $ethic){
            if($ethic->result_reviews){
                foreach($ethic->result_reviews as $result){
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($result->id);
                    $response[$i]['judul'] = $result->research_ethic->research->judul;
                    $response[$i]['status'] = $result->status;
                    $response[$i]['revision'] = $result->revision;
                    $i++;
                }
            }
        }
        
        echo json_encode($response);
        exit;
    }

    public function detail_result(Request $request){
        $id = $this->hashids->decode($request->id);

        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi Kesalahan'
        ], 200);

        $id = $id[0];

        $result = ResultReview::find($id);
        if(empty($result)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi kesalahan mengambil data'
        ], 200);

        $result->sertifikat_layaketik = is_null($result->sertifikat_layaketik)? 
            $result->sertifikat_layaketik : Storage::url('layaketik/surat_hasil/'.$result->sertifikat_layaketik);

        $result->research_ethic = $result->research_ethic;
        $result->research = $result->research_ethic->research;
        $result->institution = $result->research->institution;
        $result->user = $result->research_ethic->user;

        return response()->json([
            'success' => true,
            'get'     => $result
        ], 200);
    }

    public function get_once(Request $request){
        $layaketik = ResearchEthic::with(
                        'user', 'research', 'research_fee', 'research_type', 'origin_proposer',
                        'institution_proposer', 'status_proposer'
                    )->find($request->id);

        if(!$layaketik){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        $layaketik->research->institution = $layaketik->research->institution;
        $layaketik->research->education_level = $layaketik->research->education_level;

        $layaketik->research->start_date = Carbon::createFromFormat('Y-m-d', $layaketik->research->start_date)->format('d F Y');
        $layaketik->research->end_date = Carbon::createFromFormat('Y-m-d', $layaketik->research->end_date)->format('d F Y');
        $layaketik->research->anggota = json_decode($layaketik->research->anggota);

        $layaketik->research->permohonan = Storage::url('research/permohonan/'.$layaketik->research->permohonan);
        $layaketik->research->proposal = Storage::url('research/proposal/'.$layaketik->research->proposal);

        $layaketik->research->izin_penelitian = is_null($layaketik->research->izin_penelitian)? 
            $layaketik->research->izin_penelitian : Storage::url('research/izinpenelitian/'.$layaketik->research->izin_penelitian);

        $layaketik->research->eviden_paid = is_null($layaketik->research->eviden_paid)? 
            $layaketik->research->eviden_paid : Storage::url('research/evidenpaid/'.$layaketik->research->eviden_paid);
        
        //layaketik model

        if(isset($layaketik->peneliti_asing)){
            $layaketik->peneliti_asing = json_decode($layaketik->peneliti_asing);
        }

        $layaketik->surat_pengantar = Storage::url('layaketik/surat_pengantar/'.$layaketik->surat_pengantar);

        $layaketik->eviden_paid = is_null($layaketik->eviden_paid)? 
            $layaketik->eviden_paid : Storage::url('layaketik/evidenpaid/'.$layaketik->eviden_paid);

        return response()->json(['success' => true, 'get' => $layaketik], 200);
    }

    public function get_ethic(){
        $researches = Research::where('user_id', auth()->id())->where('is_layaketik', '1')->where('status', 'accept')->latest()->get();

        if(!$researches){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        $result = [];

        if(count($researches) > 0){
            foreach($researches as $research){
                $check = ResearchEthic::where('research_id', $research->id)->get();
                if(!(count($check) > 0)) $result[] = $research;
            }
        }

        return response()->json(['success' => true, 'get' => $result], 200);
    }

    public function check_fee(Request $request){
        $research = Research::find($request->id_judul);

        if(!$research){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        $data = [
            'research_type_id' => $request->id_jenis,
            'origin_proposer_id' => $request->id_asal,
            'institution_proposer_id' => $request->id_lembaga,
            'status_proposer_id' => $request->id_status,
            'education_level_id' => $research->education_level_id
        ];

        $fee = ResearchFee::where($data)->get();

        if(!$fee){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }
        
        if(count($fee) > 0) $fee = $fee[0];

        return response()->json(['success' => true, 'get' => $fee], 200);
    }

    public function check_feearr($data){
        $research = Research::find($data['id_judul']);

        if(!$research) return $data;

        $data = [
            'research_type_id' => $data['id_jenis'],
            'origin_proposer_id' => $data['id_asal'],
            'institution_proposer_id' => $data['id_lembaga'],
            'status_proposer_id' => $data['id_status'],
            'education_level_id' => $research->education_level_id
        ];

        $fee = ResearchFee::where($data)->get();

        if(!$fee) return false;
    
        if(count($fee) > 0) $fee = $fee[0];

        return $fee;
    }

    public function store(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['user_id'] = $user->id;
        $req['research_id'] = $request->judul;
        $req['research_type_id'] = $request->jenis;
        $req['origin_proposer_id'] = $request->asal;
        $req['institution_proposer_id'] = $request->lembaga;
        $req['status_proposer_id'] = $request->status;

        $check = ResearchEthic::where('research_id', $request->judul)->get();

        if(count($check) > 0){
            return response()->json([
                'success' => false,
                'msg'     => 'Judul sudah terdaftar di pengajuan layak etik'
            ], 200);
        }

        $check = Research::find($request->judul);

        if($check->user_id != $user->id){
            return response()->json([
                'success' => false,
                'msg'     => 'Judul bukan milik akun anda'
            ], 200);
        }

        $data = [
            'id_jenis' => $request->jenis,
            'id_asal' => $request->asal,
            'id_lembaga' => $request->lembaga,
            'id_status' => $request->status,
            'id_judul' => $request->judul
        ];

        $check_fee = $this->check_feearr($data);
        $req['research_fee_id'] = isset($check_fee->id)? $check_fee->id:null;

        if(isset($request->nama_peneliti)){
            $i = 0;
            foreach($request->nama_peneliti as $val){
                $json = [
                    'nama'          => $val,
                    'institution'   => $request->institusi_peneliti[$i],
                    'job'           => $request->tugas_peneliti[$i],
                    'phone'         => $request->telp_peneliti[$i]
                ];

                $req['peneliti_asing'][] = $json;
                $i++;
            }

            $req['peneliti_asing'] = json_encode($req['peneliti_asing']);
        }

        unset(
            $req['jenis'], $req['judul'], $req['asal'], $req['lembaga'], $req['status'],
            $req['nama_peneliti'], $req['institusi_peneliti'], $req['tugas_peneliti'],
            $req['telp_peneliti'], $req['surat_pernyataan']
        );

        $layaketik = ResearchEthic::create($req);

        if(!$layaketik){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }  

        $image['surat_pengantar'] = $this->uploadImage([
            'path'      => 'public/layaketik/surat_pengantar',
            'file'      => $request->file('surat_pengantar'),
            'user'      => $user,
            'id'        => $layaketik->id,
            'prefix'    => 'layaketiksuratpengantar_'
        ]);

        if($request->hasFile('eviden_paid')){
            $image['eviden_paid'] = $this->uploadImage([
                'path'      => 'public/layaketik/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $layaketik->id,
                'prefix'    => 'layaketikevidenpaid_'
            ]);
        }

        $createImage = $layaketik->update($image);

        if(!$createImage){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal upload berkas'
            ], 200);
        }  

        /**      End Upload Image           */

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil membuat pengajuan uji layak etik"
        ], 200);
    }

    public function update(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $layaketik = ResearchEthic::find($request->id);

        $req['research_type_id'] = $request->jenis;
        $req['origin_proposer_id'] = $request->asal;
        $req['institution_proposer_id'] = $request->lembaga;
        $req['status_proposer_id'] = $request->status;

        $data = [
            'id_jenis' => $request->jenis,
            'id_asal' => $request->asal,
            'id_lembaga' => $request->lembaga,
            'id_status' => $request->status,
            'id_judul' => $request->judul
        ];

        $check_fee = $this->check_feearr($data);
        $req['research_fee_id'] = isset($check_fee->id)? $check_fee->id:null;

        switch($request->kerjasama){
            case 'internasional':
                $req['peneliti_asing'] = null;
                break;
            case 'peneliti_asing':
                $req['jumlah_negara'] = null;
                break;
            default:
            $req['jumlah_negara'] = null;$req['peneliti_asing'] = null;
                break;
        }

        if(isset($request->nama_peneliti)){
            $i = 0;
            foreach($request->nama_peneliti as $val){
                $json = [
                    'nama'          => $val,
                    'institution'   => $request->institusi_peneliti[$i],
                    'job'           => $request->tugas_peneliti[$i],
                    'phone'         => $request->telp_peneliti[$i]
                ];

                $req['peneliti_asing'][] = $json;
                $i++;
            }

            $req['peneliti_asing'] = json_encode($req['peneliti_asing']);
        }

        unset(
            $req['jenis'], $req['judul'], $req['asal'], $req['lembaga'], $req['status'],
            $req['nama_peneliti'], $req['institusi_peneliti'], $req['tugas_peneliti'],
            $req['telp_peneliti'], $req['surat_pernyataan']
        );

        if(!$request->is_multisenter){
            $req['tempat_multisenter'] = null;$req['acc_multisenter'] = null;
        }

        if($request->hasFile('surat_pengantar')){
            $req['surat_pengantar'] = $this->uploadImage([
                'path'      => 'public/layaketik/surat_pengantar',
                'file'      => $request->file('surat_pengantar'),
                'user'      => $user,
                'id'        => $layaketik->id,
                'prefix'    => 'layaketiksuratpengantar_'
            ]);
        }

        if($request->hasFile('eviden_paid')){
            $req['eviden_paid'] = $this->uploadImage([
                'path'      => 'public/layaketik/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $layaketik->id,
                'prefix'    => 'layaketikevidenpaid_'
            ]);
        }
        
        $update = $layaketik->update($req);

        if(!$update){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal update data'
            ], 200);
        }  

        /**      End Upload Image           */

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil update data pengajuan layak etik"
        ], 200);
    }

    public function update_eviden(Request $request){
        $user = auth()->user();
        $etik = ResearchEthic::find($request->id);

        if($request->hasFile('eviden_paid')){
            $image = $this->uploadImage([
                'path'      => 'public/layaketik/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $etik->id,
                'prefix'    => 'layaketikevidenpaid_'
            ]);

            $update = $etik->update(['eviden_paid' => $image]);

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

        $intern = ResearchEthic::find($req['id']);

        $delete_image = $this->deleteImage([
            'path'  => "public/layaketik/surat_pengantar/",
            'image' => $intern->surat_pengantar
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi surat pengantar'
            ], 500);
        }

        if($intern->eviden_paid){
            $delete_image = $this->deleteImage([
                'path'  => "public/layaketik/evidenpaid/",
                'image' => $intern->eviden_paid
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Bukti Pembayaran'
                ], 500);
            }
        }

        $msg = ResearchEthic::deleteMessage($intern->user_id, $intern->id);

        // if(!$msg){
        //     return response()->json([
        //         'success' => false,
        //         'msg'     => 'Kesalahan hapus pesan'
        //     ], 200);
        // }
        
        $intern = ResearchEthic::where([
            'id'      => $req['id']
        ])->delete();

        if(!$intern){
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
}