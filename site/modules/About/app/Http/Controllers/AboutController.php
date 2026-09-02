<?php

namespace Site\About\Http\Controllers;

use App\Models\AboutContent;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('Site-About::index', ['about' => AboutContent::query()->first()]);
    }
}
