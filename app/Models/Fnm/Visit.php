<?php

namespace App\Models\Fnm;

use App\Models\Fnm\Relation\DiseaseVisit;
use App\Models\Fnm\Relation\MedicineVisit;
use App\Models\Fnm\Relation\PlagueVisit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'date',
        'apiary_id',
        'campaign_id',
        'type_visit_id',
        'amount',
        'description',
        'remember',
        'status',
        'company_id',
        'user_id'
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
    public function apiary(){
        return $this->belongsTo(Apiary::class, 'apiary_id', 'id');
    }
    public function type_visit(){
        return $this->belongsTo(TypeVisit::class, 'type_visit_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    // traer las enfermedades de una visita
    public function diseaseVisits(){
        return $this->hasMany(DiseaseVisit::class, 'visit_id', 'id');
    }
    public function plagueVisits(){
        return $this->hasMany(PlagueVisit::class, 'visit_id', 'id');
    }
    public function medicineVisits(){
        return $this->hasMany(MedicineVisit::class, 'visit_id', 'id');
    }
}
