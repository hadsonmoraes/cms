<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'CMS' }}</title>

    @vite(['sistema/resources/css/admin.css', 'sistema/resources/js/admin.js'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        {{-- Navbar --}}
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">

                {{-- Menu --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>

                {{-- Direita --}}
                <ul class="navbar-nav ms-auto">

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bell"></i>
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="bd-theme" aria-label="Toggle color scheme"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
                            <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
                            <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme">
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light" aria-pressed="false">
                                    <i class="bi bi-sun-fill me-2"></i>
                                    Light
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark" aria-pressed="false">
                                    <i class="bi bi-moon-fill me-2"></i>
                                    Dark
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto" aria-pressed="true">
                                    <i class="bi bi-circle-half me-2"></i>
                                    Auto
                                    <i class="bi bi-check-lg ms-auto d-none"></i>
                                </button>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">

                            {{ auth()->user()->name ?? 'Usuário' }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <a class="dropdown-item" href="{{ route('sistema::profile.edit') }}">
                                    Perfil
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>

                                <form method="POST" action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit" class="dropdown-item">

                                        Sair

                                    </button>

                                </form>

                            </li>

                        </ul>

                    </li>

                </ul>

            </div>
        </nav>


        {{-- Sidebar --}}
        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">

            {{-- Logo --}}
            <div class="sidebar-brand">

                <a href="{{ url('/dashboard') }}" class="brand-link">

                    <span class="brand-text fw-light">
                        Meu CMS
                    </span>

                </a>

            </div>


            {{-- Menu --}}
            <div class="sidebar-wrapper">

                <nav class="mt-2">

                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'About')->exists())
                            <li class="nav-item">

                                <a href="{{ url('/dashboard') }}" class="nav-link">

                                    <i class="nav-icon bi bi-speedometer"></i>

                                    <p>
                                        Dashboard
                                    </p>

                                </a>

                            </li>


                            <li class="nav-item">

                                <a href="{{ route('Sistema.About.index') }}" class="nav-link">

                                    <i class="nav-icon bi bi-info-circle"></i>

                                    <p>
                                        About
                                    </p>

                                </a>

                            </li>
                        @endif

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'Unidades')->exists())
                            <li class="nav-item">
                                <a href="{{ route('Sistema.Unidades.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-building"></i>
                                    <p>Unidades</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'Analytics')->exists())
                            <li class="nav-item">
                                <a href="{{ route('Sistema.Analytics.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-bar-chart"></i>
                                    <p>Analytics</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'Usuarios')->exists())
                            <li class="nav-item">
                                <a href="{{ route('Sistema.Usuarios.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-people"></i>
                                    <p>Usuários</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'Lgpd')->exists())
                            <li class="nav-item">
                                <a href="{{ route('Sistema.Lgpd.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-shield-check"></i>
                                    <p>LGPD</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()?->role === 'admin' || auth()->user()?->moduleAccesses()->where('module', 'Configuracoes')->exists())
                            <li class="nav-item">
                                <a href="{{ route('Sistema.Configuracoes.index') }}" class="nav-link">
                                    <i class="nav-icon bi bi-gear"></i>
                                    <p>Configurações</p>
                                </a>
                            </li>
                        @endif

                    </ul>

                </nav>

            </div>

        </aside>


        {{-- Conteúdo --}}
        <main class="app-main">

            {{-- Header da página --}}
            <div class="app-content-header">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-6">

                            <h3 class="mb-0">
                                {{ $title ?? 'Dashboard' }}
                            </h3>

                        </div>

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-end">

                                <li class="breadcrumb-item">
                                    <a href="{{ url('/dashboard') }}">
                                        Home
                                    </a>
                                </li>

                                @yield('breadcrumb')

                            </ol>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Conteúdo dos módulos --}}
            <div class="app-content">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

        </main>


        {{-- Footer --}}
        <footer class="app-footer">

            <strong>
                Copyright © {{ date('Y') }}
                Meu CMS.
            </strong>

            Todos os direitos reservados.

        </footer>

    </div>

</body>

</html>
