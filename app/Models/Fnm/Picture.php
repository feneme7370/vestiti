<?php

namespace App\Models\Fnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'status',
        'company_id',
        'user_id'
    ];
}
