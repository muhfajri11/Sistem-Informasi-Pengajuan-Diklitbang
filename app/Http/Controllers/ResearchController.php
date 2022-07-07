<?php

namespace App\Http\Controllers;

use App\{EducationLevel, Research, Setting};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.research.pengajuan');
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

        $researches = Research::with('institution')->where($data);

        if(isset($type2)){
            $researches->orWhere('status', $type2);
        }

        $researches->latest()->get();
        $response = [];

        $researches->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['judul'] = $data['judul'];
            $response[$i]['ketua'] = ucwords($data['ketua']);
            $response[$i]['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date'])->format('d F Y');
            $response[$i]['is_layaketik'] = $data['is_layaketik'];
            $response[$i]['status'] = $data['status'];
            $response[$i]['paid'] = $data['paid'];
        });

        echo json_encode($response);
        exit;
    }

    public function get_once(Request $request){
        $research = Research::with('user', 'institution', 'education_level')->find($request->id);

        $research->start_date = Carbon::createFromFormat('Y-m-d', $research->start_date)->format('d F Y');
        $research->end_date = Carbon::createFromFormat('Y-m-d', $research->end_date)->format('d F Y');
        $research->anggota = json_decode($research->anggota);

        $research->permohonan = Storage::url('research/permohonan/'.$research->permohonan);
        $research->proposal = Storage::url('research/proposal/'.$research->proposal);

        $research->izin_penelitian = is_null($research->izin_penelitian)? 
            $research->izin_penelitian : Storage::url('research/izinpenelitian/'.$research->izin_penelitian);

        $research->eviden_paid = is_null($research->eviden_paid)? 
            $research->eviden_paid : Storage::url('research/evidenpaid/'.$research->eviden_paid);
        
        if(!$research){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json(['success' => true, 'get' => $research], 200);
    }

    public function store(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['user_id'] = $user->id;
        $req['institution_id'] = $req['institusi'];
        $req['education_level_id'] = $req['jenjang'];
        $req['start_date'] = $req['start_date_submit'];
        $req['end_date'] = $req['end_date_submit'];

        $req['anggota'] = isset($req['members'])? json_encode($req['members']): "[]";


        $jenjang = EducationLevel::find($req['jenjang'])->first();
        $fee = Setting::byName(['fee']);
        
        unset(
            $req['start_date_submit'],
            $req['end_date_submit'],
            $req['institusi'],
            $req['jenjang'],
        );

        if(!$jenjang) return response()->json([
            'success' => false,
            'msg'     => "Jenjang pendidikan tidak tersedia"
        ], 200);
        
        $req['total_paid'] = $fee->value->research;

        $canResearch = Research::can_research($req['judul']);

        if(!$canResearch){
            return response()->json([
                'success' => false,
                'msg'     => "Judul yang anda ajukan sudah terdaftar"
            ], 200);
        }

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 500);
        
        $research = Research::create($req);

        if(!$research){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }    

        /**       Upload Image           */

        $image['permohonan'] = $this->uploadImage([
            'path'      => 'public/research/permohonan',
            'file'      => $request->file('permohonan'),
            'user'      => $user,
            'id'        => $research->id,
            'prefix'    => 'researchpermohonan_'
        ]);

        $image['proposal'] = $this->uploadImage([
            'path'      => 'public/research/proposal',
            'file'      => $request->file('proposal'),
            'user'      => $user,
            'id'        => $research->id,
            'prefix'    => 'researchproposal_'
        ]);

        if($request->hasFile('eviden_paid')){
            $image['eviden_paid'] = $this->uploadImage([
                'path'      => 'public/research/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $research->id,
                'prefix'    => 'researchevidenpaid_'
            ]);
        }

        $createImage = $research->update($image);

        if(!$createImage){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal menyimpan data berkas'
            ], 200);
        }

        /**      End Upload Image           */

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Pengajuan Penelitian'
        ], 200);
    }

    public function update(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['institution_id'] = $req['institusi'];
        $req['education_level_id'] = $req['jenjang'];
        $req['start_date'] = $req['start_date_submit'];
        $req['end_date'] = $req['end_date_submit'];
        $req['anggota'] = json_encode($req['members']);

        $jenjang = EducationLevel::find($req['jenjang'])->first();
        $fee = Setting::byName(['fee']);
        
        unset(
            $req['start_date_submit'],
            $req['end_date_submit'],
            $req['institusi'],
            $req['jenjang'],
        );

        if(!$jenjang) return response()->json([
            'success' => false,
            'msg'     => "Jenjang pendidikan tidak tersedia"
        ], 200);
        
        $req['total_paid'] = $fee->value->research;

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 500);

        /**       Upload Image           */

        if($request->hasFile('permohonan')){
            $req['permohonan'] = $this->uploadImage([
                'path'      => 'public/research/permohonan',
                'file'      => $request->file('permohonan'),
                'user'      => $user,
                'id'        => $request->id,
                'prefix'    => 'researchpermohonan_'
            ]);
        }

        if($request->hasFile('proposal')){
            $req['proposal'] = $this->uploadImage([
                'path'      => 'public/research/proposal',
                'file'      => $request->file('proposal'),
                'user'      => $user,
                'id'        => $request->id,
                'prefix'    => 'researchproposal_'
            ]);
        }

        if($request->hasFile('eviden_paid')){
            $req['eviden_paid'] = $this->uploadImage([
                'path'      => 'public/research/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $request->id,
                'prefix'    => 'researchevidenpaid_'
            ]);
        }

        /**      End Upload Image           */
        
        $research = Research::find($request->id)->update($req);

        if(!$research){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }    

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Update Pengajuan Penelitian'
        ], 200);
    }

    public function update_eviden(Request $request){
        $user = auth()->user();
        $research = Research::find($request->id);

        if($request->hasFile('eviden_paid')){
            $image = $this->uploadImage([
                'path'      => 'public/research/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $research->id,
                'prefix'    => 'researchevidenpaid_'
            ]);

            $update = $research->update(['eviden_paid' => $image]);

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

        $intern = Research::find($req['id']);

        $delete_image = $this->deleteImage([
            'path'  => "public/research/permohonan/",
            'image' => $intern->permohonan
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Permohonan'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/research/proposal/",
            'image' => $intern->proposal
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Proposal'
            ], 500);
        }

        if($intern->izin_penelitian){
            $delete_image = $this->deleteImage([
                'path'  => "public/research/izin_penelitian/",
                'image' => $intern->izin_penelitian
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Izin Penelitian'
                ], 500);
            }
        }

        if($intern->eviden_paid){
            $delete_image = $this->deleteImage([
                'path'  => "public/research/evidenpaid/",
                'image' => $intern->eviden_paid
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Bukti Pembayaran'
                ], 500);
            }
        }

        $msg = Research::deleteMessage($intern->user_id, $intern->id);

        if(!$msg){
            return response()->json([
                'success' => false,
                'msg'     => 'Kesalahan hapus pesan'
            ], 200);
        }
        
        $intern = Research::where([
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
