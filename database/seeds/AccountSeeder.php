<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = collect([
            ['name' => 'BRI', 'atas_nama' => "aziz",'number' => "12321211221", 'image' => null],
            ['name' => 'BNI', 'atas_nama' => "roni",'number' => "892212212", 'image' => null]
        ]);
        
        $accounts->each(function($data){
            Account::create($data);
        });
    }
}
