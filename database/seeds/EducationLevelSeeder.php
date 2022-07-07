<?php

use App\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = collect([
            ['name' => 'Diploma 3', 'fee' => 21000],
            ['name' => 'Diploma 4', 'fee' => 23000],
            ['name' => 'Strata 1','fee' => 32000],
            ['name' => 'Strata 2','fee' => 34000],
            ['name' => 'Strata 3','fee' => 35000],
            ['name' => 'Spesialis 1','fee' => 22000],
            ['name' => 'Spesialis 2','fee' => 27000]
        ]);
        
        $educations->each(function($data){
            EducationLevel::create($data);
        });
    }
}
