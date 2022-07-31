<?php

namespace App\Http\Controllers;

use App\DeepReview;
use App\QuickReview;
use App\ResearchEthic;
use App\ResultReview;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeepReviewController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function expedited(){
        return view('dashboard.layaketik.telaah.telaah_expedited');
    }

    public function fullboard(){
        return view('dashboard.layaketik.telaah.telaah_fullboard');
    }

    public function ready($status, $admin = null){
        $ethics = ResearchEthic::all();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->result_reviews){
                foreach($ethic->result_reviews as $result){
                    if($result->status == $status){
                        $deep_reviews = $result->research_ethic->deep_reviews;
    
                        if($deep_reviews){
                            $is_have = false;
                            foreach($deep_reviews as $review){
                                // if user have reviewed protocol get id ethics
                                if($review->user_id == auth()->user()->id && $result->revision == $review->revision){
                                    $is_have = true;
                                    break;
                                }
                            }

                            // if same id skip it
                            if($is_have) continue;
                        }

                        $response[$i]['i'] = $i + 1;
                        $response[$i]['id'] = $this->hashids->encode($result->id);
                        $response[$i]['id_'] = $result->id;
                        $response[$i]['judul'] = $ethic->research->judul;
                        $response[$i]['revision'] = $result->revision;
                        $response[$i]['mulai'] = Carbon::createFromFormat('Y-m-d', $ethic->research->start_date)->format('d F Y');
                        $response[$i]['pengajuan'] = Carbon::parse($ethic->created_at)->format('d F Y');
                        $i++;
                    }
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function reviewed($status, $admin = null){
        // dd($admin);
        if($admin){
            $deep_reviews = DeepReview::where('research_ethic_id', $admin)->latest()->get();
        } else {
            $deep_reviews = DeepReview::latest()->get();
        }

        $response = []; $i = 0;

        foreach($deep_reviews as $review){
            //get status result
            foreach($review->research_ethic->result_reviews as $result){
                if($review->revision == $result->revision){
                    $parent_status = $result->status;
                    $parent_id = $result->id;
                }
            }

            if($review->user_id == auth()->user()->id && $parent_status == $status && is_null($admin)){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($parent_id);
                $response[$i]['judul'] = $review->research_ethic->research->judul;
                $response[$i]['usulan'] = $review->status;
                $response[$i]['revision'] = $review->revision;
                $response[$i]['pengajuan'] = Carbon::parse($review->research_ethic->created_at)->format('d F Y');
                $i++;
            }

            if($admin){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($review->id);
                $response[$i]['judul'] = $review->research_ethic->research->judul;
                $response[$i]['usulan'] = $review->status;
                $response[$i]['revision'] = $review->revision;
                $response[$i]['user'] = $review->user->name;
                $response[$i]['tgl_telaah'] = Carbon::parse($review->created_at)->format('d F Y');
                $response[$i]['pengajuan'] = Carbon::parse($review->research_ethic->created_at)->format('d F Y');
                $i++;
            }
        }

        echo json_encode($response);
        exit;
    }

    public function form($hash, $view = null){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        if(!$view){
            // from result review
            $result = ResultReview::find($id[0]);
            if(empty($result)) return abort(404);

            $data = [
                'user_id' => auth()->user()->id,
                'research_ethic_id' => $result->research_ethic->id,
                'revision' => $result->revision
            ];
    
            $quick_review = DeepReview::where($data)->first();
        } else {
            // from deep review
            $result = DeepReview::find($id[0]);
            if(empty($result)) return abort(404);

            $quick_review = $result;
        }

        $self_assesment = $result->research_ethic->self_assesment;
        if(empty($self_assesment)) return abort(404);

        if($result->revision == '0'){
            $resume_review = $result->research_ethic->resume_review;
            $protocol = $result->research_ethic->protocol;
        } else {
            $data_resume = $result->research_ethic->resume_deep_reviews;
            $data_protocol = $result->research_ethic->revision_protocols;

            foreach($data_resume as $resume){
                if($result->revision == $resume->revision){
                    $resume_review = $resume;
                    break;
                }
            }

            foreach($data_protocol as $_protocol){
                if($result->revision == $_protocol->revision){
                    $protocol = $_protocol;
                    break;
                }
            }
        }

        // dd($quick_review, $data);
        
        if($quick_review){
            $quick_review->nilai_sosial = json_decode($quick_review->nilai_sosial);
            $quick_review->nilai_ilmiah = json_decode($quick_review->nilai_ilmiah);
            $quick_review->pemerataan = json_decode($quick_review->pemerataan);
            $quick_review->potensi = json_decode($quick_review->potensi);
            $quick_review->bujukan = json_decode($quick_review->bujukan);
            $quick_review->privacy = json_decode($quick_review->privacy);
        }

        $self_assesment->nilai_sosial = json_decode($self_assesment->nilai_sosial);
        $self_assesment->nilai_ilmiah = json_decode($self_assesment->nilai_ilmiah);
        $self_assesment->pemerataan = json_decode($self_assesment->pemerataan);
        $self_assesment->potensi = json_decode($self_assesment->potensi);
        $self_assesment->bujukan = json_decode($self_assesment->bujukan);
        $self_assesment->privacy = json_decode($self_assesment->privacy);

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

        if($result->revision == '0'){
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
        } else {
            $protocol->cv_ketua = is_null($protocol->research_ethic->cv_ketua)? 
                $protocol->research_ethic->cv_ketua : Storage::url('protokol/cv_ketua/'.$protocol->research_ethic->cv_ketua);

            $protocol->cv_anggota = is_null($protocol->research_ethic->cv_anggota)? 
                $protocol->research_ethic->cv_anggota : Storage::url('protokol/cv_anggota/'.$protocol->research_ethic->cv_anggota);

            $protocol->lembaga_sponsor = is_null($protocol->research_ethic->lembaga_sponsor)? 
                $protocol->research_ethic->lembaga_sponsor : Storage::url('protokol/lembaga_sponsor/'.$protocol->research_ethic->lembaga_sponsor);

            $protocol->surat_pernyataan = is_null($protocol->research_ethic->surat_pernyataan)? 
                $protocol->research_ethic->surat_pernyataan : Storage::url('protokol/surat_pernyataan/'.$protocol->research_ethic->surat_pernyataan);

            $protocol->kuesioner = is_null($protocol->research_ethic->kuesioner)? 
                $protocol->research_ethic->kuesioner : Storage::url('protokol/kuesioner/'.$protocol->research_ethic->kuesioner);

            $protocol->file_informedconsent = is_null($protocol->research_ethic->file_informedconsent)? 
                $protocol->research_ethic->file_informedconsent : Storage::url('protokol/file_informedconsent/'.$protocol->research_ethic->file_informedconsent);

            $protocol->halaman_pengesahan = is_null($protocol->research_ethic->halaman_pengesahan)? 
                $protocol->research_ethic->halaman_pengesahan : Storage::url('protokol/halaman_pengesahan/'.$protocol->research_ethic->halaman_pengesahan);
        }

        $is_telaah = 1;
        $is_telaahlanjut = $result;
        return view('dashboard.layaketik.telaah.form_telaahcepat', compact('protocol', 'self_assesment', 'resume_review', 'quick_review','is_telaah','view', 'is_telaahlanjut'));
    }

    public function store(Request $request){
        $data = [
            'research_ethic_id' => $request->id,
            'user_id' => auth()->user()->id,
            'revision' => $request->revision
        ];

        $reviewed = DeepReview::where($data)->first();

        $req = $request->all();
        $req['user_id'] = auth()->user()->id;
        $req['research_ethic_id'] = $request->id;
        $req['revision'] = $request->revision;

        $req['nilai_sosial'] = isset($request->nilai_sosial)? json_encode($request->nilai_sosial): null;
        $req['nilai_ilmiah'] = isset($request->nilai_ilmiah)? json_encode($request->nilai_ilmiah): null;
        $req['pemerataan'] = isset($request->pemerataan)? json_encode($request->pemerataan): null;
        $req['potensi'] = isset($request->potensi)? json_encode($request->potensi): null;
        $req['bujukan'] = isset($request->bujukan)? json_encode($request->bujukan): null;
        $req['privacy'] = isset($request->privacy)? json_encode($request->privacy): null;

        if(is_null($reviewed)){
            $store = DeepReview::create($req);
        } else {
            unset($req['user_id'], $req['research_ethic_id']);
            $store = DeepReview::where($data)->update($req);
        }

        if(!$store){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal menyimpan data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menyimpan telaah lanjut anda"
        ], 200);
    }
}
