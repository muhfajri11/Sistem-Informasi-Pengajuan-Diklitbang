<?php

use App\OriginProposer;
use Illuminate\Database\Seeder;

class OriginProposerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origins = collect([
            ['name' => 'Internal'], ['name' => 'Eksternal']
        ]);
        
        $origins->each(function($data){
            OriginProposer::create($data);
        });
    }
}
