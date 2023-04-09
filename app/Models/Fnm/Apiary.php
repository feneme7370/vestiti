<?php

namespace App\Models\Fnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'location',
        'hive',
        'description',
        'status',
        'company_id',
        'user_id'
    ];

    public function visits(){
        return $this->hasMany(Visit::class, 'apiary_id', 'id');
    }
}
