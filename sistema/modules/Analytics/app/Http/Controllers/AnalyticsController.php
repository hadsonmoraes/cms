<?php

namespace Sistema\Analytics\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Unidade;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view('Sistema-Analytics::index', [
            'users' => User::count(),
            'units' => Unidade::count(),
            'activeUnits' => Unidade::where('active', true)->count(),
        ]);
    }
}
