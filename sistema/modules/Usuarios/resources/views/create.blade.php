@extends('sistema::layouts.admin', ['title' => 'Novo usuário'])

@section('content')
    <div class="card"><div class="card-header"><h5 class="mb-0">Cadastrar usuário</h5></div><div class="card-body">
        <form method="POST" action="{{ route('Sistema.Usuarios.store') }}">
            @csrf
            @include('Sistema-Usuarios::form')
        </form>
    </div></div>
@endsection
