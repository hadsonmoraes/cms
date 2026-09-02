@extends('sistema::layouts.guest')

@section('content')
    <div class="register-box">

        <div class="card card-outline card-primary">

            <div class="card-header text-center">

                <a href="{{ url('/') }}" class="h1">
                    <b>Meu</b> CMS
                </a>

            </div>

            <div class="card-body">

                <p class="register-box-msg">
                    Cadastre-se para acessar o sistema
                </p>

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    {{-- Nome --}}
                    <div class="input-group mb-3">

                        <input type="text" name="name" class="form-control" placeholder="Nome"
                            value="{{ old('name') }}" required autofocus autocomplete="name">

                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>

                    </div>

                    @error('name')
                        <div class="text-danger small mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    {{-- E-mail --}}
                    <div class="input-group mb-3">

                        <input type="email" name="email" class="form-control" placeholder="E-mail"
                            value="{{ old('email') }}" required autocomplete="username">

                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>

                    </div>

                    @error('email')
                        <div class="text-danger small mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    {{-- Senha --}}
                    <div class="input-group mb-3">

                        <input type="password" name="password" class="form-control" placeholder="Senha" required
                            autocomplete="new-password">

                        <div class="input-group-text">
                            <span class="bi bi-lock"></span>
                        </div>

                    </div>

                    @error('password')
                        <div class="text-danger small mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    {{-- Confirmar senha --}}
                    <div class="input-group mb-3">

                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmar senha" required autocomplete="new-password">

                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>

                    </div>

                    @error('password_confirmation')
                        <div class="text-danger small mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    {{-- Botão --}}
                    <div class="row">

                        <div class="col-12">

                            <button type="submit" class="btn btn-primary w-100">

                                Criar conta

                            </button>

                        </div>

                    </div>

                </form>


                <p class="mb-0 mt-3 text-center">

                    <a href="{{ route('login') }}">

                        Já tenho uma conta

                    </a>

                </p>

            </div>

        </div>

    </div>
@endsection
