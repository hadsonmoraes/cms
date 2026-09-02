<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ $about->title ?? 'Sobre nós' }}</title>
</head>

<body>

    @if ($about)
        <h1>{{ $about->title }}</h1>
        @if ($about->image)
            <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}"
                style="max-width: 100%; height: auto;">
        @endif
        @if ($about->summary)
            <p>{{ $about->summary }}</p>
        @endif
        @if ($about->text)
            <div>{!! nl2br(e($about->text)) !!}</div>
        @endif
        <h2>Missão</h2>
        <p>{!! nl2br(e($about->mission)) !!}</p>
        <h2>Visão</h2>
        <p>{!! nl2br(e($about->vision)) !!}</p>
        <h2>Valores</h2>
        <p>{!! nl2br(e($about->values)) !!}</p>
    @endif

</body>

</html>
