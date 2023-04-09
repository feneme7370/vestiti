<?php

namespace App\Models\Fnm\Relation;

use App\Models\Fnm\Apiary;
use App\Models\Fnm\Plague;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlagueVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'plague_id',
        'apiary_id',
        'plague_quantity',
        'company_id',
        'user_id'
    ];

    public function apiary(){
        return $this->belongsTo(Apiary::class, 'apiary_id', 'id');
    }
    public function plague(){
        return $this->belongsTo(Plague::class, 'plague_id', 'id');
    }
}
