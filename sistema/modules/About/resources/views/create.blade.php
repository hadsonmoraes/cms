@extends('sistema::layouts.admin', ['title' => 'Cadastrar sobre nós'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Cadastrar conteúdo institucional</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Sistema.About.store') }}" enctype="multipart/form-data">
                @csrf
                @include('Sistema-About::form')
            </form>
        </div>
    </div>
@endsection
