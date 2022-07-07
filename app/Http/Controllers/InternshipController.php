<?php

namespace App\Http\Controllers;

use App\{EducationLevel, Internship, FileInternship, Institution, Setting, TypeInternship};

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

        $comparatives = Internship::with('institution')->where($data);

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
            $response[$i]['institution'] = $data['institution']? $data['institution']->name : null;
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
        $intern = Internship::with('rooms', 'user', 'institution', 'file_internship')->find($request->id);

        $intern->start_date = Carbon::createFromFormat('Y-m-d', $intern->start_date)->format('d F Y');
        $intern->end_date = Carbon::createFromFormat('Y-m-d', $intern->end_date)->format('d F Y');

        $intern->file_internship->proposal = Storage::url('magang/proposal/'.$intern->file_internship->proposal);
        $intern->file_internship->akreditasi = Storage::url('magang/akreditasi/'.$intern->file_internship->akreditasi);
        $intern->file_internship->panduan_praktek = Storage::url('magang/panduanpraktek/'.$intern->file_internship->panduan_praktek);
        $intern->file_internship->ktm_ktp = Storage::url('magang/ktm_ktp/'.$intern->file_internship->ktm_ktp);
        $intern->file_internship->transkrip = Storage::url('magang/transkrip/'.$intern->file_internship->transkrip);
        $intern->file_internship->izin_pkl = Storage::url('magang/izinpkl/'.$intern->file_internship->izin_pkl);
        $intern->file_internship->izin_ortu = Storage::url('magang/izinortu/'.$intern->file_internship->izin_ortu);
        $intern->file_internship->antigen = Storage::url('magang/antigen/'.$intern->file_internship->antigen);

        $intern->file_internship->mou = is_null($intern->file_internship->mou)? 
            $intern->file_internship->mou : Storage::url('magang/mou/'.$intern->file_internship->mou);

        $intern->file_internship->bukti_pkl = is_null($intern->file_internship->bukti_pkl)? 
            $intern->file_internship->bukti_pkl : Storage::url('magang/buktipkl/'.$intern->file_internship->bukti_pkl);

        $intern->file_internship->sertifikat = is_null($intern->file_internship->sertifikat)? 
            $intern->file_internship->sertifikat : Storage::url('magang/sertifikat/'.$intern->file_internship->sertifikat);

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

        $jenjang = EducationLevel::find($req['jenjang'])->first();
        $tipe = TypeInternship::find($req['type'])->first();
        $mou_data = Setting::byName(['fee']);

        $req['jenjang'] = $jenjang->name;
        $req['type'] = $tipe->name;

        $checkData = [
            [$jenjang, "Data Jenjang Pendidikan"],
            [$tipe, "Data Tipe PKL"]
        ];

        foreach($checkData as $data){
            if(!$data[0]) return response()->json([
                'success' => false,
                'msg'     => $data[1]." tidak tersedia"
            ], 200);
        }
        
        $price_jenjang = $jenjang->fee;
        $price_tipe = $tipe->fee;

        if($request->hasFile('mou')){
            $price_mou = $mou_data->value->internship->mou;
        } else {
            $price_mou = $mou_data->value->internship->no_mou;
        }

        $req['jenjang_price'] = $price_jenjang;
        $req['type_price'] = $price_tipe;
        $req['mou_price'] = $price_mou;
        $req['total_paid'] = $price_jenjang + $price_tipe + $price_mou;

        $canMagang = Internship::can_magang($req['nim']);

        if(!$canMagang){
            return response()->json([
                'success' => false,
                'msg'     => "NIM sudah terdaftar silahkan cek kembali data anda!"
            ], 200);
        }

        $isLoad = Internship::is_load();

        if(!$isLoad){
            return response()->json([
                'success' => false,
                'msg'     => "Kuota PKL saat ini sudah penuh"
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

        $image_panduanpraktek = $this->uploadImage([
            'path'      => 'public/magang/panduanpraktek',
            'file'      => $request->file('panduan_praktek'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangpanduanpraktek_'
        ]);

        $image_ktm = $this->uploadImage([
            'path'      => 'public/magang/ktm_ktp',
            'file'      => $request->file('ktm_ktp'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangktmktp_'
        ]);

        $image_jadwal = $this->uploadImage([
            'path'      => 'public/magang/jadwal',
            'file'      => $request->file('jadwal'),
            'user'      => $user,
            'id'        => $intern->id,
            'prefix'    => 'magangjadwal_'
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
            'panduan_praktek'   => $image_panduanpraktek,
            'ktm_ktp'           => $image_ktm,
            'jadwal'            => $image_jadwal,
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

        $getData = Internship::find($request->id);

        unset(
            $req['start_date_submit'],
            $req['end_date_submit'],
            $req['institusi']
        );

        $jenjang = EducationLevel::find($req['jenjang'])->first();
        $tipe = TypeInternship::find($req['type'])->first();
        $mou_data = Setting::byName(['fee']);

        $req['jenjang'] = $jenjang->name;
        $req['type'] = $tipe->name;

        $checkData = [
            [$jenjang, "Data Jenjang Pendidikan"],
            [$tipe, "Data Tipe PKL"]
        ];

        foreach($checkData as $data){
            if(!$data[0]) return response()->json([
                'success' => false,
                'msg'     => $data[1]." tidak tersedia"
            ], 200);
        }
        
        $price_jenjang = $jenjang->fee;
        $price_tipe = $tipe->fee;
        $price_mou = $getData->mou_price;

        if($request->hasFile('mou')){
            $price_mou = $mou_data->value->internship->mou;
        }

        $req['jenjang_price'] = $price_jenjang;
        $req['type_price'] = $price_tipe;
        $req['mou_price'] = $price_mou;
        $req['total_paid'] = $price_jenjang + $price_tipe + $price_mou;

        // if($request->hasFile('mou')){
        //     $req['total_paid'] = 150000;
        // }

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

        if($request->hasFile('ktm_ktp')){
            $image_ktm = $this->uploadImage([
                'path'      => 'public/magang/ktm_ktp',
                'file'      => $request->file('ktm_ktp'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangktmktp_'
            ]);

            $data_image['ktm'] = $image_ktm;
        }

        if($request->hasFile('jadwal')){
            $image_jadwal = $this->uploadImage([
                'path'      => 'public/magang/jadwal',
                'file'      => $request->file('jadwal'),
                'user'      => $user,
                'id'        => $intern->id,
                'prefix'    => 'magangjadwal_'
            ]);

            $data_image['jadwal'] = $image_jadwal;
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

    public function delete(){
        $req = request()->all();

        $intern = Internship::with('file_internship')->find($req['id']);

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/proposal/",
            'image' => $intern->file_internship->proposal
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Proposal'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/panduanpraktek/",
            'image' => $intern->file_internship->panduan_praktek
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Panduan Praktek'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/ktm_ktp/",
            'image' => $intern->file_internship->ktm_ktp
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi KTM/KTP'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/jadwal/",
            'image' => $intern->file_internship->jadwal
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Jadwal Praktek'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/izinpkl/",
            'image' => $intern->file_internship->izin_pkl
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Surat Izin Magang'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/izinortu/",
            'image' => $intern->file_internship->izin_ortu
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Surat Izin Orang Tua'
            ], 500);
        }

        $delete_image = $this->deleteImage([
            'path'  => "public/magang/antigen/",
            'image' => $intern->file_internship->antigen
        ]);

        if(!$delete_image){
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi Antigen'
            ], 500);
        }
        
        if($intern->file_internship->mou){
            $delete_image = $this->deleteImage([
                'path'  => "public/magang/mou/",
                'image' => $intern->file_internship->mou
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi MOU'
                ], 500);
            }
        }

        if($intern->file_internship->bukti_pkl){
            $delete_image = $this->deleteImage([
                'path'  => "public/magang/buktipkl/",
                'image' => $intern->file_internship->bukti_pkl
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Pengalaman Magang'
                ], 500);
            }
        }

        if($intern->file_internship->sertifikat){
            $delete_image = $this->deleteImage([
                'path'  => "public/magang/sertifikat/",
                'image' => $intern->file_internship->sertifikat
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Sertifikat'
                ], 500);
            }
        }

        if($intern->file_internship->eviden_paid){
            $delete_image = $this->deleteImage([
                'path'  => "public/magang/evidenpaid/",
                'image' => $intern->file_internship->eviden_paid
            ]);

            if(!$delete_image){
                return response()->json([
                    'success' => false,
                    'msg'     => 'File tidak terdeteksi Bukti Pembayaran'
                ], 500);
            }
        }
        
        $intern->rooms()->detach();
        $intern->file_internship()->delete();

        $msg = Internship::deleteMessage($intern->user_id, $intern->id);

        if(!$msg){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }
        
        $intern = Internship::where([
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
