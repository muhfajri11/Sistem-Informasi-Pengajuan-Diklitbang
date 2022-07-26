<?php

namespace App\Http\Controllers;

use App\{Protocol, ResearchEthic, ResumeReview, SelfAssesment};
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LynX39\LaraPdfMerger\Facades\PdfMerger;

class ProtocolController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.layaketik.protocol');
    }

    public function form(){
        $data = [
            'user_id' => auth()->user()->id,
            'status'  => 'accept'
        ];

        $research = ResearchEthic::with('protocol')->where($data)->latest()->get();
        $ethics = [];

        foreach($research as $ethic){
            if(empty($ethic->protocol)){
                $ethics[] = $ethic;
            }
        }

        return view('dashboard.layaketik.form_protocol', compact('ethics'));
    }

    public function resume_protocol(){
        return view('dashboard.layaketik.admin.resume_protocol');
    }

    public function form_resumeprotocol($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        $protocol = Protocol::find($id[0]);
        if(empty($protocol)) return abort(404);

        $self_assesment = $protocol->research_ethic->self_assesment;
        if(empty($self_assesment)) return abort(404);

        $resume_review = $protocol->research_ethic->resume_review;

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

        return view('dashboard.layaketik.admin.form_resumeprotocol', compact('protocol', 'self_assesment', 'resume_review'));
    }

    public function store_resumeprotocol(Request $request){
        $ethic = ResumeReview::where('research_ethic_id', $request->id)->first();
        $req = $request->all();
        $req['user_id'] = auth()->user()->id;
        $req['research_ethic_id'] = $request->id;

        if(is_null($ethic)){
            $resume = ResumeReview::create($req);
        } else {
            unset($req['user_id'], $req['research_ethic_id']);
            $resume = ResumeReview::where('research_ethic_id', $request->id)->update($req);
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

    public function all($admin = null){
        if($admin){
            $ethics = ResearchEthic::with('protocol')->latest()->get();
        } else {
            $ethics = ResearchEthic::with('protocol')->where('user_id', auth()->user()->id)->get();
        }

        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->protocol){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($ethic->protocol->id);
                $response[$i]['edit'] = $ethic->protocol->is_ready;
                $response[$i]['judul'] = $ethic->research->judul;
                $response[$i]['start_date'] = Carbon::createFromFormat('Y-m-d', $ethic->research->start_date)->format('d F Y');
                $response[$i]['created_at'] = Carbon::parse($ethic->protocol->created_at)->format('d F Y');
                $i++;
            }
        }

        echo json_encode($response);
        exit;
    }

    public function all_review(){
        $ethics = ResearchEthic::with('protocol')->get();
        $response = []; $i = 0;

        foreach($ethics as $ethic){
            if($ethic->protocol){
                $response[$i]['i'] = $i + 1;
                $response[$i]['id'] = $this->hashids->encode($ethic->protocol->id);
                $response[$i]['judul'] = $ethic->research->judul;
                $response[$i]['mulai'] = Carbon::createFromFormat('Y-m-d', $ethic->research->start_date)->format('d F Y');
                $response[$i]['is_ready'] = $ethic->resume_review? 1 : 0;
                $response[$i]['pengajuan'] = Carbon::parse($ethic->created_at)->format('d F Y');
                $i++;
            }
        }

        echo json_encode($response);
        exit;
    }

    public function view($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        $protocol = Protocol::find($id[0]);
        if(empty($protocol)) return abort(404);

        if($protocol->research_ethic->user_id != auth()->user()->id) return abort(404);

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

        return view('dashboard.layaketik.form_protocol', compact('protocol'));
    }

    public function edit($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        $protocol = Protocol::find($id[0]);
        if(empty($protocol)) return abort(404);

        if($protocol->research_ethic->user_id != auth()->user()->id) return abort(404);

        if($protocol->is_ready) return abort(404);

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

        $is_edit = 1;

        return view('dashboard.layaketik.form_protocol', compact('protocol', 'is_edit'));
    }

    public function store(Request $request){
        $req = $request->all();

        $req['ringkasan_protokol'] = [
            'ringkasan_protocol_a' => $request->ringkasan_protocol_a,
            'ringkasan_protocol_b' => $request->ringkasan_protocol_b,
        ];

        $req['kondisi_lapangan'] = [
            'kondisi_lapangan_a' => $request->kondisi_lapangan_a,
            'kondisi_lapangan_b' => $request->kondisi_lapangan_b,
            'kondisi_lapangan_c' => $request->kondisi_lapangan_c,
        ];

        $req['disain_penelitian'] = [
            'disain_penelitian_a' => $request->disain_penelitian_a,
            'disain_penelitian_b' => $request->disain_penelitian_b,
            'disain_penelitian_c' => $request->disain_penelitian_c,
        ];

        $req['sampling'] = [
            'sampling_a' => $request->sampling_a,
            'sampling_b' => $request->sampling_b,
            'sampling_c' => $request->sampling_c,
        ];

        $req['intervensi'] = [
            'intervensi_a' => $request->intervensi_a,
            'intervensi_b' => $request->intervensi_b,
            'intervensi_c' => $request->intervensi_c,
            'intervensi_d' => $request->intervensi_d,
        ];

        $req['adverse_penelitian'] = [
            'adverse_penelitian_a' => $request->adverse_penelitian_a,
            'adverse_penelitian_b' => $request->adverse_penelitian_b,
        ];

        $req['manfaat'] = [
            'manfaat_a' => $request->manfaat_a,
            'manfaat_b' => $request->manfaat_b,
        ];

        $req['informed_consent'] = [
            'informed_consent_a' => $request->informed_consent_a,
            'informed_consent_b' => $request->informed_consent_b,
        ];

        $req['wali'] = [
            'wali_a' => $request->wali_a,
            'wali_b' => $request->wali_b,
        ];

        $req['bujukan'] = [
            'bujukan_a' => $request->bujukan_a,
            'bujukan_b' => $request->bujukan_b,
            'bujukan_c' => $request->bujukan_c,
        ];

        $req['penjagaan_kerahasiaan'] = [
            'penjagaan_kerahasiaan_a' => $request->penjagaan_kerahasiaan_a,
            'penjagaan_kerahasiaan_b' => $request->penjagaan_kerahasiaan_b,
            'penjagaan_kerahasiaan_c' => $request->penjagaan_kerahasiaan_c,
            'penjagaan_kerahasiaan_d' => $request->penjagaan_kerahasiaan_d,
        ];

        $req['manfaat_sosial'] = [
            'manfaat_sosial_a' => $request->manfaat_sosial_a,
            'manfaat_sosial_b' => $request->manfaat_sosial_b,
        ];

        $req['publikasi'] = [
            'publikasi_a' => $request->publikasi_a,
            'publikasi_b' => $request->publikasi_b,
        ];

        $req['komitmen_etik'] = [
            'komitmen_etik_a' => $request->komitmen_etik_a,
            'komitmen_etik_b' => $request->komitmen_etik_b,
            'komitmen_etik_c' => $request->komitmen_etik_c,
        ];

        $req['research_ethic_id'] = $request->judul;
        $req['ringkasan_protokol'] = json_encode($req['ringkasan_protokol']);
        $req['kondisi_lapangan'] = json_encode($req['kondisi_lapangan']);
        $req['disain_penelitian'] = json_encode($req['disain_penelitian']);
        $req['sampling'] = json_encode($req['sampling']);
        $req['intervensi'] = json_encode($req['intervensi']);
        $req['adverse_penelitian'] = json_encode($req['adverse_penelitian']);
        $req['manfaat'] = json_encode($req['manfaat']);
        $req['informed_consent'] = json_encode($req['informed_consent']);
        $req['wali'] = json_encode($req['wali']);
        $req['bujukan'] = json_encode($req['bujukan']);
        $req['penjagaan_kerahasiaan'] = json_encode($req['penjagaan_kerahasiaan']);
        $req['manfaat_sosial'] = json_encode($req['manfaat_sosial']);
        $req['publikasi'] = json_encode($req['publikasi']);
        $req['komitmen_etik'] = json_encode($req['komitmen_etik']);
        
        unset(
            $req['ringkasan_protocol_a'], $req['ringkasan_protocol_b'],
            $req['kondisi_lapangan_a'], $req['kondisi_lapangan_b'], $req['kondisi_lapangan_c'],
            $req['disain_penelitian_a'], $req['disain_penelitian_b'], $req['disain_penelitian_c'],
            $req['sampling_a'], $req['sampling_b'], $req['sampling_c'], $req['intervensi_a'],
            $req['intervensi_b'], $req['intervensi_c'], $req['intervensi_d'],
            $req['adverse_penelitian_a'], $req['adverse_penelitian_b'],
            $req['manfaat_a'], $req['manfaat_b'], $req['informed_consent_a'],
            $req['informed_consent_b'], $req['wali_a'], $req['wali_b'], $req['bujukan_a'],
            $req['bujukan_b'], $req['bujukan_c'], $req['penjagaan_kerahasiaan_a'],
            $req['penjagaan_kerahasiaan_b'], $req['penjagaan_kerahasiaan_c'],
            $req['penjagaan_kerahasiaan_d'], $req['manfaat_sosial_a'],
            $req['manfaat_sosial_b'], $req['hakatas_data'], $req['publikasi_a'],
            $req['publikasi_b'], $req['komitmen_etik_a'], $req['komitmen_etik_b'],
            $req['komitmen_etik_c'], $req['cv_ketua'], $req['cv_anggota'], $req['lembaga_sponsor'],
            $req['surat_pernyataan'], $req['kuesioner'], $req['file_informedconsent'],
            $req['halaman_pengesahan'],
        );

        $protocol = Protocol::create($req);

        if(!$protocol){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal menyimpan data"
            ], 200);
        }

        if($request->hasFile('cv_ketua')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/cv_ketua',
                'file'      => $request->file('cv_ketua'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolcvketua_'
            ]);

            $data_image['cv_ketua'] = $image;
        }

        if($request->hasFile('cv_anggota')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/cv_anggota',
                'file'      => $request->file('cv_anggota'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolcvanggota_'
            ]);

            $data_image['cv_anggota'] = $image;
        }

        if($request->hasFile('lembaga_sponsor')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/lembaga_sponsor',
                'file'      => $request->file('lembaga_sponsor'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokollembagasponsor_'
            ]);

            $data_image['lembaga_sponsor'] = $image;
        }

        if($request->hasFile('surat_pernyataan')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/surat_pernyataan',
                'file'      => $request->file('surat_pernyataan'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolsuratpernyataan_'
            ]);

            $data_image['surat_pernyataan'] = $image;
        }

        if($request->hasFile('kuesioner')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/kuesioner',
                'file'      => $request->file('kuesioner'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolkuesioner_'
            ]);

            $data_image['kuesioner'] = $image;
        }

        if($request->hasFile('file_informedconsent')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/file_informedconsent',
                'file'      => $request->file('file_informedconsent'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolfileinformedconsent_'
            ]);

            $data_image['file_informedconsent'] = $image;
        }

        if($request->hasFile('halaman_pengesahan')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/halaman_pengesahan',
                'file'      => $request->file('halaman_pengesahan'),
                'user'      => auth()->user(),
                'id'        => $protocol->id,
                'prefix'    => 'protokolhalamanpengesahan_'
            ]);

            $data_image['halaman_pengesahan'] = $image;
        }

        if(isset($data_image)){
            $update = $protocol->update($data_image);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => "Gagal menyimpan data gambar"
                ], 200);
            }
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menyimpan data"
        ], 200);
    }

    public function update(Request $request){
        $req = $request->all();

        $req['ringkasan_protokol'] = [
            'ringkasan_protocol_a' => $request->ringkasan_protocol_a,
            'ringkasan_protocol_b' => $request->ringkasan_protocol_b,
        ];

        $req['kondisi_lapangan'] = [
            'kondisi_lapangan_a' => $request->kondisi_lapangan_a,
            'kondisi_lapangan_b' => $request->kondisi_lapangan_b,
            'kondisi_lapangan_c' => $request->kondisi_lapangan_c,
        ];

        $req['disain_penelitian'] = [
            'disain_penelitian_a' => $request->disain_penelitian_a,
            'disain_penelitian_b' => $request->disain_penelitian_b,
            'disain_penelitian_c' => $request->disain_penelitian_c,
        ];

        $req['sampling'] = [
            'sampling_a' => $request->sampling_a,
            'sampling_b' => $request->sampling_b,
            'sampling_c' => $request->sampling_c,
        ];

        $req['intervensi'] = [
            'intervensi_a' => $request->intervensi_a,
            'intervensi_b' => $request->intervensi_b,
            'intervensi_c' => $request->intervensi_c,
            'intervensi_d' => $request->intervensi_d,
        ];

        $req['adverse_penelitian'] = [
            'adverse_penelitian_a' => $request->adverse_penelitian_a,
            'adverse_penelitian_b' => $request->adverse_penelitian_b,
        ];

        $req['manfaat'] = [
            'manfaat_a' => $request->manfaat_a,
            'manfaat_b' => $request->manfaat_b,
        ];

        $req['informed_consent'] = [
            'informed_consent_a' => $request->informed_consent_a,
            'informed_consent_b' => $request->informed_consent_b,
        ];

        $req['wali'] = [
            'wali_a' => $request->wali_a,
            'wali_b' => $request->wali_b,
        ];

        $req['bujukan'] = [
            'bujukan_a' => $request->bujukan_a,
            'bujukan_b' => $request->bujukan_b,
            'bujukan_c' => $request->bujukan_c,
        ];

        $req['penjagaan_kerahasiaan'] = [
            'penjagaan_kerahasiaan_a' => $request->penjagaan_kerahasiaan_a,
            'penjagaan_kerahasiaan_b' => $request->penjagaan_kerahasiaan_b,
            'penjagaan_kerahasiaan_c' => $request->penjagaan_kerahasiaan_c,
            'penjagaan_kerahasiaan_d' => $request->penjagaan_kerahasiaan_d,
        ];

        $req['manfaat_sosial'] = [
            'manfaat_sosial_a' => $request->manfaat_sosial_a,
            'manfaat_sosial_b' => $request->manfaat_sosial_b,
        ];

        $req['publikasi'] = [
            'publikasi_a' => $request->publikasi_a,
            'publikasi_b' => $request->publikasi_b,
        ];

        $req['komitmen_etik'] = [
            'komitmen_etik_a' => $request->komitmen_etik_a,
            'komitmen_etik_b' => $request->komitmen_etik_b,
            'komitmen_etik_c' => $request->komitmen_etik_c,
        ];

        $req['ringkasan_protokol'] = json_encode($req['ringkasan_protokol']);
        $req['kondisi_lapangan'] = json_encode($req['kondisi_lapangan']);
        $req['disain_penelitian'] = json_encode($req['disain_penelitian']);
        $req['sampling'] = json_encode($req['sampling']);
        $req['intervensi'] = json_encode($req['intervensi']);
        $req['adverse_penelitian'] = json_encode($req['adverse_penelitian']);
        $req['manfaat'] = json_encode($req['manfaat']);
        $req['informed_consent'] = json_encode($req['informed_consent']);
        $req['wali'] = json_encode($req['wali']);
        $req['bujukan'] = json_encode($req['bujukan']);
        $req['penjagaan_kerahasiaan'] = json_encode($req['penjagaan_kerahasiaan']);
        $req['manfaat_sosial'] = json_encode($req['manfaat_sosial']);
        $req['publikasi'] = json_encode($req['publikasi']);
        $req['komitmen_etik'] = json_encode($req['komitmen_etik']);
        
        unset(
            $req['ringkasan_protocol_a'], $req['ringkasan_protocol_b'],
            $req['kondisi_lapangan_a'], $req['kondisi_lapangan_b'], $req['kondisi_lapangan_c'],
            $req['disain_penelitian_a'], $req['disain_penelitian_b'], $req['disain_penelitian_c'],
            $req['sampling_a'], $req['sampling_b'], $req['sampling_c'], $req['intervensi_a'],
            $req['intervensi_b'], $req['intervensi_c'], $req['intervensi_d'],
            $req['adverse_penelitian_a'], $req['adverse_penelitian_b'],
            $req['manfaat_a'], $req['manfaat_b'], $req['informed_consent_a'],
            $req['informed_consent_b'], $req['wali_a'], $req['wali_b'], $req['bujukan_a'],
            $req['bujukan_b'], $req['bujukan_c'], $req['penjagaan_kerahasiaan_a'],
            $req['penjagaan_kerahasiaan_b'], $req['penjagaan_kerahasiaan_c'],
            $req['penjagaan_kerahasiaan_d'], $req['manfaat_sosial_a'],
            $req['manfaat_sosial_b'], $req['hakatas_data'], $req['publikasi_a'],
            $req['publikasi_b'], $req['komitmen_etik_a'], $req['komitmen_etik_b'],
            $req['komitmen_etik_c']
        );

        if($request->hasFile('cv_ketua')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/cv_ketua',
                'file'      => $request->file('cv_ketua'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolcvketua_'
            ]);

            $req['cv_ketua'] = $image;
        }

        if($request->hasFile('cv_anggota')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/cv_anggota',
                'file'      => $request->file('cv_anggota'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolcvanggota_'
            ]);

            $req['cv_anggota'] = $image;
        }

        if($request->hasFile('lembaga_sponsor')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/lembaga_sponsor',
                'file'      => $request->file('lembaga_sponsor'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokollembagasponsor_'
            ]);

            $req['lembaga_sponsor'] = $image;
        }

        if($request->hasFile('surat_pernyataan')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/surat_pernyataan',
                'file'      => $request->file('surat_pernyataan'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolsuratpernyataan_'
            ]);

            $req['surat_pernyataan'] = $image;
        }

        if($request->hasFile('kuesioner')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/kuesioner',
                'file'      => $request->file('kuesioner'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolkuesioner_'
            ]);

            $req['kuesioner'] = $image;
        }

        if($request->hasFile('file_informedconsent')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/file_informedconsent',
                'file'      => $request->file('file_informedconsent'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolfileinformedconsent_'
            ]);

            $req['file_informedconsent'] = $image;
        }

        if($request->hasFile('halaman_pengesahan')){
            $image = $this->uploadImage([
                'path'      => 'public/protokol/halaman_pengesahan',
                'file'      => $request->file('halaman_pengesahan'),
                'user'      => auth()->user(),
                'id'        => $request->judul,
                'prefix'    => 'protokolhalamanpengesahan_'
            ]);

            $req['halaman_pengesahan'] = $image;
        }

        $protocol = Protocol::find($request->judul)->update($req);

        if(!$protocol){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal mengupdate data"
            ], 200);
        }

        // if(isset($data_image)){
        //     $update = $protocol->update($data_image);

        //     if(!$update){
        //         return response()->json([
        //             'success' => false,
        //             'msg'     => "Gagal menyimpan data gambar"
        //         ], 200);
        //     }
        // }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil mengupdate data"
        ], 200);
    }

    public function print($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);

        $protocol = Protocol::find($id[0]);

        if(empty($protocol)) return abort(404);

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

        $pdf = Pdf::loadview('dashboard/print_protocol', compact('protocol'));
        $pdfmerger = PdfMerger::init();

	    $content =  $pdf->setPaper('a4', 'portrait')->download()->getOriginalContent();
        Storage::put('/public/temp/temp_pdf.pdf',$content);

        $content = public_path('storage\temp\temp_pdf.pdf');
        $pdfmerger->addPDF($content, 'all');

        if(!empty($protocol->halaman_pengesahan)){
            $file_ = public_path('storage\protokol\halaman_pengesahan\/').$protocol->halaman_pengesahan;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->cv_ketua)){
            $file_ = public_path('storage\protokol\cv_ketua\/').$protocol->cv_ketua;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->cv_anggota)){
            $file_ = public_path('storage\protokol\cv_anggota\/').$protocol->cv_anggota;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->lembaga_sponsor)){
            $file_ = public_path('storage\protokol\lembaga_sponsor\/').$protocol->lembaga_sponsor;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->surat_pernyataan)){
            $file_ = public_path('storage\protokol\surat_pernyataan\/').$protocol->surat_pernyataan;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->kuesioner)){
            $file_ = public_path('storage\protokol\kuesioner\/').$protocol->kuesioner;
            $pdfmerger->addPDF($file_, 'all');
        }

        if(!empty($protocol->file_informedconsent)){
            $file_ = public_path('storage\protokol\file_informedconsent\/').$protocol->file_informedconsent;
            $pdfmerger->addPDF($file_, 'all');
        }

        $pdfmerger->merge();

        Storage::delete('public/temp/temp_pdf.pdf');

        return $pdfmerger->save('protokol_penelitian.pdf', "download");
    }

    public function ready(Request $request){
        $id = $this->hashids->decode($request->hash);
        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);

        $protocol = Protocol::find($id[0]);
        if(empty($protocol)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);
        
        if($protocol->research_ethic->self_assesment) {
            $update = $protocol->update(['is_ready' => 1]);
        } else {
            return response()->json([
                'success' => false,
                'msg'     => "Self Assesment tidak boleh kosong"
            ], 200);
        }

        if(!$update) return response()->json([
            'success' => false,
            'msg'     => "Terjadi kesalahan update data"
        ], 200);

        return response()->json([
            'success' => true,
            'msg'     => "Protokol anda siap kami telaah. Untuk informasi lebih lanjut segera kami hubungi melalui email."
        ], 200);
    }
}
