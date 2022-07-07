<?php

use App\ResearchType;
use Illuminate\Database\Seeder;

class ResearchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect([
            ['name' => 'Observasional'], ['name' => 'Intervensi'], ['name' => 'Uji Klinik']
        ]);
        
        $types->each(function($data){
            ResearchType::create($data);
        });
    }
}
