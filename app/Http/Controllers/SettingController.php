<?php

namespace App\Http\Controllers;

use App\{Account, EducationLevel, Setting, TypeInternship};
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function get_settings(Request $request){
        $name = $request->name;

        $settings = Setting::byName($name);

        if(!$settings){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan mengambil data setting'
            ], 200);   
        }

        return response()->json([
            'success' => true,
            'get'    => $settings
        ], 200);
    }

    // public function tipepkl_all(){
    //     $tipepkl = Setting::byName(['tipe_internship']);
    //     $result = $tipepkl->value;

    //     foreach($result as $data){
    //         $data->fee = $this->rupiah($data->fee);
    //     }

    //     echo json_encode($result);
    //     exit();
    // }


    // public function jenjang_all(){
    //     $jenjang = Setting::byName(['jenjang_pendidikan']);
    //     $result = $jenjang->value;

    //     foreach($result as $data){
    //         $data->fee = $this->rupiah($data->fee);
    //     }

    //     echo json_encode($result);
    //     exit();
    // }

    public function tipepkl_all(){
        $result = TypeInternship::all();

        foreach($result as $data){
            $data->fee = $this->rupiah($data->fee);
        }

        echo json_encode($result);
        exit();
    }

    public function jenjang_all(){
        $result = EducationLevel::all();

        foreach($result as $data){
            $data->fee = $this->rupiah($data->fee);
        }

        echo json_encode($result);
        exit();
    }

    public function get_tipepkl(Request $request){
        if($request->id){
            $result = TypeInternship::find($request->id);
        } else {
            $result = TypeInternship::all();
        }

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Data tidak ada"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'get'     => $result
        ], 200);
    }

    public function get_jenjang(Request $request){
        if($request->id){
            $result = EducationLevel::find($request->id);
        } else {
            $result = EducationLevel::all();
        }

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Data tidak ada"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'get'     => $result
        ], 200);
    }

    public function get_account(Request $request){
        if($request->id){
            $result = Account::find($request->id);
        } else {
            $result = Account::all();
        }

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Data tidak ada"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'get'     => $result
        ], 200);
    }

    public function delete_tipepkl(Request $request){
        $result = TypeInternship::find($request->id)->delete();

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Kesalahan menghapus data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menghapus data"
        ], 200);
    }

    public function delete_jenjang(Request $request){
        $result = EducationLevel::find($request->id)->delete();

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Kesalahan menghapus data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menghapus data"
        ], 200);
    }

    public function edit_tipepkl(Request $request){
        $data = [
            'name' => $request->name,
            'fee' => $request->fee,
        ];

        $result = TypeInternship::find($request->id)->update($data);

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Kesalahan update data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil update data"
        ], 200);
    }

    public function edit_jenjang(Request $request){
        $data = [
            'name' => $request->name,
            'fee' => $request->fee,
        ];

        $result = EducationLevel::find($request->id)->update($data);

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Kesalahan update data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil update data"
        ], 200);
    }

    // public function get_data(Request $request){
    //     $result = Setting::getValueSpecific($request->all());

    //     if(!$result){
    //         return response()->json([
    //             'success' => false,
    //             'msg'     => "Data tidak ada"
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'get'     => $result
    //     ], 200);
    // }

    // public function update_data(Request $request){
    //     $store = $request->all();
    //     $name = Setting::byName([$request->tipe]);

    //     unset($store['id'], $store['tipe'], $store['_method']);

    //     if(!$name){
    //         return response()->json([
    //             'success' => false,
    //             'msg'     => "Data tidak ada"
    //         ], 200);
    //     }

    //     $result = [];
    //     foreach($name->value as $value){
    //         if($value->name == $request->id){
    //             $result[] = $store;
    //         } else {
    //             $result[] = $value;
    //         }
    //     }

    //     $result = json_encode($result);

    //     $update = Setting::where('name', $request->tipe)->update(['value' => $result]);

    //     if(!$update){
    //         return response()->json([
    //             'success' => false,
    //             'msg'     => "Gagal update data"
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'msg'     => "Berhasil update data"
    //     ], 200);
    // }

    // public function delete_spesific(Request $request){
    //     $result = Setting::deleteValueSpecific($request->all());

    //     if(!$result){
    //         return response()->json([
    //             'success' => false,
    //             'msg'     => "Data tidak ada"
    //         ], 200);
    //     }

    //     $data = [
    //         'user_id'   => auth()->user()->id,
    //         'value'     => $result
    //     ];

    //     $setting = Setting::where('name', $request->name)->update($data);

    //     if(!$setting){
    //         return response()->json([
    //             'success' => false,
    //             'msg'     => "Gagal update data"
    //         ], 200);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'msg'     => "Berhasil Hapus Data"
    //     ], 200);
    // }
}
