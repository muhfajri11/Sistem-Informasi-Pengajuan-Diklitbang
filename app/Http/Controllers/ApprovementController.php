<?php

namespace App\Http\Controllers;

use App\{Internship, FileInternship, Comparative, Message, Room};
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApprovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function internship_approve(){
        return view('dashboard.internship.persetujuan');
    }

    public function comparative_approve(){
        return view('dashboard.studibanding.persetujuan');
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
            $details['title'] = 'Penempatan Ruangan Magang RSUD Gunung Jati Cirebon';
            $details['body'] = "Selamat anda akan kami tempatkan di ruangan berikut: <br><br><ol>";

            $req_rooms->each(function($data) use (&$details){
                $rooms = Room::find($data);
                $details['body'] .= "<li>".$rooms->name."</li>";
            });

            $details['body'] .= "</ol><br><br> Terima Kasih.";
        } else {    
            $details['title'] = 'Perubahan Penempatan Ruangan Magang RSUD Gunung Jati Cirebon';
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
            'msg'    => "Berhasil mengatur ruangan magang"
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
            $details['title'] = 'Perubahan Status Pengajuan & Status Pembayaran Magang';

            switch($data['status']){
                case 'reject':
                    $details['body'] = 'Mohon maaf, permintaan pengajuan magang anda kami tolak.<br><br>';
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
                    $details['body'] = 'Selamat anda telah diterima untuk melakukan magang ditempat
                                        kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.<br><br>';
                break;
                case 'done':
                    $details['body'] = 'Selamat anda telah menyelesaikan masa magang anda.<br><br>';
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
                $details['title'] = 'Perubahan Status Pengajuan Magang';

                switch($data['status']){
                    case 'reject':
                        $details['body'] = 'Mohon maaf, permintaan pengajuan magang anda kami tolak.';
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
                        $details['body'] = 'Selamat anda telah diterima untuk melakukan magang ditempat
                                            kami. Informasi lebih lanjut segera kami beritahukan. Terima Kasih.';
                    break;
                    case 'done':
                        $details['body'] = 'Selamat anda telah menyelesaikan masa magang anda.<br><br>';
                    break;
                }
            }

            if($check_paid){
                $details['title'] = 'Perubahan Status Pembayaran Magang';

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

    public function send_message(Request $request){
        if($request->from == 'internship'){
            $data = Internship::with('user')->find($request->id);
        } else {
            $data = Comparative::with('user')->find($request->id);
        }

        $details = [
            'user_id'   => $data->user_id,
            'table_id'  => $data->id,
            'email'     => $data->user->email,
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
}
