<?php

namespace App\Http\Controllers;

use App\ResearchEthic;
use App\ResultReview;
use App\Revision;
use App\RevisionProtocol;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RevisionProtocolController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids();
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.layaketik.perbaikan');
    }

    public function ready(){
        $revisions = Revision::all();

        $response = []; $i = 0; 
        foreach($revisions as $revision){
            if(!($revision->research_ethic->user->id == auth()->user()->id)) continue;

            $data = [
                'research_ethic_id' => $revision->research_ethic->id,
                'revision' => $revision->revision,
            ];
            $check = RevisionProtocol::where($data)->first();

            if($check) continue;

            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $this->hashids->encode($revision->id);
            $response[$i]['rev'] = $revision->id;
            $response[$i]['judul'] = $revision->research_ethic->research->judul;
            $response[$i]['status'] = $revision->result_review->status;
            $response[$i]['revision'] = $revision->revision;
            $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $revision->created_at)->format('d F Y');
            $i++;
        }
        
        echo json_encode($response);
        exit;
    }

    public function has_revision(){
        $revisions = RevisionProtocol::all();

        $response = []; $i = 0; 
        foreach($revisions as $revision){
            if(!($revision->research_ethic->user->id == auth()->user()->id)) continue;

            $data = [
                'research_ethic_id' => $revision->research_ethic->id,
                'revision' => $revision->revision,
            ];
            $result = Revision::where($data)->first();

            $response[$i]['i'] = $i + 1;

            $response[$i]['id'] = $this->hashids->encode($result->id);
            $response[$i]['rev'] = $result->id;

            $response[$i]['judul'] = $revision->research_ethic->research->judul;
            $response[$i]['status'] = $revision->status;
            $response[$i]['edit'] = $revision->is_ready;
            $response[$i]['revision'] = $revision->revision;
            $response[$i]['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $revision->created_at)->format('d F Y');
            $i++;
        }
        
        echo json_encode($response);
        exit;
    }

    public function form($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);

        $id = $id[0];

        $revision = Revision::find($id);
        if(!$revision) return abort(404);

        $name = ['revision'];

        $data = [
            'research_ethic_id' => $revision->research_ethic->id,
            'revision' => $revision->revision,
        ];

        $check = RevisionProtocol::where($data)->first();
        if($check){
            $protocol = $check;

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

            $protocol->cv_ketua = is_null($protocol->research_ethic->protocol->cv_ketua)? 
                $protocol->cv_ketua : Storage::url('protokol/cv_ketua/'.$protocol->research_ethic->protocol->cv_ketua);

            $protocol->cv_anggota = is_null($protocol->research_ethic->protocol->cv_anggota)? 
                $protocol->cv_anggota : Storage::url('protokol/cv_anggota/'.$protocol->research_ethic->protocol->cv_anggota);

            $protocol->lembaga_sponsor = is_null($protocol->research_ethic->protocol->lembaga_sponsor)? 
                $protocol->lembaga_sponsor : Storage::url('protokol/lembaga_sponsor/'.$protocol->research_ethic->protocol->lembaga_sponsor);

            $protocol->surat_pernyataan = is_null($protocol->research_ethic->protocol->surat_pernyataan)? 
                $protocol->surat_pernyataan : Storage::url('protokol/surat_pernyataan/'.$protocol->research_ethic->protocol->surat_pernyataan);

            $protocol->kuesioner = is_null($protocol->research_ethic->protocol->kuesioner)? 
                $protocol->kuesioner : Storage::url('protokol/kuesioner/'.$protocol->research_ethic->protocol->kuesioner);

            $protocol->file_informedconsent = is_null($protocol->research_ethic->protocol->file_informedconsent)? 
                $protocol->file_informedconsent : Storage::url('protokol/file_informedconsent/'.$protocol->research_ethic->protocol->file_informedconsent);

            $protocol->halaman_pengesahan = is_null($protocol->research_ethic->protocol->halaman_pengesahan)? 
                $protocol->halaman_pengesahan : Storage::url('protokol/halaman_pengesahan/'.$protocol->research_ethic->protocol->halaman_pengesahan);

            $name[] = 'protocol';
            $is_edit = 1;
            $name[] = 'is_edit';
        } else {
            $file_protocol = $revision->research_ethic->protocol;

            $file_protocol->cv_ketua = is_null($file_protocol->cv_ketua)? 
                $file_protocol->cv_ketua : Storage::url('protokol/cv_ketua/'.$file_protocol->cv_ketua);

            $file_protocol->cv_anggota = is_null($file_protocol->cv_anggota)? 
                $file_protocol->cv_anggota : Storage::url('protokol/cv_anggota/'.$file_protocol->cv_anggota);

            $file_protocol->lembaga_sponsor = is_null($file_protocol->lembaga_sponsor)? 
                $file_protocol->lembaga_sponsor : Storage::url('protokol/lembaga_sponsor/'.$file_protocol->lembaga_sponsor);

            $file_protocol->surat_pernyataan = is_null($file_protocol->surat_pernyataan)? 
                $file_protocol->surat_pernyataan : Storage::url('protokol/surat_pernyataan/'.$file_protocol->surat_pernyataan);

            $file_protocol->kuesioner = is_null($file_protocol->kuesioner)? 
                $file_protocol->kuesioner : Storage::url('protokol/kuesioner/'.$file_protocol->kuesioner);

            $file_protocol->file_informedconsent = is_null($file_protocol->file_informedconsent)? 
                $file_protocol->file_informedconsent : Storage::url('protokol/file_informedconsent/'.$file_protocol->file_informedconsent);

            $file_protocol->halaman_pengesahan = is_null($file_protocol->halaman_pengesahan)? 
                $file_protocol->halaman_pengesahan : Storage::url('protokol/halaman_pengesahan/'.$file_protocol->halaman_pengesahan);
            
            $name[] = 'file_protocol';
        }

        $self_assesment = $revision->research_ethic->self_assesment;
        $self_assesment->nilai_sosial = json_decode($self_assesment->nilai_sosial);
        $self_assesment->nilai_ilmiah = json_decode($self_assesment->nilai_ilmiah);
        $self_assesment->pemerataan = json_decode($self_assesment->pemerataan);
        $self_assesment->potensi = json_decode($self_assesment->potensi);
        $self_assesment->bujukan = json_decode($self_assesment->bujukan);
        $self_assesment->privacy = json_decode($self_assesment->privacy);

        $name[] = 'self_assesment';

        return view('dashboard.layaketik.form_perbaikan', compact($name));
    }

    public function view($hash){
        if(empty($hash)) return abort(404);

        $id = $this->hashids->decode($hash);
        if(empty($id)) return abort(404);
        $id = $id[0];

        $revision = Revision::find($id);
        if(!$revision) return abort(404);

        $data = [
            'research_ethic_id' => $revision->research_ethic->id,
            'revision' => $revision->revision,
        ];

        $protocol = RevisionProtocol::where($data)->first();
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

        $protocol->cv_ketua = is_null($protocol->research_ethic->protocol->cv_ketua)? 
            $protocol->cv_ketua : Storage::url('protokol/cv_ketua/'.$protocol->research_ethic->protocol->cv_ketua);

        $protocol->cv_anggota = is_null($protocol->research_ethic->protocol->cv_anggota)? 
            $protocol->cv_anggota : Storage::url('protokol/cv_anggota/'.$protocol->research_ethic->protocol->cv_anggota);

        $protocol->lembaga_sponsor = is_null($protocol->research_ethic->protocol->lembaga_sponsor)? 
            $protocol->lembaga_sponsor : Storage::url('protokol/lembaga_sponsor/'.$protocol->research_ethic->protocol->lembaga_sponsor);

        $protocol->surat_pernyataan = is_null($protocol->research_ethic->protocol->surat_pernyataan)? 
            $protocol->surat_pernyataan : Storage::url('protokol/surat_pernyataan/'.$protocol->research_ethic->protocol->surat_pernyataan);

        $protocol->kuesioner = is_null($protocol->research_ethic->protocol->kuesioner)? 
            $protocol->kuesioner : Storage::url('protokol/kuesioner/'.$protocol->research_ethic->protocol->kuesioner);

        $protocol->file_informedconsent = is_null($protocol->research_ethic->protocol->file_informedconsent)? 
            $protocol->file_informedconsent : Storage::url('protokol/file_informedconsent/'.$protocol->research_ethic->protocol->file_informedconsent);

        $protocol->halaman_pengesahan = is_null($protocol->research_ethic->protocol->halaman_pengesahan)? 
            $protocol->halaman_pengesahan : Storage::url('protokol/halaman_pengesahan/'.$protocol->research_ethic->protocol->halaman_pengesahan);

        $self_assesment = $revision->research_ethic->self_assesment;
        $self_assesment->nilai_sosial = json_decode($self_assesment->nilai_sosial);
        $self_assesment->nilai_ilmiah = json_decode($self_assesment->nilai_ilmiah);
        $self_assesment->pemerataan = json_decode($self_assesment->pemerataan);
        $self_assesment->potensi = json_decode($self_assesment->potensi);
        $self_assesment->bujukan = json_decode($self_assesment->bujukan);
        $self_assesment->privacy = json_decode($self_assesment->privacy);

        $view = 1;
        return view('dashboard.layaketik.form_perbaikan', compact('revision', 'protocol', 'self_assesment', 'view'));
    }

    public function get_detailprotocol($ethic, $data){
        $response = [];

        $ethic = ResearchEthic::find($ethic);
        $except_ = [
            'id', 'research_ethic', 'revision', 'cv_ketua', 'cv_anggota',
            'lembaga_sponsor', 'surat_pernyataan', 'kuesioner', 'file_informedconsent',
            'halaman_pengesahan', 'created_at', 'updated_at',
        ];

        $protocol = $ethic->protocol;
        $rev_protocol = $ethic->revision_protocols;

        return response()->json($ethic->protocol);
    }

    public function store(Request $request){
        $req = $request->all();

        $assesment = json_decode($request->self_assesment, true);

        $assesment['nilai_sosial'] = !empty($assesment['nilai_sosial'])? $assesment['nilai_sosial']: null;
        $assesment['nilai_ilmiah'] = !empty($assesment['nilai_ilmiah'])? $assesment['nilai_ilmiah']: null;
        $assesment['pemerataan'] = !empty($assesment['pemerataan'])? $assesment['pemerataan']: null;
        $assesment['potensi'] = !empty($assesment['potensi'])? $assesment['potensi']: null;
        $assesment['bujukan'] = !empty($assesment['bujukan'])? $assesment['bujukan']: null;
        $assesment['privacy'] = !empty($assesment['privacy'])? $assesment['privacy']: null;

        $assesment['catatan_nilaisosial'] = $request->catatan_nilaisosial;
        $assesment['catatan_nilaiilmiah'] = $request->catatan_nilaiilmiah;
        $assesment['catatan_pemerataan'] = $request->catatan_pemerataan;
        $assesment['catatan_potensi'] = $request->catatan_potensi;
        $assesment['catatan_bujukan'] = $request->catatan_bujukan;
        $assesment['catatan_privacy'] = $request->catatan_privacy;
        $assesment['catatan_informedconsent'] = $request->catatan_informedconsent;

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
            $req['komitmen_etik_c'], $req['cv_ketua'], $req['cv_anggota'], $req['lembaga_sponsor'],
            $req['surat_pernyataan'], $req['kuesioner'], $req['file_informedconsent'],
            $req['halaman_pengesahan'], $req['self_assesment'], $req['catatan_nilaisosial'],
            $req['catatan_nilaiilmiah'], $req['catatan_pemerataan'], $req['catatan_potensi'],
            $req['catatan_bujukan'], $req['catatan_privacy'], $req['catatan_informedconsent'],
        );

        // return response()->json([
        //     'success' => false,
        //     'msg'     => $req
        // ], 200);

        if($request->is_edit){
            $data = [
                'revision' => $request->revision,
                'research_ethic_id' => $request->id
            ];

            unset($req['is_edit']);

            $rev_protocol = RevisionProtocol::where($data)->update($req);

            $msg = "Berhasil update revisi protokol";
        } else {
            $req['revision'] = $request->revision;
            $req['research_ethic_id'] = $request->id;

            $rev_protocol = RevisionProtocol::create($req);
            $msg = "Berhasil menyimpan revisi protokol";
        }
        
        if(!$rev_protocol) return response()->json([
            'success' => false,
            'msg'     => "Gagal menyimpan data"
        ], 200);

        $ethic = ResearchEthic::find($request->id);

        $self_assesment = $ethic->self_assesment->update($assesment);
        if(!$self_assesment) return response()->json([
            'success' => false,
            'msg'     => "Gagal mengupdate data self assesment"
        ], 200);

        $protocol = $ethic->protocol;

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
            'msg'     => $msg
        ], 200);
    }

    public function is_ready(Request $request){
        $id = $this->hashids->decode($request->hash);
        if(empty($id)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);
        $id = $id[0];

        $revision = Revision::find($id);
        if(empty($revision)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);

        $data = [
            'research_ethic_id' => $revision->research_ethic->id,
            'revision' => $revision->revision,
        ];

        $rev_protocol = RevisionProtocol::where($data)->first();
        if(empty($rev_protocol)) return response()->json([
            'success' => false,
            'msg'     => "Terjadi Kesalahan"
        ], 200);
        
        $update = $rev_protocol->update(['is_ready' => 1]);

        if(!$update) return response()->json([
            'success' => false,
            'msg'     => "Terjadi kesalahan update data"
        ], 200);

        return response()->json([
            'success' => true,
            'msg'     => "Protokol anda siap kami review. Untuk informasi lebih lanjut segera kami hubungi melalui email."
        ], 200);
    }
}
