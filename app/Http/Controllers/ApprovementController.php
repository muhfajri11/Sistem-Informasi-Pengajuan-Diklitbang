<?php

namespace App\Http\Controllers;

use App\{Internship, FileInternship, Comparative, Message};
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

    public function comparative_changestatus(Request $request){
        $data = $request->all();
        
        $sendMsg = $this->change_message($data);

        if(!$sendMsg){
            return response()->json([
                'success' => false,
                'msg'    => "Terjadi kesalahan mengirim email"
            ], 200);    
        }

        $update =  Comparative::find($request->id)->update($request->all());

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

    public function change_message($data){
        $comparative = Comparative::with('user')->find($data['id']);
        $details = [
            'user_id'   => $comparative->user_id,
            'email'     => $comparative->user->email
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
            Mail::to($details['email'])->send(new SendMail($details));
        }

        return $log_mail;
    }
}
