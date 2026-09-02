<div class="row g-3">
    <div class="col-12"><label for="title" class="form-label">Título</label><input id="title" name="title"
            class="form-control" value="{{ old('title', $about->title ?? '') }}" required>
        @error('title')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12"><label for="summary" class="form-label">Resumo</label>
        <textarea id="summary" name="summary" class="form-control" rows="2">{{ old('summary', $about->summary ?? '') }}</textarea>
        @error('summary')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12"><label for="text" class="form-label">Texto</label>
        <textarea id="text" name="text" class="form-control" rows="6">{{ old('text', $about->text ?? '') }}</textarea>
        @error('text')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4"><label for="mission" class="form-label">Missão</label>
        <textarea id="mission" name="mission" class="form-control" rows="5">{{ old('mission', $about->mission ?? '') }}</textarea>
    </div>
    <div class="col-md-4"><label for="vision" class="form-label">Visão</label>
        <textarea id="vision" name="vision" class="form-control" rows="5">{{ old('vision', $about->vision ?? '') }}</textarea>
    </div>
    <div class="col-md-4"><label for="values" class="form-label">Valores</label>
        <textarea id="values" name="values" class="form-control" rows="5">{{ old('values', $about->values ?? '') }}</textarea>
    </div>
    <div class="col-12"><label for="image" class="form-label">Imagem</label><input id="image" name="image"
            type="file" accept="image/*" class="form-control">
        @if (!empty($about?->image))
            <div class="form-text">Imagem atual: {{ basename($about->image) }}</div>
        @endif @error('image')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
<div class="col-12"><button class="btn btn-primary" type="submit">Salvar conteúdo</button><a
        href="{{ route('Sistema.About.index') }}" class="btn btn-link">Cancelar</a></div>
</div>
