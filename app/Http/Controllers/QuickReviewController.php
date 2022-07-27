<?php

namespace App\Http\Controllers;

use App\QuickReview;
use App\ResearchEthic;
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

    public function ready(){
        $ethics = ResearchEthic::all();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->protocol){
                if(!empty($ethic->resume_review)){
                    $quick_reviews = $ethic->quick_review? $ethic->quick_review : null;

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
                        if($is_have == $ethic->id) continue;
                    }
                    
                    $response[$i]['i'] = $i + 1;
                    $response[$i]['id'] = $this->hashids->encode($ethic->id);
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

    public function reviewed(){
        $ethics = ResearchEthic::all();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->protocol){
                if(!empty($ethic->resume_review)){
                    $quick_reviews = $ethic->quick_review? $ethic->quick_review : null;

                    if($quick_reviews){
                        $is_have = null; $usulan = null;
                        foreach($quick_reviews as $review){
                            // if user have reviewed protocol get id ethics
                            if($review->user_id == auth()->user()->id){
                                $is_have = $review->id;
                                $usulan = $review->status;
                                break;
                            }
                        }

                        // if same id skip it
                        if($is_have == $ethic->id){
                            $response[$i]['i'] = $i + 1;
                            $response[$i]['id'] = $this->hashids->encode($ethic->id);
                            $response[$i]['judul'] = $ethic->research->judul;
                            $response[$i]['usulan'] = $usulan;
                            $response[$i]['pengajuan'] = Carbon::parse($ethic->created_at)->format('d F Y');
                            $i++;
                        }
                    }
                }
            }
        }

        echo json_encode($response);
        exit;
    }

    public function form_telaahcepat($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

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
        return view('dashboard.layaketik.telaah.form_telaahcepat', compact('protocol', 'self_assesment', 'resume_review', 'quick_review','is_telaah'));
    }

    public function store_telaahcepat(Request $request){
        $ethic = QuickReview::where('research_ethic_id', $request->id)->first();
        $req = $request->all();
        $req['user_id'] = auth()->user()->id;
        $req['research_ethic_id'] = $request->id;

        $req['nilai_sosial'] = isset($request->nilai_sosial)? json_encode($request->nilai_sosial): null;
        $req['nilai_ilmiah'] = isset($request->nilai_ilmiah)? json_encode($request->nilai_ilmiah): null;
        $req['pemerataan'] = isset($request->pemerataan)? json_encode($request->pemerataan): null;
        $req['potensi'] = isset($request->potensi)? json_encode($request->potensi): null;
        $req['bujukan'] = isset($request->bujukan)? json_encode($request->bujukan): null;
        $req['privacy'] = isset($request->privacy)? json_encode($request->privacy): null;

        if(is_null($ethic)){
            $resume = QuickReview::create($req);
        } else {
            unset($req['user_id'], $req['research_ethic_id']);
            $resume = QuickReview::where('research_ethic_id', $request->id)->update($req);
        }

        if(!$resume){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal menyimpan data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menyimpan resume"
        ], 200);
    }
}
