@extends('sistema::layouts.admin', ['title' => 'Sobre nós'])

@section('title', 'Cadastrar')

@section('content')

    <div class="card">

        <div class="card-header">
            {{-- <h3 class="card-title">
                Sobre nós
            </h3> --}}
            @if ($about)
                <a href="{{ route('Sistema.About.edit', $about) }}" class="btn btn-primary">Editar conteúdo</a>
            @else
                <a href="{{ route('Sistema.About.create') }}" class="btn btn-primary">Cadastrar conteúdo</a>
            @endif
        </div>

        <div class="card-body">

            @if ($about)
                <h2>{{ $about->title }}</h2>
                @if ($about->summary)
                    <p class="lead">{{ $about->summary }}</p>
                @endif
                <dl class="row mb-0">
                    <dt class="col-sm-3">Missão</dt>
                    <dd class="col-sm-9">{{ $about->mission ?: '-' }}</dd>
                    <dt class="col-sm-3">Visão</dt>
                    <dd class="col-sm-9">{{ $about->vision ?: '-' }}</dd>
                    <dt class="col-sm-3">Valores</dt>
                    <dd class="col-sm-9">{{ $about->values ?: '-' }}</dd>
                </dl>
            @else
                <p class="mb-0 text-muted">Nenhum conteúdo institucional cadastrado.</p>
            @endif

        </div>

    </div>

@endsection
