<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchEthic extends Model
{
    protected $fillable = [
        'user_id', 'research_id', 'research_type_id', 'origin_proposer_id', 
        'institution_proposer_id', 'status_proposer_id', 'research_fee_id',
        'sumber_dana', 'total_dana', 'kerjasama', 'jumlah_negara', 'peneliti_asing',
        'is_multisenter', 'tempat_multisenter', 'acc_multisenter', 'status', 'paid',
        'surat_pengantar', 'eviden_paid'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function research(){
        return $this->belongsTo(Research::class);
    }

    public function protocol(){
        return $this->hasOne(Protocol::class);
    }

    public function self_assesment(){
        return $this->hasOne(SelfAssesment::class);
    }

    public function result_reviews(){
        return $this->hasMany(ResultReview::class);
    }

    public function fullboards(){
        return $this->hasMany(Fullboard::class);
    }

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

    public function research_fee(){
        return $this->belongsTo(ResearchFee::class);
    }
}
