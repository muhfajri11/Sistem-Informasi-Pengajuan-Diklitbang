<?php

use App\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = collect([
            [ 'name'  => 'IT Telkom Purwokerto' ],
            [ 'name'  => 'Universitas Gunung Jati' ],
            [ 'name'  => 'Rumah Sakit Plumbon' ]
        ]);

        $institutions->each(function($data){
            Institution::create($data);
        });
    }
}
