<?php

namespace App\Http\Controllers\Fnm\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return view('sistem.config.campaign.index', [
            'title' => 'Cosechas'
        ]);
    }
}
