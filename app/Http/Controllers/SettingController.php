<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function tipepkl_all(){
        $tipepkl = Setting::byName(['tipe_internship']);
        $result = $tipepkl->value;

        foreach($result as $data){
            $data->fee = $this->rupiah($data->fee);
        }

        echo json_encode($result);
        exit();
    }

    public function jenjang_all(){
        $jenjang = Setting::byName(['jenjang_pendidikan']);
        $result = $jenjang->value;

        foreach($result as $data){
            $data->fee = $this->rupiah($data->fee);
        }

        echo json_encode($result);
        exit();
    }

    public function get_data(Request $request){
        $result = Setting::getValueSpecific($request->all());

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

    public function update_data(Request $request){
        $store = $request->all();
        $name = Setting::byName([$request->tipe]);

        unset($store['id'], $store['tipe'], $store['_method']);

        if(!$name){
            return response()->json([
                'success' => false,
                'msg'     => "Data tidak ada"
            ], 200);
        }

        $result = [];
        foreach($name->value as $value){
            if($value->name == $request->id){
                $result[] = $store;
            } else {
                $result[] = $value;
            }
        }

        // return response()->json([
        //     'success' => false,
        //     'request' => $request->all(),
        //     'store'   => $store,
        //     'result'  => $result
        // ], 200);

        $result = json_encode($result);

        $update = Setting::where('name', $request->tipe)->update(['value' => $result]);

        if(!$update){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal update data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil update data"
        ], 200);
    }

    public function delete_spesific(Request $request){
        $result = Setting::deleteValueSpecific($request->all());

        if(!$result){
            return response()->json([
                'success' => false,
                'msg'     => "Data tidak ada"
            ], 200);
        }

        $data = [
            'user_id'   => auth()->user()->id,
            'value'     => $result
        ];

        $setting = Setting::where('name', $request->name)->update($data);

        if(!$setting){
            return response()->json([
                'success' => false,
                'msg'     => "Gagal update data"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil Hapus Data"
        ], 200);
    }
}
