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
                    Obrigado por se cadastrar! Antes de continuar, valide seu e-mail clicando no link que enviamos para
                    você.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        Um novo link de verificação foi enviado para o e-mail cadastrado.
                    </div>
                @endif

                <div class="d-flex flex-column gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary w-100">
                            Reenviar e-mail de verificação
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-link w-100 text-decoration-none">
                            Sair
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
