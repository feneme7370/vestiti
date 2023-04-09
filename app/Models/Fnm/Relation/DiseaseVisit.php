<?php

namespace App\Models\Fnm\Relation;

use App\Models\Fnm\Apiary;
use App\Models\Fnm\Disease;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiseaseVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'disease_id',
        'apiary_id',
        'disease_quantity',
        'company_id',
        'user_id'
    ];

    public function apiary(){
        return $this->belongsTo(Apiary::class, 'apiary_id', 'id');
    }
    public function disease(){
        return $this->belongsTo(Disease::class, 'disease_id', 'id');
    }
}
