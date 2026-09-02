@extends('sistema::layouts.guest')

@section('content')
    <div class="login-box">

        <div class="card card-outline card-primary">

            <div class="card-header text-center">

                <a href="{{ url('/') }}" class="h1">
                    <b>Meu</b> CMS
                </a>

            </div>

            <div class="card-body">

                <p class="login-box-msg">
                    Entre para iniciar sua sessão
                </p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="input-group mb-3">

                        <input type="email" name="email" class="form-control" placeholder="E-mail"
                            value="{{ old('email') }}" required autofocus>

                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>

                    </div>

                    @error('email')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="input-group mb-3">

                        <input type="password" name="password" class="form-control" placeholder="Senha" required>

                        <div class="input-group-text">
                            <span class="bi bi-lock"></span>
                        </div>

                    </div>

                    @error('password')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="row">

                        <div class="col-8">

                            <div class="form-check">

                                <input type="checkbox" name="remember" class="form-check-input" id="remember">

                                <label class="form-check-label" for="remember">

                                    Lembrar de mim

                                </label>

                            </div>

                        </div>

                        <div class="col-4">

                            <button type="submit" class="btn btn-primary w-100">

                                Entrar

                            </button>

                        </div>

                    </div>

                </form>


                @if (Route::has('password.request'))
                    <p class="mb-1 mt-3">

                        <a href="{{ route('password.request') }}">
                            Esqueci minha senha
                        </a>

                    </p>
                @endif


                @if (Route::has('register'))
                    <p class="mb-0">

                        <a href="{{ route('register') }}" class="text-center">

                            Criar uma conta

                        </a>

                    </p>
                @endif

            </div>

        </div>

    </div>
@endsection
