<?php

use App\TypeInternship;
use Illuminate\Database\Seeder;

class TypeInternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect([
            ['name' => 'Medis', 'fee' => 20000],
            ['name' => 'Keperawatan','fee' => 31000],
            ['name' => 'Kebidanan','fee' => 22000],
            ['name' => 'Tenaga Kesehatan','fee' => 15000],
            ['name' => 'Umum','fee' => 30000],
        ]);
        
        $types->each(function($data){
            TypeInternship::create($data);
        });
    }
}
