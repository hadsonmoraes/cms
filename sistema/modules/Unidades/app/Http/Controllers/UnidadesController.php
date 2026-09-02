<?php

namespace Sistema\Unidades\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadesController extends Controller
{
    public function index()
    {
        return view('Sistema-Unidades::index', ['unidades' => Unidade::query()->orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Unidade::create($request->validate([
            'name' => ['required', 'string', 'max:120'],
            'code' => ['required', 'string', 'max:30', 'unique:unidades,code'],
            'city' => ['nullable', 'string', 'max:120'],
        ]));

        return back()->with('status', 'Unidade criada com sucesso.');
    }
}
