<?php

namespace App\Http\Controllers\Fnm\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        return view('sistem.config.disease.index', [
            'title' => 'Enfermedades'
        ]);
    }
}
