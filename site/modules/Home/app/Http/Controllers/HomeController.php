<?php

namespace Site\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;

class HomeController extends Controller
{
    public function index()
    {
        return view('Site-Home::index', ['about' => AboutContent::first()]);
    }
}
