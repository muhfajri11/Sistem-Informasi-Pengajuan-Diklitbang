<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.index');
    }

    public function manage_role(){
        return view('dashboard.masteradmin.manageroles');
    }

    public function get_users(){
        $users = User::get();
        $response = [];

        $users->each(function($data, $i) use (&$response){
            $response[$i]['i'] = $i + 1;
            $response[$i]['id'] = $data['id'];
            $response[$i]['name'] = $data['name'];
            $response[$i]['email'] = $data['email'];
            $response[$i]['phone'] = $data['phone'];
            $response[$i]['role'] = $data->getRoleNames()->first();
        });

        echo json_encode($response);
        exit;
    }

    public function get_roles(){
        $roles = Role::with('permissions')->get();;
        $response = [];

        // return response()->json($roles);

        $roles->each(function($data, $i) use (&$response){
            $response[$i]['id'] = $data['id'];
            $response[$i]['name'] = $data['name'];
            $data_permissions = collect($data['permissions']);

            $data_permissions->each(function($permission, $j) use (&$response, &$i){
                $response[$i]['permissions'][$j] = $permission['name'];
            });
        });

        echo json_encode($response);
        exit;
    }

    public function get_permissions(){
        $permissions = Permission::with('roles')->get();;
        $response = [];

        $permissions->each(function($data, $i) use (&$response){
            $response[$i]['id'] = $data['id'];
            $response[$i]['name'] = $data['name'];
        });

        echo json_encode($response);
        exit;
    }

    public function manage_room(){
        return view('dashboard.masteradmin.managerooms');
    }
}
