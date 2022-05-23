<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect(['master', 'pendidikan', 'penelitian', 'user']);

        $permissions->each(function($data){
            Permission::create([
                'name'          => $data,
                'guard_name'    => 'web'
            ]);
        });
    }
}
