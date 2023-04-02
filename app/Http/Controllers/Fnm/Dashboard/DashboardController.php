<?php

namespace App\Http\Controllers\Fnm\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('sistem.dashboard.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
