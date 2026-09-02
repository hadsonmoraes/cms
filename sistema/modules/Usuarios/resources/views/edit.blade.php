@extends('sistema::layouts.admin', ['title' => 'Editar usuário'])

@section('content')
    <div class="card"><div class="card-header"><h5 class="mb-0">Editar usuário</h5></div><div class="card-body">
        <form method="POST" action="{{ route('Sistema.Usuarios.update', $user) }}">
            @csrf @method('PUT')
            @include('Sistema-Usuarios::form', ['user' => $user])
        </form>
    </div></div>
@endsection
