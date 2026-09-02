<?php

namespace Sistema\About\Http\Controllers;

use App\Models\AboutContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return view('Sistema-About::index', ['about' => AboutContent::query()->first()]);
    }

    public function create()
    {
        return view('Sistema-About::create');
    }

    public function store(Request $request): RedirectResponse
    {
        $about = AboutContent::query()->first();

        if ($about) {
            return redirect()->route('Sistema.About.edit', $about);
        }

        AboutContent::create($this->validatedData($request));

        return redirect()->route('Sistema.About.index')->with('status', 'Conteúdo institucional criado com sucesso.');
    }

    public function edit(AboutContent $about)
    {
        return view('Sistema-About::edit', compact('about'));
    }

    public function update(Request $request, AboutContent $about): RedirectResponse
    {
        $data = $this->validatedData($request);

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
        } else {
            unset($data['image']);
        }

        $about->update($data);

        return redirect()->route('Sistema.About.index')->with('status', 'Conteúdo institucional atualizado com sucesso.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'summary' => ['nullable', 'string', 'max:500'],
            'text' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'values' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
        }

        return $data;
    }
}
