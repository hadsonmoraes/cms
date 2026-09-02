@extends('sistema::layouts.admin', ['title' => 'Configurações'])

@section('breadcrumb')
    <li class="breadcrumb-item active">Configurações</li>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="card">
        <div class="card-header"><h5 class="mb-0">Preferências gerais</h5></div>
        <div class="card-body">
            <form method="POST" action="{{ route('Sistema.Configuracoes.update') }}" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="site_name" class="form-label">Nome do sistema</label>
                    <input id="site_name" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name']->value ?? '') }}" required>
                    @error('site_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="support_email" class="form-label">E-mail de suporte</label>
                    <input id="support_email" type="email" name="support_email" class="form-control" value="{{ old('support_email', $settings['support_email']->value ?? '') }}" required>
                    @error('support_email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="timezone" class="form-label">Fuso horário</label>
                    <select id="timezone" name="timezone" class="form-select" required>
                        @foreach (['America/Sao_Paulo' => 'São Paulo', 'America/Manaus' => 'Manaus', 'UTC' => 'UTC'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('timezone', $settings['timezone']->value ?? 'America/Sao_Paulo') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('timezone') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-12"><button class="btn btn-primary" type="submit">Salvar configurações</button></div>
            </form>
        </div>
    </div>
@endsection