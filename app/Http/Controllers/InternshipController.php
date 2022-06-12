<?php

namespace App\Http\Controllers;

use App\FileInternship;
use App\Institution;
use App\Internship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.internship.pengajuan');
    }

    public function all($type){
        $user = auth()->user();

        if(strpos($type, ',')){
            $type = explode(',', $type);
            
            $type2 = $type[1];
            $type = $type[0];
        }

        $comparatives = Internship::where([
            'user_id' => $user->id,
            'status'  => $type
        ]);

        if(isset($type2)){
            $comparatives->orWhere('status', $type2);
        }

        $comparatives->latest()->get();
        $response = [];

        $comparatives->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['file_internship_id'] = $data['file_internship_id'];
            $response[$i]['name'] = $data['name'];
            $response[$i]['jurusan'] = ucwords($data['jurusan']);
            $response[$i]['start_date'] = Carbon::createFromFormat('Y-m-d', $data['start_date'])->format('d F Y');
            $response[$i]['end_date'] = Carbon::createFromFormat('Y-m-d', $data['end_date'])->format('d F Y');
            $response[$i]['type'] = $data['type'];
            $response[$i]['status'] = $data['status'];
            $response[$i]['paid'] = $data['paid'];
        });

        echo json_encode($response);
        exit;
    }

    public function get_once(Request $request){
        $intern = Internship::with('rooms', 'user', 'institution', 'file_internship')->find(1);

        $intern->file_internship->proposal = Storage::url('magang/proposal/'.$intern->file_internship->proposal);
        $intern->file_internship->akreditasi = Storage::url('magang/akreditasi/'.$intern->file_internship->akreditasi);
        $intern->file_internship->panduan_praktek = Storage::url('magang/panduanpraktek/'.$intern->file_internship->panduan_praktek);
        $intern->file_internship->ktm = Storage::url('magang/ktm/'.$intern->file_internship->ktm);
        $intern->file_internship->transkrip = Storage::url('magang/transkrip/'.$intern->file_internship->transkrip);
        $intern->file_internship->izin_pkl = Storage::url('magang/izinpkl/'.$intern->file_internship->izin_pkl);
        $intern->file_internship->izin_ortu = Storage::url('magang/izinortu/'.$intern->file_internship->izin_ortu);
        $intern->file_internship->antigen = Storage::url('magang/antigen/'.$intern->file_internship->antigen);

        $intern->file_internship->mou = is_null($intern->file_internship->mou)? 
            $intern->file_internship->mou : Storage::url('magang/mou/'.$intern->file_internship->mou);

        $intern->file_internship->bukti_pkl = is_null($intern->file_internship->bukti_pkl)? 
            $intern->file_internship->bukti_pkl : Storage::url('magang/buktipkl/'.$intern->file_internship->bukti_pkl);

        $intern->file_internship->eviden_paid = is_null($intern->file_internship->eviden_paid)? 
            $intern->file_internship->eviden_paid : Storage::url('magang/evidenpaid/'.$intern->file_internship->eviden_paid);
        

        if(!$intern){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json(['success' => true, 'get' => $intern], 200);
    }

    public function store(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['user_id'] = $user->id;
        $req['institution_id'] = $req['institusi'];
        $req['start_date'] = $req['start_date_submit'];
        $req['end_date'] = $req['end_date_submit'];

        unset(
            $req['start_date_submit'],
            $req['end_date_submit'],
            $req['institusi']
        );

        if($request->hasFile('mou')){
            $req['total_paid'] = 150000;
        } else {
            $req['total_paid'] = 300000;
        }

        $canMagang = Internship::can_magang($req['nim']);

        if(!$canMagang){
            return response()->json([
                'success' => false,
                'msg'     => "NIM sudah terdaftar silahkan cek kembali data anda!"
            ], 200);
        }

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 500);
        $intern = Internship::create($req);

        if(!$intern){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat pengajuan'
            ], 200);
        }    

        /**       Upload Image           */
        $image_proposal = $this->uploadImage([
            'path'      => 'public/magang/proposal',
            'file'      => $request->file('proposal'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangproposal_'
        ]);

        $image_akreditasi = $this->uploadImage([
            'path'      => 'public/magang/akreditasi',
            'file'      => $request->file('akreditasi'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangakreditasi_'
        ]);

        $image_panduanpraktek = $this->uploadImage([
            'path'      => 'public/magang/panduanpraktek',
            'file'      => $request->file('panduan_praktek'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangpanduanpraktek_'
        ]);

        $image_ktm = $this->uploadImage([
            'path'      => 'public/magang/ktm',
            'file'      => $request->file('ktm'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangktm_'
        ]);

        $image_transkrip = $this->uploadImage([
            'path'      => 'public/magang/transkrip',
            'file'      => $request->file('transkrip'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangtranskrip_'
        ]);

        $image_izinpkl = $this->uploadImage([
            'path'      => 'public/magang/izinpkl',
            'file'      => $request->file('izin_pkl'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangizinpkl_'
        ]);

        $image_izinortu = $this->uploadImage([
            'path'      => 'public/magang/izinortu',
            'file'      => $request->file('izin_ortu'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangizinortu_'
        ]);

        $image_antigen = $this->uploadImage([
            'path'      => 'public/magang/antigen',
            'file'      => $request->file('antigen'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangantigen_'
        ]);
        
        if($request->hasFile('mou')){
            $image_mou = $this->uploadImage([
                'path'      => 'public/magang/mou',
                'file'      => $request->file('mou'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangmou_'
            ]);
        }

        if($request->hasFile('bukti_pkl')){
            $image_buktipkl = $this->uploadImage([
                'path'      => 'public/magang/buktipkl',
                'file'      => $request->file('bukti_pkl'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangbuktipkl_'
            ]);
        }

        if($request->hasFile('eviden_paid')){
            $image_evidenpaid = $this->uploadImage([
                'path'      => 'public/magang/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangevidenpaid_'
            ]);
        }

        $data_image = [
            'proposal'          => $image_proposal,
            'akreditasi'        => $image_akreditasi,
            'panduan_praktek'   => $image_panduanpraktek,
            'ktm'               => $image_ktm,
            'transkrip'         => $image_transkrip,
            'izin_pkl'          => $image_izinpkl,
            'izin_ortu'         => $image_izinortu,
            'antigen'           => $image_antigen
        ];

        if(isset($image_mou)) $data_image['mou'] = $image_mou;
        if(isset($image_buktipkl)) $data_image['bukti_pkl'] = $image_buktipkl;
        if(isset($image_evidenpaid)) $data_image['eviden_paid'] = $image_evidenpaid;

        $createFile = FileInternship::create($data_image);

        if(!$createFile){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal menyimpan data berkas'
            ], 200);
        }
        Internship::find($intern->id)->update(['file_internship_id' => $createFile->id]);
        /**      End Upload Image           */

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Pengajuan Magang',
            'data'    => $createFile
        ], 200);
    }

    public function update(Request $request){
        $req = $request->all();
        $user = auth()->user();

        $req['institution_id'] = $req['institusi'];
        $req['start_date'] = $req['start_date_submit'];
        $req['end_date'] = $req['end_date_submit'];

        unset(
            $req['start_date_submit'],
            $req['end_date_submit'],
            $req['institusi']
        );

        if($request->hasFile('mou')){
            $req['total_paid'] = 150000;
        }

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 500);
        $intern = Internship::find($request->id)->update($req);

        if(!$intern){
            return response()->json([
                'success' => false,
                'msg'     => 'Gagal update pengajuan'
            ], 200);
        }    

        $intern = Internship::find($request->id);
        $data_image = [];

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $intern->id
        // ], 500);
        /**       Upload Image           */
        if($request->hasFile('proposal')){
            $image_proposal = $this->uploadImage([
                'path'      => 'public/magang/proposal',
                'file'      => $request->file('proposal'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangproposal_'
            ]);

            $data_image['proposal'] = $image_proposal;
        }

        if($request->hasFile('akreditasi')){
            $image_akreditasi = $this->uploadImage([
                'path'      => 'public/magang/akreditasi',
                'file'      => $request->file('akreditasi'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangakreditasi_'
            ]);
            
            $data_image['akreditasi'] = $image_akreditasi;
        }

        if($request->hasFile('panduan_praktek')){
            $image_panduanpraktek = $this->uploadImage([
                'path'      => 'public/magang/panduanpraktek',
                'file'      => $request->file('panduan_praktek'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangpanduanpraktek_'
            ]);

            $data_image['panduan_praktek'] = $image_panduanpraktek;
        }

        if($request->hasFile('ktm')){
            $image_ktm = $this->uploadImage([
                'path'      => 'public/magang/ktm',
                'file'      => $request->file('ktm'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangktm_'
            ]);

            $data_image['ktm'] = $image_ktm;
        }

        if($request->hasFile('transkrip')){
            $image_transkrip = $this->uploadImage([
                'path'      => 'public/magang/transkrip',
                'file'      => $request->file('transkrip'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangtranskrip_'
            ]);

            $data_image['transkrip'] = $image_transkrip;
        }

        if($request->hasFile('izin_pkl')){
            $image_izinpkl = $this->uploadImage([
                'path'      => 'public/magang/izinpkl',
                'file'      => $request->file('izin_pkl'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangizinpkl_'
            ]);

            $data_image['izin_pkl'] = $image_izinpkl;
        }

        if($request->hasFile('izin_ortu')){
            $image_izinortu = $this->uploadImage([
                'path'      => 'public/magang/izinortu',
                'file'      => $request->file('izin_ortu'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangizinortu_'
            ]);

            $data_image['izin_ortu'] = $image_izinortu;
        }

        if($request->hasFile('antigen')){
            $image_antigen = $this->uploadImage([
                'path'      => 'public/magang/antigen',
                'file'      => $request->file('antigen'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangantigen_'
            ]);

            $data_image['antigen'] = $image_antigen;
        }
        
        if($request->hasFile('mou')){
            $image_mou = $this->uploadImage([
                'path'      => 'public/magang/mou',
                'file'      => $request->file('mou'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangmou_'
            ]);

            $data_image['mou'] = $image_mou;
        }

        if($request->hasFile('bukti_pkl')){
            $image_buktipkl = $this->uploadImage([
                'path'      => 'public/magang/buktipkl',
                'file'      => $request->file('bukti_pkl'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangbuktipkl_'
            ]);

            $data_image['bukti_pkl'] = $image_buktipkl;
        }

        if($request->hasFile('eviden_paid')){
            $image_evidenpaid = $this->uploadImage([
                'path'      => 'public/magang/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangevidenpaid_'
            ]);

            $data_image['eviden_paid'] = $image_evidenpaid;
        }

        if(count($data_image) > 0){
            $updateFile = FileInternship::find($intern->file_internship_id)->update($data_image);

            if(!$updateFile){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan data berkas'
                ], 200);
            }
        }
        
        /**      End Upload Image           */

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Update Pengajuan Magang'
        ], 200);
    }

    public function update_eviden(Request $request){
        $user = auth()->user();
        $intern = Internship::find($request->id);

        if($request->hasFile('eviden_paid')){
            $image_evidenpaid = $this->uploadImage([
                'path'      => 'public/magang/evidenpaid',
                'file'      => $request->file('eviden_paid'),
                'user'      => $user,
                'id'        => $intern->file_internship_id,
                'prefix'    => 'magangevidenpaid_'
            ]);

            $update = FileInternship::find($intern->file_internship_id)->update(['eviden_paid' => $image_evidenpaid]);

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
}
