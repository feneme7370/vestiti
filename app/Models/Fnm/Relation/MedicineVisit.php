<?php

namespace App\Models\Fnm\Relation;

use App\Models\Fnm\Apiary;
use App\Models\Fnm\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'medicine_id',
        'apiary_id',
        'medicine_quantity',
        'company_id',
        'user_id'
    ];

    public function apiary(){
        return $this->belongsTo(Apiary::class, 'apiary_id', 'id');
    }
    public function medicine(){
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');
    }
}
