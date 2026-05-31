<header class="s-header sticky-header !top-0">

    <div class="container s-header__content !h-16 !max-w-7xl !px-5 md:!px-8 !rounded-none md:!rounded-b-lg !border-b !border-white/10 !bg-black/70 !backdrop-blur">

        <div class="s-header__block">

            <div class="header-logo !left-5 md:!left-8">
                <a class="logo" href="{{ route('home') }}">
                    <img class="!w-28 md:!w-32" src="{{ asset('frontend/images/logo.svg') }}" alt="Homepage">
                </a>
            </div>

            <a class="header-menu-toggle !right-5" href="#0">
                <span>Menu</span>
            </a>

        </div>

        <nav class="header-nav">

            <ul class="header-nav__links !gap-1 !px-3">
                <li class="current">
                    <a class="smoothscroll !rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide hover:!bg-white/10 hover:!text-white" href="#intro">Intro</a>
                </li>

                <li>
                    <a class="smoothscroll !rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide hover:!bg-white/10 hover:!text-white" href="#about">About</a>
                </li>

                <li>
                    <a class="smoothscroll !rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide hover:!bg-white/10 hover:!text-white" href="#menu">Menu</a>
                </li>

                <li>
                    <a class="smoothscroll !rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide hover:!bg-white/10 hover:!text-white" href="#gallery">Gallery</a>
                </li>
            </ul>

            <div class="header-contact !right-5 flex items-center gap-3">

                <!-- Subscribe Button -->
                <a href="#subscription" class="subscribe-btn">
                    ✨ Subscribe
                </a>

                <!-- Call Button -->
                <a href="tel:+123456789" class="header-contact__num btn !h-10 !rounded-full !px-5 !text-xs !font-bold !uppercase !tracking-wide !shadow-sm">
                    Call Us
                </a>

            </div>

        </nav>

    </div>

</header>