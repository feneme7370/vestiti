<?php

namespace App\Http\Controllers\Fnm\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlagueController extends Controller
{
    public function index()
    {
        return view('sistem.config.plague.index', [
            'title' => 'Plagas'
        ]);
    }
}
