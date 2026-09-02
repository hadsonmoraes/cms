<?php

namespace Sistema\Lgpd\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LgpdConsent;

class LgpdController extends Controller
{
    public function index()
    {
        return view('Sistema-Lgpd::index', ['consents' => LgpdConsent::with('user')->latest()->get()]);
    }
}
