<?php

namespace App\Http\Controllers\Fnm\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('sistem.config.medicine.index', [
            'title' => 'Medicinas'
        ]);
    }
}
