<?php

namespace App\Http\Controllers\Fnm;

use App\Http\Controllers\Controller;
use App\Models\Fnm\Apiary;
use Illuminate\Http\Request;

class ApiaryController extends Controller
{
    public function index()
    {
        return view('sistem.apiary.index', [
            'title' => 'Apiarios'
        ]);
    }
    public function create()
    {
        return view('sistem.apiary.create', [
            'title' => 'Apiario'
        ]);
    }
    public function edit(Apiary $apiario)
    {
        return view('sistem.apiary.edit', [
            'title' => 'Apiario',
            'apiary' => $apiario
        ]);
    }
    public function show(Apiary $apiario)
    {
        return view('sistem.apiary.show', [
            'title' => 'Apiario',
            'apiary' => $apiario
        ]);
    }
}
