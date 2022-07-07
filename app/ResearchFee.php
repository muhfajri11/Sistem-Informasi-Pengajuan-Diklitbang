<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchFee extends Model
{
    protected $fillable = ['user_id', 'research_type_id', 'origin_proposer_id',
        'institution_proposer_id', 'status_proposer_id', 'education_level_id', 'fee'];
    
    public function research_type(){
        return $this->belongsTo(ResearchType::class);
    }
    
    public function origin_proposer(){
        return $this->belongsTo(OriginProposer::class);
    }

    public function institution_proposer(){
        return $this->belongsTo(InstitutionProposer::class);
    }

    public function status_proposer(){
        return $this->belongsTo(StatusProposer::class);
    }

    public function education_level(){
        return $this->belongsTo(EducationLevel::class);
    }
}
