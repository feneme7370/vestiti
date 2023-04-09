<?php

namespace App\Http\Controllers\Fnm\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Fnm\Apiary;
use App\Models\Fnm\Relation\DiseaseVisit;
use App\Models\Fnm\Visit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $last_visits = Visit::where('company_id', auth()->user()->id)->orderBy('date', 'DESC')->take('5')->get();
        $apiaries = Apiary::where('company_id', auth()->user()->id);
        $diseases = DiseaseVisit::where('company_id', auth()->user()->id)->get()->sum('disease_quantity');
        $apiaries;
        // dd($apiaries);
        $hives = Apiary::where('company_id', auth()->user()->id)->sum('hive');
        return view('sistem.dashboard.dashboard', [
            'title' => 'Dashboard',
            'last_visits' => $last_visits,
            'apiaries' => $apiaries,
            'hives' => $hives,
            'diseases' => $diseases
        ]);
    }
}
