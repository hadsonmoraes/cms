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
                    Esqueceu sua senha? Informe seu e-mail para receber o link de recuperação.
                </p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
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

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Enviar link de recuperação
                            </button>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3 text-center">
                    <a href="{{ route('login') }}">
                        Voltar para login
                    </a>
                </p>

            </div>

        </div>

    </div>
@endsection
