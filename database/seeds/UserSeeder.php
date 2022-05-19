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
                'name'      => 'Master Admin',
                'phone'     => '12345612',
                'email'     => 'master@test.com',
                'password'  => bcrypt('12341234')
            ],
            [
                'name'      => 'Admin Pendidikan',
                'phone'     => '32141234',
                'email'     => 'pendidikan@test.com',
                'password'  => bcrypt('12341234')
            ],
            [
                'name'      => 'Admin Penelitian',
                'phone'     => '098760981',
                'email'     => 'penelitian@test.com',
                'password'  => bcrypt('12341234')
            ],
            [
                'name'      => 'User Example',
                'phone'     => '123456789',
                'email'     => 'example@test.com',
                'password'  => bcrypt('12341234')
            ]
        ]);

        $users->each(function($data){
            $user = User::create($data);

            switch($data['email']){
                case "master@test.com":
                    $user->assignRole('masteradmin');
                    break;
                case "pendidikan@test.com":
                    $user->assignRole('pendidikan');
                    break;
                case "penelitian@test.com":
                    $user->assignRole('penelitian');
                    break;
                case "example@test.com":
                    $user->assignRole('user');
                    break;
            }
        });
    }
}
