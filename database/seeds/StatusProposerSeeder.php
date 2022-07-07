<?php

use App\StatusProposer;
use Illuminate\Database\Seeder;

class StatusProposerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = collect([
            ['name' => 'Mahasiswa'], ['name' => 'Dosen'],
            ['name' => 'Pelaksana Layanan'], ['name' => 'Peneliti']
        ]);
        
        $status->each(function($data){
            StatusProposer::create($data);
        });
    }
}
