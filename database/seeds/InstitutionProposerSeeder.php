<?php

use App\InstitutionProposer;
use Illuminate\Database\Seeder;

class InstitutionProposerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = collect([
            ['name' => 'Pendidikan'], ['name' => 'Rumah Sakit'], ['name' => 'Litbang']
        ]);
        
        $institutions->each(function($data){
            InstitutionProposer::create($data);
        });
    }
}
