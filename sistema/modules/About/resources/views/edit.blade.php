@extends('sistema::layouts.admin', ['title' => 'Editar sobre nós'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Editar conteúdo institucional</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Sistema.About.update', $about) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('Sistema-About::form', ['about' => $about])
            </form>
        </div>
    </div>
@endsection
