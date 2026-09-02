<header class="site-header">
    <div class="site-container header-inner">
        <a class="brand" href="{{ route('Site.Home.index') }}"><span class="brand-mark">M</span><span>Meu CMS</span></a>
        <nav class="site-nav" aria-label="Navegação principal">
            <a class="{{ request()->routeIs('Site.Home.index') ? 'is-active' : '' }}"
                href="{{ route('Site.Home.index') }}">Início</a>
            <a class="{{ request()->routeIs('Site.About.index') ? 'is-active' : '' }}"
                href="{{ route('Site.About.index') }}">Quem somos</a>
        </nav>
        <a class="header-action" href="{{ route('login') }}">Área restrita <span aria-hidden="true">→</span></a>
    </div>
</header>
