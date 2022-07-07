<?php

namespace App\Http\Controllers;

use App\{Comparative, Institution, Internship, Message, Room, Setting, User};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\{Permission, Role};

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $intern = [
            'all'       => count(Internship::all()),
            'accept'    => count(Internship::where('status', 'accept')->get()),
        ];

        $comparative = [
            'all'       => count(Comparative::all()),
            'accept'    => count(Comparative::where('status', 'accept')->get()),
        ];

        $institutions = Institution::all();
        $rooms = Room::all();

        $intern['presentase'] = $intern['all'] > 0?($intern['accept']/$intern['all']) * 100 : 0;
        $comparative['presentase'] = $comparative['all'] > 0?($comparative['accept']/$comparative['all']) * 100 : 0;

        $max_intern = Setting::byName(['kuota']);
        $max_intern = $max_intern->value->internship;

        $data = [
            'internship'    => $intern,
            'comparative'   => $comparative,
            'institutions'   => count($institutions),
            'rooms'          => count($rooms),
            'kuota_pkl'     => $max_intern
        ];

        if(!auth()->user()->hasRole('user')){
            $msg = Message::with('user')->get();

            $msg->each(function($data){
                switch($data['from']){
                    case "internship":
                        $data->table = Internship::find($data['table_id']);
                        $data->from = "Praktek Kerja Lapangan";
                    break;
                    case "comparative":
                        $data->table = Comparative::find($data['table_id']);
                        $data->from = "Studi Banding";
                    break;
                }
            });

            $data['message'] = $msg;
        }

        return view('dashboard.index', compact('data'));
    }

    public function manage_role(){
        $roles = Role::get();
        $permissions = Permission::get();

        return view('dashboard.masteradmin.manageroles', compact('roles', 'permissions'));
    }

    public function get_users(){
        // for datatables
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
        if(!$user){
            return response()->json([
                'success' => false,
                'msg'     => 'User tidak terdaftar!'
            ], 200);
        }

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

        return response()->json(['success' => true], 200);
        // echo json_encode($response);
        // exit;
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
        //for datatables
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
        if(!$roles){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }

        $data_permissions = collect($roles['permissions']);

        $data_permissions->each(function($permission, $i) use (&$roles){
            $roles['permissions'][$i] = $permission['id'];
        });

        return response()->json(['success' => true], 200);
    }

    public function get_permissions(){
        $permissions = Permission::with('roles')->get();
        if(!$permissions){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan'
            ], 200);
        }
        $response = [];

        $permissions->each(function($data, $i) use (&$response){
            $response[$i]['id'] = $data['id'];
            $response[$i]['name'] = $data['name'];
        });

        return response()->json(['success' => true], 200);
        // echo json_encode($response);
        // exit;
    }

    public function get_institutions(){
        $institutions = Institution::get(['id', 'name']);

        if(!$institutions){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan!'
            ], 200);   
        }

        return response()->json([
            'success' => true,
            'get'     => $institutions
        ], 200);   
    }

    public function get_institutionroom(){
        $rooms = Room::get(['id', 'name']);
        $institutions = Institution::get(['id', 'name']);

        $data = ['rooms' => $rooms, 'institutions' => $institutions];

        if(!$rooms){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan data room'
            ], 200);   
        }

        if(!$institutions){
            return response()->json([
                'success' => false,
                'msg'     => 'Terjadi Kesalahan data institution'
            ], 200);   
        }

        return response()->json([
            'success' => true,
            'get'    => $data
        ], 200);
    }

    public function get_messages($admin = null){
        $data = $admin ? Message::with('user')->get() : auth()->user()->messages;

        if(!$data){
            return response()->json([
                'success' => false,
                'msg'     => "Terjadi Kesalahan"
            ], 200);
        }
        
        return response()->json([
            'success' => true,
            'get'     => $data
        ], 200);
    }

    public function read_message(Request $request, $get = null){
        $update = Message::find($request->id)->update(['is_read' => 1]);

        if(!$update){
            return response()->json([
                'success' => false,
                'msg'     => "Terjadi Kesalahan"
            ], 200);
        }

        if($get){
            $msg = Message::with('user')->find($request->id);
            switch($msg->from){
                case "internship":
                    $msg->internship = Internship::with('institution')->find($msg->table_id);
                break;
                case "comparative":
                    $msg->comparative = Comparative::with('institution')->find($msg->table_id);
                break;
            }
            $data = ['success' => true, 'msg' => "Berhasil membaca pesan", 'get' => $msg];
        } else {
            $data = ['success' => true,'msg' => "Berhasil membaca pesan"];
        }
        
        return response()->json($data, 200);
    }

    public function delete_message(Request $request, $msg_id = null){
        if($msg_id){
            $delete = Message::where('id', $msg_id)->delete();
            $data = ['success' => true,'msg' => "Berhasil menghapus pesan"];
        } else {
            $delete = Message::where('user_id', auth()->user()->id)->delete();
            $data = ['success' => true,'msg' => "Berhasil menghapus semua pesan"];
        }

        if(!$delete){
            return response()->json([
                'success' => false,
                'msg'     => "Terjadi Kesalahan"
            ], 200);
        }

        return response()->json($data, 200);
    }

    public function delete_msgall(){
        $delete = Message::truncate();

        if(!$delete){
            return response()->json([
                'success' => false,
                'msg'     => "Terjadi Kesalahan"
            ], 200);
        }

        return response()->json([
            'success' => true,
            'msg'     => "Berhasil menghapus semua pesan"
        ], 200);
    }

}
