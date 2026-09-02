@extends('site::layouts.app')

@section('title', $about->title ?? 'Início')

@section('content')
    <main>
        <section class="home-hero">
            <div class="site-container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">Quem somos</p>
                    <h1>{{ $about->title ?? 'Ideias que ganham forma.' }}</h1>
                    <p class="hero-summary">
                        {{ $about->summary ?? 'Uma presença digital feita para comunicar o que importa com clareza, personalidade e propósito.' }}
                    </p>
                    <a class="hero-link" href="{{ route('Site.About.index') }}">Conheça nossa história <span
                            aria-hidden="true">↗</span></a>
                </div>
                <div class="hero-visual">
                    @if ($about?->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}">
                    @else
                        <div class="visual-fallback"><span>propósito</span><strong>em movimento</strong><i></i></div>
                    @endif
                </div>
            </div>
        </section>

        @if ($about)
            <section class="home-intro site-container">
                <div class="section-label">01 <span>Sobre nós</span></div>
                <div class="intro-content">
                    <h2>{{ $about->title }}</h2>
                    <div class="intro-text">{!! nl2br(e($about->text ?: $about->summary)) !!}</div>
                </div>
            </section>
            <section class="principles site-container" aria-label="Nossos princípios">
                <div class="section-label">02 <span>O que nos guia</span></div>
                <div class="principles-grid">
                    <article><span class="principle-number">01</span>
                        <h3>Missão</h3>
                        <p>{!! nl2br(e($about->mission ?: 'Construir valor com consistência.')) !!}</p>
                    </article>
                    <article><span class="principle-number">02</span>
                        <h3>Visão</h3>
                        <p>{!! nl2br(e($about->vision ?: 'Avançar sempre com intenção.')) !!}</p>
                    </article>
                    <article><span class="principle-number">03</span>
                        <h3>Valores</h3>
                        <p>{!! nl2br(e($about->values ?: 'Clareza, respeito e compromisso.')) !!}</p>
                    </article>
                </div>
            </section>
        @endif
    </main>
@endsection
