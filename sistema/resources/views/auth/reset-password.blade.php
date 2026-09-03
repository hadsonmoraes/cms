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
                    Defina sua nova senha
                </p>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
                            value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">

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
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nova senha"
                            required autocomplete="new-password">

                        <div class="input-group-text">
                            <span class="bi bi-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            placeholder="Confirmar nova senha" required autocomplete="new-password">

                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>

                    @error('password_confirmation')
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Redefinir senha
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection
