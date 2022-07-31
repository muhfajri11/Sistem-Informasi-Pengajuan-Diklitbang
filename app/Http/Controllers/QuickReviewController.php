<?php

namespace App\Http\Controllers;

use App\QuickReview;
use App\ResearchEthic;
use App\ResultReview;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuickReviewController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.layaketik.telaah.telaah_cepat');
    }

    public function result_index(){
        return view('dashboard.layaketik.telaah.result_telaahcepat');
    }

    public function list_index($id){
        $id = $this->hashids->decode($id);
        if(empty($id)) return abort(404);

        $id = $id[0];
        $ethic = ResearchEthic::find($id);

        return view('dashboard.layaketik.telaah.list_telaahcepat', compact('ethic', 'id'));
    }

    public function ready($admin = null){
        $ethics = ResearchEthic::all();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->protocol){
                if(!empty($ethic->resume_review)){
                    if(!$admin){
                        $quick_reviews = $ethic->quick_review;

                        if($quick_reviews){
                            $is_have = null;
                            foreach($quick_reviews as $review){
                                // if user have reviewed protocol get id ethics
                                if($review->user_id == auth()->user()->id){
                                    $is_have = $review->id;
                                    break;
                                }
                            }

                            // if same id skip it
                            if($is_have) continue;
                        }
                    } else {
                        if(count($ethic->result_reviews) > 0) continue;
                    }
                    
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($ethic->id);
                    $response[$i]['id_'] = $ethic->id;
                    $response[$i]['judul'] = $ethic->research->judul;
                    $response[$i]['mulai'] = Carbon::createFromFormat('Y-m-d', $ethic->research->start_date)->format('d F Y');
                    $response[$i]['pengajuan'] = Carbon::parse($ethic->created_at)->format('d F Y');
                    $i++;
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function reviewed($admin = null){
        if($admin){
            $quickreview = QuickReview::where('research_ethic_id', $admin)->get();
        } else {
            $quickreview = QuickReview::all();
        }

        $response = []; $i = 0;

        foreach($quickreview as $review){
            if($review->user_id == auth()->user()->id && is_null($admin)){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($review->research_ethic->id);
                $response[$i]['judul'] = $review->research_ethic->research->judul;
                $response[$i]['usulan'] = $review->status;
                $response[$i]['pengajuan'] = Carbon::parse($review->research_ethic->created_at)->format('d F Y');
                $i++;
            }

            if($admin){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($review->id);
                $response[$i]['judul'] = $review->research_ethic->research->judul;
                $response[$i]['usulan'] = $review->status;
                $response[$i]['user'] = $review->user->name;
                $response[$i]['tgl_telaah'] = Carbon::parse($review->created_at)->format('d F Y');
                $response[$i]['pengajuan'] = Carbon::parse($review->research_ethic->created_at)->format('d F Y');
                $i++;
            }
        }

        // foreach($ethics as $ethic){
        //     if($ethic->protocol){
        //         if(!empty($ethic->resume_review)){
        //             $quick_reviews = $ethic->quick_review? $ethic->quick_review : null;

        //             if($quick_reviews){
        //                 $is_have = null; $usulan = null;
        //                 foreach($quick_reviews as $review){
        //                     // if user have reviewed protocol get id ethics
        //                     if($review->user_id == auth()->user()->id){
        //                         $is_have = $review->id;
        //                         $usulan = $review->status;
        //                         break;
        //                     }
        //                 }

        //                 // if same id skip it
        //                 if($is_have == $ethic->id){
        //                     $response[$i]['i'] = $i + 1;
        //                     $response[$i]['id'] = $this->hashids->encode($ethic->id);
        //                     $response[$i]['judul'] = $ethic->research->judul;
        //                     $response[$i]['usulan'] = $usulan;
        //                     $response[$i]['pengajuan'] = Carbon::parse($ethic->created_at)->format('d F Y');
        //                     $i++;
        //                 }
        //             }
        //         }
        //     }
        // }

        echo json_encode($response);
        exit;
    }

    public function all_result(){
        $ethics = ResearchEthic::all();

        $response = []; $i = 0;
        foreach($ethics as $ethic){
            if($ethic->result_reviews){
                foreach($ethic->result_reviews as $result){
                    if($result->revision > 0) continue;
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

    public function form_telaahcepat($hash, $view = null){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        if(!$view){
            $ethic = ResearchEthic::find($id[0]);
            if(empty($ethic)) return abort(404);

            $self_assesment = $ethic->self_assesment;
            if(empty($self_assesment)) return abort(404);

            $resume_review = $ethic->resume_review;

            $data = [
                'user_id' => auth()->user()->id,
                'research_ethic_id' => $id
            ];

            $quick_review = QuickReview::where($data)->first();

            if($quick_review){
                $quick_review->nilai_sosial = json_decode($quick_review->nilai_sosial);
                $quick_review->nilai_ilmiah = json_decode($quick_review->nilai_ilmiah);
                $quick_review->pemerataan = json_decode($quick_review->pemerataan);
                $quick_review->potensi = json_decode($quick_review->potensi);
                $quick_review->bujukan = json_decode($quick_review->bujukan);
                $quick_review->privacy = json_decode($quick_review->privacy);
            }
        } else {
            $quick_review = QuickReview::find($id[0]);
            if(empty($quick_review)) return abort(404);

            $self_assesment = $quick_review->research_ethic->self_assesment;
            if(empty($self_assesment)) return abort(404);

            $resume_review = $quick_review->research_ethic->resume_review;

            $ethic = $quick_review->research_ethic;
        }

        $self_assesment->nilai_sosial = json_decode($self_assesment->nilai_sosial);
        $self_assesment->nilai_ilmiah = json_decode($self_assesment->nilai_ilmiah);
        $self_assesment->pemerataan = json_decode($self_assesment->pemerataan);
        $self_assesment->potensi = json_decode($self_assesment->potensi);
        $self_assesment->bujukan = json_decode($self_assesment->bujukan);
        $self_assesment->privacy = json_decode($self_assesment->privacy);

        $protocol = $ethic->protocol;

        $protocol->ringkasan_protokol = json_decode($protocol->ringkasan_protokol);
        $protocol->kondisi_lapangan = json_decode($protocol->kondisi_lapangan);
        $protocol->disain_penelitian = json_decode($protocol->disain_penelitian);
        $protocol->sampling = json_decode($protocol->sampling);
        $protocol->intervensi = json_decode($protocol->intervensi);
        $protocol->adverse_penelitian = json_decode($protocol->adverse_penelitian);
        $protocol->manfaat = json_decode($protocol->manfaat);
        $protocol->informed_consent = json_decode($protocol->informed_consent);
        $protocol->wali = json_decode($protocol->wali);
        $protocol->bujukan = json_decode($protocol->bujukan);
        $protocol->penjagaan_kerahasiaan = json_decode($protocol->penjagaan_kerahasiaan);
        $protocol->manfaat_sosial = json_decode($protocol->manfaat_sosial);
        $protocol->publikasi = json_decode($protocol->publikasi);
        $protocol->komitmen_etik = json_decode($protocol->komitmen_etik);

        $protocol->research_ethic->surat_pengantar = Storage::url('layaketik/surat_pengantar/'.$protocol->research_ethic->surat_pengantar);

        $protocol->research_ethic->eviden_paid = is_null($protocol->research_ethic->eviden_paid)? 
            $protocol->research_ethic->eviden_paid : Storage::url('layaketik/evidenpaid/'.$protocol->research_ethic->eviden_paid);

        $protocol->cv_ketua = is_null($protocol->cv_ketua)? 
            $protocol->cv_ketua : Storage::url('protokol/cv_ketua/'.$protocol->cv_ketua);

        $protocol->cv_anggota = is_null($protocol->cv_anggota)? 
            $protocol->cv_anggota : Storage::url('protokol/cv_anggota/'.$protocol->cv_anggota);

        $protocol->lembaga_sponsor = is_null($protocol->lembaga_sponsor)? 
            $protocol->lembaga_sponsor : Storage::url('protokol/lembaga_sponsor/'.$protocol->lembaga_sponsor);

        $protocol->surat_pernyataan = is_null($protocol->surat_pernyataan)? 
            $protocol->surat_pernyataan : Storage::url('protokol/surat_pernyataan/'.$protocol->surat_pernyataan);

        $protocol->kuesioner = is_null($protocol->kuesioner)? 
            $protocol->kuesioner : Storage::url('protokol/kuesioner/'.$protocol->kuesioner);

        $protocol->file_informedconsent = is_null($protocol->file_informedconsent)? 
            $protocol->file_informedconsent : Storage::url('protokol/file_informedconsent/'.$protocol->file_informedconsent);

        $protocol->halaman_pengesahan = is_null($protocol->halaman_pengesahan)? 
            $protocol->halaman_pengesahan : Storage::url('protokol/halaman_pengesahan/'.$protocol->halaman_pengesahan);

        $is_telaah = 1;
        return view('dashboard.layaketik.telaah.form_telaahcepat', compact('protocol', 'self_assesment', 'resume_review', 'quick_review','is_telaah','view'));
    }

    public function store_telaahcepat(Request $request){
        $data = [
            'research_ethic_id' => $request->id,
            'user_id' => auth()->user()->id
        ];

        $reviewed = QuickReview::where($data)->first();

        $req = $request->all();
        $req['user_id'] = auth()->user()->id;
        $req['research_ethic_id'] = $request->id;

        $req['nilai_sosial'] = isset($request->nilai_sosial)? json_encode($request->nilai_sosial): null;
        $req['nilai_ilmiah'] = isset($request->nilai_ilmiah)? json_encode($request->nilai_ilmiah): null;
        $req['pemerataan'] = isset($request->pemerataan)? json_encode($request->pemerataan): null;
        $req['potensi'] = isset($request->potensi)? json_encode($request->potensi): null;
        $req['bujukan'] = isset($request->bujukan)? json_encode($request->bujukan): null;
        $req['privacy'] = isset($request->privacy)? json_encode($request->privacy): null;

        if(is_null($reviewed)){
            $store = QuickReview::create($req);
        } else {
            unset($req['user_id'], $req['research_ethic_id']);
            $store = QuickReview::where($data)->update($req);
        }

        if(!$store){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal menyimpan data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menyimpan telaah cepat anda"
        ], 200);
    }

    public function result(Request $request){
        $req = $request->all();

        $req['research_ethic_id'] = $request->id;
        $req['revision'] = 0;

        $check = ResultReview::where('research_ethic_id', $request->id)->get();
        if(count($check) > 0) return response()->json([
            'success' => false,
            'msg'     => 'Keputusan telaah cepat sudah dibuat'
        ], 200);

        $check = QuickReview::where('research_ethic_id', $request->id)->get();
        if(count($check) < 1) return response()->json([
            'success' => false,
            'msg'     => 'Minimal 1 telaah cepat untuk menentukan hasil'
        ], 200);

        $ethic = ResearchEthic::find($request->id);
        $result = ResultReview::create($req);

        if(!$result) return response()->json([
            'success' => false,
            'msg'     => 'Gagal membuat keputusan telaah cepat'
        ], 200);

        if($request->hasFile('sertifikat_layaketik')){
            $data['sertifikat_layaketik'] = $this->uploadImage([
                'path'      => 'public/layaketik/surat_hasil',
                'file'      => $request->file('sertifikat_layaketik'),
                'user'      => $ethic->user,
                'id'        => $result->id,
                'prefix'    => 'layaketiksurathasil_rev'.$req['revision'].$request->id."_"
            ]);

            $update = $result->update($data);

            if(!$update) return response()->json([
                'success' => false,
                'msg'     => 'Gagal membuat surat keputusan telaah cepat'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Membuat Keputusan Telaah Cepat'
        ], 200);
    }

    public function result_surat(Request $request){
        $id = $this->hashids->decode($request->id);

        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => 'Terjadi Kesalahan'
        ], 200);

        $id = $id[0];

        $result = ResultReview::find($id);

        if(!$result) return response()->json([
            'success' => false,
            'msg'     => 'Data tidak ada'
        ], 200);

        $data['sertifikat_layaketik'] = $this->uploadImage([
            'path'      => 'public/layaketik/surat_hasil',
            'file'      => $request->file('sertifikat_layaketik'),
            'user'      => $result->research_ethic->user,
            'id'        => $result->id,
            'prefix'    => 'layaketiksurathasil_rev'.$result->revision.$id."_"
        ]);

        $update = $result->update($data);

        if(!$update) return response()->json([
            'success' => false,
            'msg'     => 'Gagal update data'
        ], 200);

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil menyimpan surat hasil telaah'
        ], 200);
    }
}
