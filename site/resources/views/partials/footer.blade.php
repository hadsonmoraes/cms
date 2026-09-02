<footer class="site-footer">
    <div class="site-container footer-inner">
        <div><a class="brand footer-brand" href="{{ route('Site.Home.index') }}"><span class="brand-mark">M</span><span>Meu
                    CMS</span></a>
            <p class="footer-note">Conteúdo, propósito e presença em um só lugar.</p>
        </div>
        <div class="footer-links"><a href="{{ route('Site.Home.index') }}">Início</a><a
                href="{{ route('Site.About.index') }}">Quem somos</a></div>
        <p class="copyright">© {{ date('Y') }} Meu CMS</p>
    </div>
</footer>
