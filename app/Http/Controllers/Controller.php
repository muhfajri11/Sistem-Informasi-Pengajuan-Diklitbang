<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($data){
        /***
         * Example param
         * 
         * path = 'public/studibanding/lampiran'
         * file = $request->file()
         * user = auth()->user()
         * id = id from table
         * prefix = "comparativeattach_"
         */

        $image = $data['file'];

        $extension = $image->getClientOriginalExtension();
        $name = str_replace(' ', '', strtolower($data['user']->name));

        $image_name = $data['prefix'].$name."_".$data['id'].".".$extension;
        $img_store = $image->storeAs($data['path'], $image_name);

        return $image_name;
    }

    public function deleteImage($data){
        $name_file = $data['path'].$data['image'];
        $result = \Storage::delete($name_file);

        return $result;
    }

}
