<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $roles = Role::get();
        $permissions = Permission::get();

        return view('dashboard.masteradmin.manageroles', compact('roles', 'permissions'));
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

    public function get_user(){
        $req = request()->all();

        $user = User::find($req['id']);
        $response = [];

        $response['name'] = $user['name'];
        $response['email'] = $user['email'];
        $response['phone'] = $user['phone'];
        $response['role'] = $user->getRoleNames()->first();
        $response['role_id'] = $user->roles->first()->id;
        $response['created_at'] = $user['created_at'];
        $response['permissions'] = [];
        $response['is_verified'] = $user->hasVerifiedEmail();

        $user->getAllPermissions()->each(function($data, $i) use (&$response){
            $response['permissions'][$i]['name'] = $data['name'];
            $response['permissions'][$i]['id'] = $data['id'];
        });

        echo json_encode($response);
        exit;
    }

    public function add_user(){
        $req = request()->all();
        $data = [
            'name' => $req['nama_daftar'],
            'email' => $req['email_daftar'],
            'phone' => $req['phone_daftar'],
            'password' => Hash::make('12341234')
        ];
        $user = User::create($data);

        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        $role = Role::find($req['role_daftar']);
        $user->assignRole($role['name']);

        foreach($req['permissions'] as $permission){
            $user->givePermissionTo(Permission::find($permission)->name);
        }

        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Tambah Pengguna'
        ], 200);
    }

    public function update_user(){
        $req = request()->all();
        $data = [
            'name' => $req['nama_edit'],
            'email' => $req['email_edit'],
            'phone' => $req['phone_edit']
        ];
        $user = User::where('id', $req['id'])->update($data);

        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }
        $user = User::find($req['id']);

        $role = Role::find($req['role_edit']);
        $user->syncRoles($role['name']);
        $permissions = [];

        foreach($req['permissions'] as $permission){
            $permissions[] = Permission::find($permission)->name;
        }
        $user->syncPermissions($permissions);

        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Update Pengguna'
        ], 200);
    }

    public function delete_user(){
        $req = request()->all();

        $user = User::find($req['id'])->delete();

        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => 'Berhasil Hapus Pengguna'
        ], 200);
    }

    public function get_roles(){
        $roles = Role::with('permissions')->get();
        $response = [];

        $roles->each(function($data, $i) use (&$response){
            $response[$i]['name'] = $data['name'];
            $data_permissions = collect($data['permissions']);

            $data_permissions->each(function($permission, $j) use (&$response, &$i){
                $response[$i]['permissions'][$j] = $permission['name'];
            });
        });

        echo json_encode($response);
        exit;
    }

    public function get_role(){
        $req = request()->all();

        $roles = Role::with('permissions')->find($req['id_role'], ['id']);
        $data_permissions = collect($roles['permissions']);

        $data_permissions->each(function($permission, $i) use (&$roles){
            $roles['permissions'][$i] = $permission['id'];
        });

        echo json_encode($roles);
        exit;
    }

    public function get_permissions(){
        $permissions = Permission::with('roles')->get();
        $response = [];

        $permissions->each(function($data, $i) use (&$response){
            $response[$i]['id'] = $data['id'];
            $response[$i]['name'] = $data['name'];
        });

        echo json_encode($response);
        exit;
    }
}
