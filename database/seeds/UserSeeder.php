<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'name'                  => 'Master Admin',
                'phone'                 => '12345612',
                'email'                 => 'master@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'              => bcrypt('12341234')
            ],
            [
                'name'                  => 'Master Admin 2',
                'phone'                 => '12345612',
                'email'                 => 'master2@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'              => bcrypt('12341234')
            ],
            [
                'name'      => 'Admin Pendidikan',
                'phone'     => '32141234',
                'email'     => 'pendidikan@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'  => bcrypt('12341234')
            ],
            [
                'name'      => 'Admin Penelitian',
                'phone'     => '098760981',
                'email'     => 'penelitian@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'  => bcrypt('12341234')
            ],
            [
                'name'                  => 'Admin Penelitian 2',
                'phone'                 => '12345612',
                'email'                 => 'penelitian2@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'              => bcrypt('12341234')
            ],
            [
                'name'      => 'User Example',
                'phone'     => '123456789',
                'email'     => 'example@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'  => bcrypt('12341234')
            ],
            [
                'name'      => 'Muhamad Fajri',
                'phone'     => '123456789',
                'email'     => 'fajri@test.com',
                'email_verified_at'     => date('Y-m-d h:i:s'),
                'password'  => bcrypt('12341234')
            ]
        ]);

        $users->each(function($data){
            $user = User::create($data);

            switch($data['email']){
                case "master@test.com":
                case "master2@test.com":
                    $user->assignRole('masteradmin');
                    break;
                case "pendidikan@test.com":
                    $user->assignRole('pendidikan');
                    break;
                case "penelitian@test.com":
                case "penelitian2@test.com":
                    $user->assignRole('penelitian');
                    break;
                case "example@test.com":
                case "fajri@test.com":
                    $user->assignRole('user');
                    break;
            }
        });
    }
}
