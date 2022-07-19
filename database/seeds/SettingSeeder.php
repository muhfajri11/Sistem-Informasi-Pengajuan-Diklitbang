<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = collect([
            [
                'user_id'   => 1,
                'name'      => 'kuota',
                'value'     => ['internship' => 10]
            ],
            [
                'user_id'   => 1,
                'name'      => 'fee',
                'value'     => [
                    'comparative' => ['kurang_dari' => 300000, 'lebih_dari' => 240000],
                    'internship'  => ['mou' => 150000, 'no_mou' => 300000],
                    'research'  => 300000
                ]
            ],
        ]);
        
        $settings->each(function($data){
            $data['value'] = json_encode($data['value']);

            Setting::create($data);
        });
    }
}
