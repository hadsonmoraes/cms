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
                    Esta é uma área segura do sistema. Confirme sua senha para continuar.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Senha"
                            required autocomplete="current-password">

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
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Confirmar
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
