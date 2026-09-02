<?php

namespace Sistema\Usuarios\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsuariosController extends Controller
{
    public function index()
    {
        return view('Sistema-Usuarios::index', ['users' => User::query()->with('moduleAccesses')->latest()->get()]);
    }

    public function create()
    {
        return view('Sistema-Usuarios::create', ['modules' => $this->modules()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::create($this->validatedData($request));
        $user->moduleAccesses()->createMany($this->moduleRows($request));

        return redirect()->route('Sistema.Usuarios.index')->with('status', 'Usuário criado com sucesso.');
    }

    public function edit(User $user)
    {
        return view('Sistema-Usuarios::edit', [
            'user' => $user->load('moduleAccesses'),
            'modules' => $this->modules(),
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($this->validatedData($request, $user));
        $user->moduleAccesses()->delete();
        $user->moduleAccesses()->createMany($this->moduleRows($request));

        return redirect()->route('Sistema.Usuarios.index')->with('status', 'Usuário atualizado com sucesso.');
    }

    private function validatedData(Request $request, ?User $user = null): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . ($user?->id ?? 'NULL')],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($user && blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        return $data;
    }

    private function moduleRows(Request $request): array
    {
        return collect($request->input('modules', []))
            ->filter(fn($module) => in_array($module, $this->modules(), true))
            ->map(fn($module) => ['module' => $module])
            ->values()
            ->all();
    }

    private function modules(): array
    {
        return collect(File::directories(base_path('sistema/modules')))
            ->map(fn($path) => basename($path))
            ->sort()
            ->values()
            ->all();
    }
}
