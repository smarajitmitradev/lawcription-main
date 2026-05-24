<header class="s-header">

    <div class="container s-header__content">

        <div class="s-header__block">

            <div class="header-logo">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="Homepage">
                </a>
            </div>

            <a class="header-menu-toggle" href="#0">
                <span>Menu</span>
            </a>

        </div>

        <nav class="header-nav">

            <ul class="header-nav__links">
                <li class="current">
                    <a class="smoothscroll" href="#intro">Intro</a>
                </li>

                <li>
                    <a class="smoothscroll" href="#about">About</a>
                </li>

                <li>
                    <a class="smoothscroll" href="#menu">Menu</a>
                </li>

                <li>
                    <a class="smoothscroll" href="#gallery">Gallery</a>
                </li>
            </ul>

            <div class="header-contact">
                <a href="tel:+123456789" class="header-contact__num btn">
                    Call Us
                </a>
            </div>

        </nav>

    </div>

</header>