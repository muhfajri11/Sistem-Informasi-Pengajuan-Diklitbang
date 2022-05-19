<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(['masteradmin', 'penelitian', 'pendidikan', 'user']);

        $roles->each(function($data){
            $role = Role::create([
                'name'          => $data,
                'guard_name'    => 'web'
            ]);

            switch($data){
                case 'masteradmin':
                    $role->givePermissionTo(['pendidikan', 'penelitian', 'user']);
                    break;
                case 'penelitian':
                    $role->givePermissionTo(['penelitian']);
                    break;
                case 'pendidikan':
                    $role->givePermissionTo(['penelitian']);
                    break;
                case 'user':
                    $role->givePermissionTo(['user']);
                    break;
            }
        });
    }
}
