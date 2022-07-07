<?php

use App\ResearchFee;
use Illuminate\Database\Seeder;

class ResearchFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = collect([
            ['user_id' => 1, 'research_type_id' => 1, 'origin_proposer_id' => 1, 
                'institution_proposer_id' => 1, 'status_proposer_id' => 1, 
                'education_level_id' => 1, 'fee' => 300000]
        ]);
        
        $fees->each(function($data){
            ResearchFee::create($data);
        });
    }
}
