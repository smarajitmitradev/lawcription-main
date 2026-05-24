@extends('frontend.layout.master')

@section('title', 'Home')

@section('content')

<!-- # intro -->
<section id="intro" class="container s-intro target-section">

    <div class="grid-block s-intro__content">

        <div class="intro-header">
            <div class="intro-header__overline">Welcome to</div>

            <h1 class="intro-header__big-type">
                Lounge <br>
                Cafe
            </h1>
        </div>

        <figure class="intro-pic-primary">
            <img src="{{ asset('frontend/images/intro-pic-primary.jpg') }}"
                 srcset="{{ asset('frontend/images/intro-pic-primary.jpg') }} 1x,
                 {{ asset('frontend/images/intro-pic-primary@2x.jpg') }} 2x"
                 alt="">
        </figure>

        <div class="intro-block-content">

            <figure class="intro-block-content__pic">
                <img src="{{ asset('frontend/images/intro-pic-secondary.jpg') }}"
                     srcset="{{ asset('frontend/images/intro-pic-secondary.jpg') }} 1x,
                     {{ asset('frontend/images/intro-pic-secondary@2x.jpg') }} 2x"
                     alt="">
            </figure>

            <div class="intro-block-content__text-wrap">

                <p class="intro-block-content__text">
                    Savor moments of bliss with every sip, as our expertly
                    crafted coffees and delectable pastries embrace your senses.
                </p>

                <ul class="intro-block-content__social">
                    <li><a href="#">FB</a></li>
                    <li><a href="#">IG</a></li>
                    <li><a href="#">PI</a></li>
                    <li><a href="#">X</a></li>
                </ul>

            </div>

        </div>

        <div class="intro-scroll">
            <a class="smoothscroll" href="#about">

                <span class="intro-scroll__circle-text"></span>

                <span class="intro-scroll__text u-screen-reader-text">
                    Scroll Down
                </span>

            </a>
        </div>

    </div>

</section>


<!-- # about -->
<section id="about" class="container s-about target-section">

    <div class="row s-about__content">

        <div class="column xl-4 lg-5 md-12 s-about__content-start">

            <div class="section-header" data-num="01">
                <h2 class="text-display-title">
                    Our Story
                </h2>
            </div>

            <figure class="about-pic-primary">
                <img src="{{ asset('frontend/images/about-pic-primary.jpg') }}"
                     srcset="{{ asset('frontend/images/about-pic-primary.jpg') }} 1x,
                     {{ asset('frontend/images/about-pic-primary@2x.jpg') }} 2x"
                     alt="">
            </figure>

        </div>

        <div class="column xl-6 lg-6 md-12 s-about__content-end">

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quasi earum, ut consequuntur pariatur fugiat aliquam voluptatem.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dolorem vero sit neque sequi eius illum at porro aperiam.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dolorem vero sit neque sequi eius illum at porro aperiam.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Dolorem vero sit neque sequi eius illum.
            </p>

        </div>

    </div>

</section>


<!-- # menu -->
<section id="menu" class="container s-menu target-section">

    <div class="row s-menu__content">

        <div class="column xl-4 lg-5 md-12 s-menu__content-start">

            <div class="section-header" data-num="02">
                <h2 class="text-display-title">
                    Our Menu
                </h2>
            </div>

            <nav class="tab-nav">

                <ul class="tab-nav__list">

                    <li>
                        <a href="#tab-signature-blends">
                            <span>Signature Blends</span>
                        </a>
                    </li>

                    <li>
                        <a href="#tab-pastries">
                            <span>Freshly Baked Pastries</span>
                        </a>
                    </li>

                    <li>
                        <a href="#tab-gourmet-treats">
                            <span>Gourmet Treats</span>
                        </a>
                    </li>

                </ul>

            </nav>

        </div>


        <div class="column xl-6 lg-6 md-12 s-menu__content-end">

            <div class="tab-content menu-block">

                <!-- Signature Blends -->
                <div id="tab-signature-blends"
                     class="menu-block__group tab-content__item">

                    <h6 class="menu-block__cat-name">
                        Signature Blends
                    </h6>

                    <ul class="menu-list">

                        <li class="menu-list__item">
                            <div class="menu-list__item-desc">
                                <h4>Lounge Elegance Espresso</h4>

                                <p>
                                    Rich and full-bodied espresso blend.
                                </p>
                            </div>

                            <div class="menu-list__item-price">
                                <span>$</span>3.50
                            </div>
                        </li>

                        <li class="menu-list__item">
                            <div class="menu-list__item-desc">
                                <h4>Velvet Mocha Delight</h4>

                                <p>
                                    Silky mocha infused with vanilla.
                                </p>
                            </div>

                            <div class="menu-list__item-price">
                                <span>$</span>4.25
                            </div>
                        </li>

                    </ul>

                </div>


                <!-- Pastries -->
                <div id="tab-pastries"
                     class="menu-block__group tab-content__item">

                    <h6 class="menu-block__cat-name">
                        Freshly Baked Pastries
                    </h6>

                    <ul class="menu-list">

                        <li class="menu-list__item">
                            <div class="menu-list__item-desc">
                                <h4>Buttery Croissants</h4>

                                <p>
                                    Flaky and buttery croissants.
                                </p>
                            </div>

                            <div class="menu-list__item-price">
                                <span>$</span>2.50
                            </div>
                        </li>

                    </ul>

                </div>


                <!-- Gourmet -->
                <div id="tab-gourmet-treats"
                     class="menu-block__group tab-content__item">

                    <h6 class="menu-block__cat-name">
                        Gourmet Treats
                    </h6>

                    <ul class="menu-list">

                        <li class="menu-list__item">

                            <div class="menu-list__item-desc">

                                <h4>Dark Chocolate Truffles</h4>

                                <p>
                                    Luxurious dark chocolate truffles.
                                </p>

                            </div>

                            <div class="menu-list__item-price">
                                <span>$</span>2.75
                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- # gallery -->
<section id="gallery" class="container s-gallery target-section">

    <div class="row s-gallery__header">

        <div class="column xl-12 section-header-wrap">

            <div class="section-header" data-num="03">
                <h2 class="text-display-title">
                    Gallery
                </h2>
            </div>

        </div>

    </div>

    <div class="gallery-items grid-cols grid-cols--wrap">

        @for ($i = 1; $i <= 8; $i++)

            <div class="gallery-items__item grid-cols__column">

                <a href="{{ asset('frontend/images/gallery/large/l-gallery-0'.$i.'.jpg') }}"
                   class="gallery-items__item-thumb glightbox">

                    <img src="{{ asset('frontend/images/gallery/gallery-0'.$i.'.jpg') }}"
                         srcset="{{ asset('frontend/images/gallery/gallery-0'.$i.'.jpg') }} 1x,
                         {{ asset('frontend/images/gallery/gallery-0'.$i.'@2x.jpg') }} 2x"
                         alt="">

                </a>

            </div>

        @endfor

    </div>

</section>


<!-- # testimonials -->
<section id="testimonials" class="container s-testimonials">

    <div class="row s-testimonials__content">

        <div class="column xl-12">

            <h3 class="testimonials-title u-text-center">
                What Our Clients Say
            </h3>

            <div class="swiper-container testimonials-slider">

                <div class="swiper-wrapper">

                    <div class="testimonials-slider__slide swiper-slide">

                        <div class="testimonials-slider__author">

                            <img src="{{ asset('frontend/images/avatars/user-02.jpg') }}"
                                 alt="Author image"
                                 class="testimonials-slider__avatar">

                            <cite class="testimonials-slider__cite">
                                John Rockefeller
                                <span>Cleveland, Ohio</span>
                            </cite>

                        </div>

                        <p>
                            Excellent coffee and wonderful atmosphere.
                        </p>

                    </div>

                    <div class="testimonials-slider__slide swiper-slide">

                        <div class="testimonials-slider__author">

                            <img src="{{ asset('frontend/images/avatars/user-03.jpg') }}"
                                 alt="Author image"
                                 class="testimonials-slider__avatar">

                            <cite class="testimonials-slider__cite">
                                Andrew Carnegie
                                <span>Pittsburgh, Pennsylvania</span>
                            </cite>

                        </div>

                        <p>
                            Amazing pastries and quality service.
                        </p>

                    </div>

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </div>

</section>

@endsection