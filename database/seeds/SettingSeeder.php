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
                'name'      => 'rekening',
                'value'     => [
                    ['name' => 'BRI', 'number' => "123-21211-221", 'image' => null],
                    ['name' => 'BNI', 'number' => "8922-1221-2", 'image' => null]
                ]
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
            [
                'user_id'   => 1,
                'name'      => 'tipe_internship',
                'value'     => [
                    ['name' => 'Medis', 'fee' => 20000],
                    ['name' => 'Keperawatan','fee' => 30000],
                    ['name' => 'Kebidanan','fee' => 20000],
                    ['name' => 'Tenaga Kesehatan','fee' => 10000],
                    ['name' => 'Umum','fee' => 30000],
                ]
            ],
            [
                'user_id'   => 1,
                'name'      => 'jenjang_pendidikan',
                'value'     => [
                    ['name' => 'Diploma 3', 'fee' => 20000],
                    ['name' => 'Strata 1','fee' => 30000],
                    ['name' => 'Strata 2','fee' => 30000],
                    ['name' => 'Profesi','fee' => 20000],
                ]
            ],
        ]);
        
        $settings->each(function($data){
            $data['value'] = json_encode($data['value']);

            Setting::create($data);
        });
    }
}
