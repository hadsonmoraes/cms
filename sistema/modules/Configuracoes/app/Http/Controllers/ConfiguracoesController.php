<?php

namespace Sistema\Configuracoes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\SystemSetting;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        $settings = SystemSetting::query()->orderBy('key')->get()->keyBy('key');

        return view('Sistema-Configuracoes::index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:120'],
            'support_email' => ['required', 'email', 'max:255'],
            'timezone' => ['required', 'timezone'],
        ]);

        foreach ($data as $key => $value) {
            SystemSetting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text']);
        }

        return back()->with('status', 'Configurações salvas com sucesso.');
    }
}
