<?php

namespace App\Http\Controllers;

use App\{Internship, FileInternship, Comparative, Message, Research, Room, Setting};
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Mail, Storage};

class ApprovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function internship_approve(){
        $intern = Internship::all();
        $accept = Internship::where('status', 'accept')->get();
        $waiting = Internship::whereIn('status', ['review', 'pay'])->get();
        $done = Internship::whereIn('status', ['reject', 'done'])->get();

        $max_intern = Setting::byName(['kuota']);
        $max_intern = $max_intern->value->internship;
        $fee = Setting::byName(['fee'])->value;
        
        $data = [
            'internship'    => [
                'all'           => $intern,
                'accept'        => $accept,
                'waiting'        => $waiting,
                'done'        => $done,
                'presentase_accept'    => count($intern) > 0 ? (count($accept)/count($intern)) * 100: 0,
                'presentase_waiting'    => count($intern) > 0 ? (count($waiting)/count($intern)) * 100 : 0
            ],
            'kuota_pkl'     => $max_intern,
            'fee'           => $fee
        ];

        return view('dashboard.internship.persetujuan', compact('data'));
    }

    public function comparative_approve(){
        $comparative = Comparative::all();
        $accept = Comparative::where('status', 'accept')->get();
        $waiting = Comparative::whereIn('status', ['review', 'pay'])->get();

        $fee = Setting::byName(['fee'])->value;
        
        $data = [
            'comparative'    => [
                'all'           => $comparative,
                'accept'        => $accept,
                'waiting'        => $waiting,
                'presentase_accept'    => count($comparative) > 0 ? (count($accept)/count($comparative)) * 100 : 0,
                'presentase_waiting'    => count($comparative) > 0 ? (count($waiting)/count($comparative)) * 100 : 0
            ],
            'fee'           => $fee
        ];

        return view('dashboard.studibanding.persetujuan', compact('data'));
    }

    public function research_approve(){
        return view('dashboard.research.persetujuan');
    }

    public function changestatus(Request $request){
        $data = $request->all();

        switch($request->from){
            case 'comparative':
                $sendMsg = $this->change_comparative($data);
            break;
            case 'internship':
                $sendMsg = $this->change_internship($data);
            break;
            case 'research':
                $sendMsg = $this->change_research($data);
            break;
        }

        if(!$sendMsg){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan mengirim email"
            ], 200);    
        }

        switch($request->from){
            case 'comparative':
                $update = Comparative::find($request->id)->update($request->all());
            break;
            case 'internship':
                $update = Internship::find($request->id)->update($request->all());
            break;
            case 'research':
                $update = Research::find($request->id)->update($request->all());
            break;
        }

        if(!$update){
            return response()->json([
                'success' => false,
                'msg'    => "Ubah Status Gagal"
            ], 200);    
        }

        return response()->json([
            'success' => true,
            'msg'    => "Ubah Status Berhasil"
        ], 200);
    }

    public function set_rooms(Request $request){
        $intern = Internship::with('rooms', 'user')->find($request->id);
        $req_rooms = collect($request->rooms);

        $details = [
            'user_id'   => $intern->user_id,
            'table_id'  => $intern->id,
            'email'     => $intern->user->email,
            'from'      => $request->from
        ];

        if(count($intern->rooms) < 1){
            $details['title'] = 'Penempatan Ruangan PKL RSUD Gunung Jati Cirebon';
            $details['body'] = "Selamat anda akan kami tempatkan di ruangan berikut: <br><br><ol>";

            $req_rooms->each(function($data) use (&$details){
                $rooms = Room::find($data);
                $details['body'] .= "<li>".$rooms->name."</li>";
            });

            $details['body'] .= "</ol><br><br> Terima Kasih.";
        } else {    
            $details['title'] = 'Perubahan Penempatan Ruangan PKL RSUD Gunung Jati Cirebon';
            $details['body'] = "Terjadi perubahan penempatan ruangan, anda akan kami tempatkan di ruangan berikut: <br><br><ol>";

            $req_rooms->each(function($data) use (&$details){
                $rooms = Room::find($data);
                $details['body'] .= "<li>".$rooms->name."</li>";
            });

            $details['body'] .= "</ol><br><br> Terima Kasih.";
        }

        $rooms = $intern->rooms()->sync($request->rooms);
        if(!$rooms){
            return response()->json([
                'success' => false,
                'msg'    => "Kesalahan menyimpan data ruangan"
            ], 200);    
        }

        $log_mail = Message::create($details);

        if($log_mail){
            $details['data'] = $intern;
            Mail::to($details['email'])->send(new SendMail($details));
        }        

        return response()->json([
            'success' => true,
            'msg'    => "Berhasil mengatur penempatan ruangan peserta PKL"
        ], 200);    
    }

    public function change_comparative($data){
        $comparative = Comparative::with('user')->find($data['id']);
        $details = [
            'user_id'   => $comparative->user_id,
            'table_id'  => $comparative->id,
            'email'     => $comparative->user->email,
            'from'      => $data['from']
        ];

        $check_status = $data['status'] != $comparative->status;
        $check_paid = $data['paid'] != $comparative->paid;

        if($check_status && $check_paid){
            $details['title'] = 'Perubahan Status Pengajuan & Status Pembayaran Studi Banding';

            switch($data['status']){
                case 'reject':
                    $details['body'] = 'Mohon maaf, permintaan pengajuan Studi Banding anda kami tolak.<br><br>';
                break;
                case 'review':
                    $details['body'] = 'Dokumen anda akan kami review terlebih dahulu. Untuk informasi 
                                        kelengkapan dokumen akan kami informasikan segera. Terima Kasih.<br><br>';
                break;
                case 'pay':
                    $details['body'] = 'Selamat data dan dokumen sudah kami terima. Selanjutnya silahkan
                                        selesaikan pembayaran yang sudah tertera. Terima Kasih.<br><br>';
                break;
                case 'accept':
                    $details['body'] = 'Selamat anda telah diterima untuk melakukan Studi Banding ditempat
                                        kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.<br><br>';
                break;
            }

            switch($data['paid']){
                case "1":
                    $details['body'] .= "Selamat Bukti Pembayaran anda kami terima.";
                break;
                case "0":
                    $details['body'] .= "Bukti Pembayaran anda tidak valid silahkan upload kembali.";
                break;
            }
        } else {
            if($check_status){
                $details['title'] = 'Perubahan Status Pengajuan Studi Banding';

                switch($data['status']){
                    case 'reject':
                        $details['body'] = 'Mohon maaf, permintaan pengajuan Studi Banding anda kami tolak.';
                    break;
                    case 'review':
                        $details['body'] = 'Dokumen anda akan kami review terlebih dahulu. Untuk informasi 
                                        kelengkapan dokumen akan kami informasikan segera. Terima Kasih.<br><br>';
                    break;
                    case 'pay':
                        $details['body'] = 'Selamat data dan berkas sudah kami terima. Selanjutnya silahkan
                                            selesaikan pembayaran yang sudah tertera. Terima Kasih.';
                    break;
                    case 'accept':
                        $details['body'] = 'Selamat anda telah diterima untuk melakukan Studi Banding ditempat
                                            kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.';
                    break;
                }
            }

            if($check_paid){
                $details['title'] = 'Perubahan Status Pembayaran Studi Banding';

                switch($data['paid']){
                    case "1":
                        $details['body'] = "Selamat Bukti Pembayaran anda kami terima.";
                    break;
                    case "0":
                        $details['body'] = "Bukti Pembayaran anda tidak valid silahkan upload kembali.";
                    break;
                }
            }
        }

        $log_mail = Message::create($details);

        if($log_mail){
            $details['data'] = $comparative;
            Mail::to($details['email'])->send(new SendMail($details));
        }

        return $log_mail;
    }

    public function change_internship($data){
        $intern = Internship::with('user')->find($data['id']);
        $details = [
            'user_id'   => $intern->user_id,
            'table_id'  => $intern->id,
            'email'     => $intern->user->email,
            'from'      => $data['from']
        ];

        $check_status = $data['status'] != $intern->status;
        $check_paid = $data['paid'] != $intern->paid;

        if($check_status && $check_paid){
            $details['title'] = 'Perubahan Status Pengajuan & Status Pembayaran PKL';

            switch($data['status']){
                case 'reject':
                    $details['body'] = 'Mohon maaf, permintaan pengajuan PKL anda kami tolak.<br><br>';
                break;
                case 'review':
                    $details['body'] = 'Dokumen anda akan kami review terlebih dahulu. Untuk informasi 
                                        kelengkapan dokumen akan kami informasikan segera. Terima Kasih.<br><br>';
                break;
                case 'pay':
                    $details['body'] = 'Selamat data dan dokumen sudah kami terima. Selanjutnya silahkan
                                        selesaikan pembayaran yang sudah tertera. Terima Kasih.<br><br>';
                break;
                case 'accept':
                    $details['body'] = 'Selamat anda telah diterima untuk melakukan PKL ditempat
                                        kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.<br><br>';
                break;
                case 'done':
                    $details['body'] = 'Selamat anda telah menyelesaikan masa PKL anda.<br><br>';
                break;
            }

            switch($data['paid']){
                case "1":
                    $details['body'] .= "Selamat Bukti Pembayaran anda kami terima.";
                break;
                case "0":
                    $details['body'] .= "Bukti Pembayaran anda tidak valid silahkan upload kembali.";
                break;
            }
        } else {
            if($check_status){
                $details['title'] = 'Perubahan Status Pengajuan PKL';

                switch($data['status']){
                    case 'reject':
                        $details['body'] = 'Mohon maaf, permintaan pengajuan PKL anda kami tolak.';
                    break;
                    case 'review':
                        $details['body'] = 'Dokumen anda akan kami review terlebih dahulu. Untuk informasi 
                                        kelengkapan dokumen akan kami informasikan segera. Terima Kasih.<br><br>';
                    break;
                    case 'pay':
                        $details['body'] = 'Selamat data dan berkas sudah kami terima. Selanjutnya silahkan
                                            selesaikan pembayaran yang sudah tertera. Terima Kasih.';
                    break;
                    case 'accept':
                        $details['body'] = 'Selamat anda telah diterima untuk melakukan PKL ditempat
                                            kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.';
                    break;
                    case 'done':
                        $details['body'] = 'Selamat anda telah menyelesaikan masa PKL anda.<br><br>';
                    break;
                }
            }

            if($check_paid){
                $details['title'] = 'Perubahan Status Pembayaran PKL';

                switch($data['paid']){
                    case "1":
                        $details['body'] .= "Selamat Bukti Pembayaran anda kami terima.";
                    break;
                    case "0":
                        $details['body'] .= "Bukti Pembayaran anda tidak valid silahkan upload kembali.";
                    break;
                }
            }
        }

        $log_mail = Message::create($details);

        if($log_mail){
            $details['data'] = $intern;
            Mail::to($details['email'])->send(new SendMail($details));
        }

        return $log_mail;
    }

    public function change_research($data){
        $research = Research::with('user')->find($data['id']);
        $details = [
            'user_id'   => $research->user_id,
            'table_id'  => $research->id,
            'email'     => $research->user->email,
            'from'      => $data['from']
        ];

        $check_status = $data['status'] != $research->status;
        $check_paid = $data['paid'] != $research->paid;
        $check_etik = $data['is_layaketik'] != $research->is_layaketik;

        $details['title'] = 'Perubahan Status Pengajuan Penelitian';
        $details['body'] = '';
        $check_send = false;

        if($check_status){
            $check_send = true;
            switch($data['status']){
                case 'reject':
                    $details['body'] .= 'Mohon maaf, permintaan pengajuan Penelitian anda kami tolak.<br><br>';
                break;
                case 'review':
                    $details['body'] .= 'Dokumen anda akan kami review terlebih dahulu. Untuk informasi 
                                    kelengkapan dokumen akan kami informasikan segera. Terima Kasih.<br><br>';
                break;
                case 'pay':
                    $details['body'] .= 'Selamat data dan berkas sudah kami terima. Selanjutnya silahkan
                                        selesaikan pembayaran yang sudah tertera. Terima Kasih.<br><br>';
                break;
                case 'accept':
                    $details['body'] .= 'Selamat anda telah diterima untuk melakukan Penelitian ditempat
                                        kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.<br><br>';
                break;
            }
        }

        if($check_paid){
            $check_send = true;
            switch($data['paid']){
                case "1":
                    $details['body'] .= "Selamat Bukti Pembayaran anda kami terima.<br><br><hr>";
                break;
                case "0":
                    $details['body'] .= "Bukti Pembayaran anda tidak valid silahkan upload kembali.<br><br><hr>";
                break;
            }
        }

        if($check_etik){
            $check_send = true;
            switch($data['is_layaketik']){
                case "1":
                    $details['body'] .= "Penelitian anda perlu untuk di uji layak etik.";
                break;
                case "0":
                    $details['body'] .= "Penelitian anda tidak perlu untuk di uji layak etik";
                break;
            }
        }

        if($check_send){
            $log_mail = Message::create($details);

            if($log_mail){
                $details['data'] = $research;
                Mail::to($details['email'])->send(new SendMail($details));
            }
        } else {
            $log_mail = true;
        }

        return $log_mail;
    }

    public function add_certificate(Request $request){
        $user = auth()->user();
        $intern = Internship::find($request->id);

        if($request->hasFile('sertifikat')){
            $image = $this->uploadImage([
                'path'      => 'public/magang/sertifikat',
                'file'      => $request->file('sertifikat'),
                'user'      => $user,
                'id'        => $intern->file_internship_id,
                'prefix'    => 'magangsertifikat_'
            ]);

            $update = FileInternship::find($intern->file_internship_id)->update(['sertifikat' => $image]);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan sertifikat'
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi'
            ], 200);
        }

        $intern = Internship::with('file_internship')->find($request->id);

        $details = [
            'user_id'   => $intern->user_id,
            'table_id'  => $intern->id,
            'email'     => $intern->user->email,
            'from'      => $request->from
        ];

        $details['title'] = 'Sertifikat Kelulusan Masa PKL di Rumah Sakit Gunung Jati Cirebon';
        $details['body'] = "Selamat anda telah menyelesaikan masa PKL di Rumah Sakit Gunung Jati Cirebon. Berikut Sertifikat Kelulusan anda sebagai penghargaan dari kami.";
        $details['filepath'] = public_path().'/'.Storage::url('magang/sertifikat/'.$intern->file_internship->sertifikat);
        $details['filename'] = 'sertifikat_kelulusanpkl_rsgjcirebon.pdf';
        
        $log_mail = Message::create($details);

        if($log_mail){
            $details['data'] = $intern;
            Mail::to($details['email'])->send(new SendMail($details));
        }        

        return response()->json(['success' => true, 'msg' => "Berhasil upload Sertifikat Kelulusan"], 200);
    }

    public function add_izinpenelitian(Request $request){
        $user = auth()->user();
        $research = Research::find($request->id);

        if($request->hasFile('izin_penelitian')){
            $image = $this->uploadImage([
                'path'      => 'public/research/izinpenelitian',
                'file'      => $request->file('izin_penelitian'),
                'user'      => $user,
                'id'        => $research->id,
                'prefix'    => 'researchizinpenelitian_'
            ]);

            $update = $research->update(['izin_penelitian' => $image]);

            if(!$update){
                return response()->json([
                    'success' => false,
                    'msg'     => 'Gagal menyimpan surat izin penelitian'
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'msg'     => 'File tidak terdeteksi'
            ], 200);
        }

        $research = Research::find($request->id);

        $details = [
            'user_id'   => $research->user_id,
            'table_id'  => $research->id,
            'email'     => $research->user->email,
            'from'      => $request->from
        ];

        $details['title'] = 'Sertifikat Izin Penelitian di Rumah Sakit Gunung Jati Cirebon';
        $details['body'] = "Selamat anda telah diterima untuk melakukan penelitian di Rumah Sakit Gunung Jati Cirebon. Berikut file kami lampirkan.";
        $details['filepath'] = public_path().'/'.Storage::url('research/izinpenelitian/'.$research->izin_penelitian);
        $details['filename'] = 'surat_izinpenelitian_rsgjcirebon.pdf';
        
        $log_mail = Message::create($details);

        if($log_mail){
            $details['data'] = $research;
            Mail::to($details['email'])->send(new SendMail($details));
        }        

        return response()->json(['success' => true, 'msg' => "Berhasil upload Surat Izin Penelitian"], 200);
    }

    public function send_message(Request $request){
        
        switch($request->from){
            case 'internship':
                $data = Internship::with('user')->find($request->id);
                break;
            case 'comparative':
                $data = Comparative::with('user')->find($request->id);
                break;
            case 'research': 
                $data = Research::with('user')->find($request->id);
                break;
        }

        $details = [
            'user_id'   => $data->user_id,
            'table_id'  => $data->id,
            'email'     => $data->user->email,
            'from'      => $request->from,
            'title'     => $request->title,
            'body'      => $request->body
        ];

        $log_mail = Message::create($details);

        if(!$log_mail){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan mengirim email"
            ], 200);    
        }

        $details['from'] = $request->from;
        $details['data'] = $data;

        Mail::to($details['email'])->send(new SendMail($details));

        return response()->json([
            'success' => true,
            'msg'    => "Berhasil mengirim pesan ke ".$details['email']
        ], 200);
    }

    public function setting_pkl(Request $request){
        $store = $request->all();
        $setting = Setting::byName(['fee', 'kuota']);
        unset($store['_method']);

        $settings = [];
        foreach($setting as $data){
            $settings[$data->name] = $data->value;
        }

        $settings['kuota']->internship = $request->kuota;
        $settings['fee']->internship->mou = $request->mou;
        $settings['fee']->internship->no_mou = $request->no_mou;        

        $update = Setting::where('name', 'kuota')->update(['value' => json_encode($settings['kuota'])]);
        if(!$update){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan menyimpan data kuota"
            ], 200);
        }

        $update = Setting::where('name', 'fee')->update(['value' => json_encode($settings['fee'])]);
        if(!$update){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan menyimpan data fee"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'    => "Berhasil mengatur data PKL"
        ], 200);
    }

    public function setting_comparative(Request $request){
        $store = $request->all();
        $setting = Setting::byName(['fee']);
        unset($store['_method']);

        $setting->value->comparative->kurang_dari = $request->less;
        $setting->value->comparative->lebih_dari = $request->over;

        $update = Setting::where('name', 'fee')->update(['value' => json_encode($setting->value)]);
        if(!$update){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan menyimpan data fee"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'    => "Berhasil mengatur data PKL"
        ], 200);
    }
}
