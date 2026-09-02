@extends('sistema::layouts.admin', ['title' => 'Usuários'])

@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Usuários cadastrados</h5><a href="{{ route('Sistema.Usuarios.create') }}"
                class="btn btn-primary">Novo usuário</a>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>Módulos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role === 'admin' ? 'Administrador' : 'Usuário' }}</td>
                            <td>{{ $user->status === 'active' ? 'Ativo' : 'Inativo' }}</td>
                            <td>{{ $user->role === 'admin' ? 'Todos' : ($user->moduleAccesses->pluck('module')->join(', ') ?: 'Nenhum') }}
                            </td>
                            <td><a href="{{ route('Sistema.Usuarios.edit', $user) }}"
                                    class="btn btn-sm btn-outline-primary">Editar</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">Nenhum usuário cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
