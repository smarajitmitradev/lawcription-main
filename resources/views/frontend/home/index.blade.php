@extends('frontend.layout.master')

@section('title', 'Home')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<style>
    html {
        font-size: var(--base-size);
        box-sizing: border-box;
    }
</style>

@section('content')

<div class="home-html">

    <style>
        .home-html {
            --green: #3d6b4a;
            --green2: #2d5a3d;
            --greenlit: #6fa882;
            --gold: #c9a84c;
            --gold2: #b8922e;
            --cream: #f2ead8;
            --text: #ede8de;
            --bg: #0a0908;
            --surface: #131211;
            --surface2: #1a1917;
            --border: rgba(242, 234, 216, 0.08);
            --border2: rgba(201, 168, 76, 0.16);
            --muted: #9a9488;
            --muted2: #b3ab9c;
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            position: relative;
            scroll-behavior: smooth;
        }

        .home-html .serif {
            font-family: 'Playfair Display', serif;
        }

        .home-html .light-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .home-html .shimmer {
            background: linear-gradient(100deg, var(--gold) 20%, var(--cream) 40%, var(--greenlit) 60%, var(--gold) 80%);
            background-size: 220% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shimmer 7s linear infinite;
        }

        @keyframes shimmer {
            to {
                background-position: -220% center;
            }
        }

        .home-html .mesh {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .home-html .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
        }

        .home-html .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600;
        }

        .home-html .num-tag {
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            color: var(--gold);
            border: 1px solid var(--border2);
            border-radius: 999px;
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .home-html .social-ico {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid var(--border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--muted2);
            transition: all .25s ease;
        }

        .home-html .social-ico:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(201, 168, 76, 0.08);
        }

        /* Menu tabs */
        .home-html .menu-tab {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 16px;
            border-radius: 12px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all .2s ease;
            color: var(--muted2);
            font-size: 14px;
            font-weight: 600;
        }

        .home-html .menu-tab:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .home-html .menu-tab.active {
            background: linear-gradient(90deg, rgba(201, 168, 76, 0.12), rgba(61, 107, 79, 0.08));
            border-color: var(--border2);
            color: var(--cream);
            box-shadow: inset 3px 0 0 var(--gold);
        }

        .home-html .menu-pill {
            flex: 0 0 auto;
            padding: 9px 16px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: var(--surface);
            font-size: 12.5px;
            font-weight: 600;
            color: var(--muted2);
            white-space: nowrap;
        }

        .home-html .menu-pill.active {
            background: linear-gradient(135deg, rgba(201, 168, 76, 0.16), rgba(61, 107, 79, 0.14));
            border-color: rgba(201, 168, 76, 0.4);
            color: var(--gold);
        }

        .home-html .lc-menu-panel {
            display: none !important;
        }

        .home-html .lc-menu-panel.active {
            display: block !important;
            animation: fadein .35s ease;
        }

        @keyframes fadein {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .home-html .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
        }

        .home-html .menu-item:last-child {
            border-bottom: none;
        }

        .home-html .menu-badge {
            flex-shrink: 0;
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold);
            background: rgba(201, 168, 76, 0.1);
            border: 1px solid rgba(201, 168, 76, 0.25);
            border-radius: 999px;
            padding: 6px 12px;
            white-space: nowrap;
        }

        /* Gallery */
        .home-html .gallery-thumb {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        .home-html .gallery-thumb img {
            transition: transform .5s ease, filter .5s ease;
            filter: brightness(0.85) sepia(0.12);
        }

        .home-html .gallery-thumb:hover img {
            transform: scale(1.08);
            filter: brightness(1) sepia(0);
        }

        .home-html .gallery-thumb::after {
            content: '⊕';
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--cream);
            background: rgba(10, 9, 8, 0.35);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .home-html .gallery-thumb:hover::after {
            opacity: 1;
        }

        /* Testimonials */
        .home-html .testimonials-slider .swiper-wrapper {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: 6px;
        }

        .home-html .testimonials-slider .swiper-wrapper::-webkit-scrollbar {
            display: none;
        }

        .home-html .testimonials-slider .swiper-slide {
            flex: 0 0 82%;
            max-width: 360px;
            scroll-snap-align: start;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 26px;
        }

        @media (min-width:768px) {
            .home-html .testimonials-slider .swiper-slide {
                flex: 0 0 46%;
            }
        }

        @media (min-width:1100px) {
            .home-html .testimonials-slider .swiper-slide {
                flex: 0 0 31%;
            }
        }

        .home-html .swiper-pagination {
            display: none;
        }

        body {
            padding-top: 0px !important;
        }
    </style>

    {{-- ══════════════════════════════════════════
     INTRO
  ══════════════════════════════════════════ --}}
    <section id="intro" class="target-section relative px-6 pt-24 pb-20 md:pt-32 md:pb-28 overflow-hidden">

        <div class="mesh">
            <div class="orb" style="width:620px;height:620px;background:radial-gradient(var(--green),transparent);top:-260px;left:-160px;opacity:0.2;"></div>
            <div class="orb" style="width:420px;height:420px;background:radial-gradient(var(--gold),transparent);bottom:-140px;right:-140px;opacity:0.12;"></div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto grid md:grid-cols-2 gap-12 md:gap-10 items-center">

            <div class="order-2 md:order-1">
                <div class="intro-header mb-6">
                    <div class="eyebrow mb-4">Welcome to</div>
                    <h1 class="add-headline serif shimmer" style="font-size:clamp(2.6rem,7vw,4.6rem);font-weight:800;line-height:1.05;letter-spacing:-1.5px;">
                        Lawcription&trade;
                    </h1>
                </div>

                <div class="intro-block-content">
                    <p class="intro-block-content__text light-serif" style="font-size:1.2rem;color:var(--muted2);line-height:1.8;max-width:480px;">
                        Empowering healthcare professionals with trusted medico-legal knowledge,
                        real-time legal updates, practical guidance, and compliance tools for safer
                        medical practice.
                    </p>

                    <ul class="intro-block-content__social mt-8 flex gap-3 list-none p-0">
                        <li><a href="#" class="social-ico"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#" class="social-ico"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#" class="social-ico"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#" class="social-ico"><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="order-1 md:order-2 relative">
                <figure class="intro-pic-primary rounded-3xl overflow-hidden border" style="border-color:var(--border2);box-shadow:0 40px 100px rgba(0,0,0,0.55);">
                    <img src="{{ asset('frontend/images/intro-pic-primary.jpg') }}" srcset="{{ asset('frontend/images/intro-pic-primary.jpg') }} 1x,
               {{ asset('frontend/images/intro-pic-primary@2x.jpg') }} 2x" alt="" class="w-full h-[320px] md:h-[420px] object-cover block" style="filter:brightness(0.75) sepia(0.15);">
                </figure>

                <figure class="intro-block-content__pic absolute -bottom-8 -left-6 md:-left-10 w-32 md:w-44 rounded-2xl overflow-hidden border-2" style="border-color:var(--surface); box-shadow:0 24px 60px rgba(0,0,0,0.6);">
                    <img src="https://images.unsplash.com/photo-1551601651-09492b5468b6?q=80&w=613&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" srcset="https://images.unsplash.com/photo-1551601651-09492b5468b6?q=80&w=613&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D 1x,
               {{ asset('frontend/images/intro-pic-secondary@2x.jpg') }} 2x" alt="" class="w-full h-32 md:h-44 object-cover block">
                </figure>
            </div>

        </div>

        <div class="intro-scroll relative z-10 flex justify-center mt-20 md:mt-10">
            <a class="smoothscroll flex flex-col items-center gap-2" href="#about">
                <span class="intro-scroll__circle-text w-10 h-10 rounded-full border flex items-center justify-center animate-bounce" style="border-color:var(--border2); color:var(--gold);">↓</span>
                <span class="intro-scroll__text sr-only">Scroll Down</span>
            </a>
        </div>

    </section>


    {{-- ══════════════════════════════════════════
     ABOUT
  ══════════════════════════════════════════ --}}
    <section id="about" class="target-section relative z-10 px-6 py-20 md:py-28 max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div class="s-about__content-start">
                <div class="section-header flex items-center gap-4 mb-8" data-num="01">
                    <span class="num-tag">01</span>
                    <h2 class="text-display-title serif" style="font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--cream);letter-spacing:-0.5px;">
                        Our Story
                    </h2>
                </div>

                <figure class="about-pic-primary rounded-3xl overflow-hidden border" style="border-color:var(--border);box-shadow:0 30px 80px rgba(0,0,0,0.5);">
                    <img src="{{ asset('frontend/images/about-pic-primary.jpg') }}" srcset="{{ asset('frontend/images/about-pic-primary.jpg') }} 1x,
               {{ asset('frontend/images/about-pic-primary@2x.jpg') }} 2x" alt="" class="w-full h-[280px] md:h-[360px] object-cover block" style="filter:brightness(0.8) sepia(0.12);">
                </figure>
            </div>

            <div class="s-about__content-end">
                <p class="light-serif" style="font-size:1.3rem;color:var(--muted2);line-height:1.85;">
                    Lawcription&trade; was created to simplify medical law by providing trusted legal updates,
                    practical guidance, and compliance tools for healthcare professionals.
                </p>
            </div>

        </div>
    </section>


    {{-- ══════════════════════════════════════════
     MENU
  ══════════════════════════════════════════ --}}
    <section id="menu" class="target-section relative z-10 px-6 py-20 md:py-28 max-w-6xl mx-auto">

        <div class="section-header flex items-center gap-4 mb-4" data-num="02">
            <span class="num-tag">02</span>
            <h2 class="text-display-title serif" style="font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--cream);letter-spacing:-0.5px;">
                Our Menu
            </h2>
        </div>

        {{-- Mobile pill strip --}}
        <div class="md:hidden flex gap-2 overflow-x-auto mb-6 mt-8" id="menuPillStrip" style="scrollbar-width:none;"></div>

        <div class="grid md:grid-cols-[220px_1fr] gap-10 mt-8">

            <nav class="lc-menu-nav hidden md:block">
                <ul class="flex flex-col gap-1.5 list-none p-0 m-0" id="menuTabList"></ul>
            </nav>

            <div class="lc-menu-panel-host" id="menuPanelHost" style="background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:30px 28px;"></div>

        </div>
    </section>


    {{-- ══════════════════════════════════════════
     GALLERY
  ══════════════════════════════════════════ --}}
    <section id="gallery" class="target-section relative z-10 px-6 py-20 md:py-28 max-w-6xl mx-auto">

        <div class="section-header-wrap text-center mb-12">
            <div class="section-header inline-flex items-center gap-4" data-num="03">
                <span class="num-tag">03</span>
                <h2 class="text-display-title serif" style="font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--cream);letter-spacing:-0.5px;">
                    Gallery
                </h2>
            </div>
        </div>

        <!-- <div class="gallery-items grid-cols grid-cols--wrap grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5">

        @for ($i = 1; $i <= 8; $i++)

            <div class="gallery-items__item grid-cols__column">

                <a href="{{ asset('frontend/images/gallery/large/l-gallery-0'.$i.'.jpg') }}"
                   class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square">

                    <img src="{{ asset('frontend/images/gallery/gallery-0'.$i.'.jpg') }}"
                         srcset="{{ asset('frontend/images/gallery/gallery-0'.$i.'.jpg') }} 1x,
                         {{ asset('frontend/images/gallery/gallery-0'.$i.'@2x.jpg') }} 2x"
                         alt="" class="w-full h-full object-cover block">

                </a>

            </div>

        @endfor

    </div> -->
        <div class="gallery-items grid-cols grid-cols--wrap grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5">

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1584982751601-97dcc096659c?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1584982751601-97dcc096659c?w=600&q=80" alt="Medical equipment" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?w=600&q=80" alt="Medical apparatus" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&q=80" alt="Medical equipment and healthcare" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1584515933487-779824d29309?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80" alt="Medical device" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1734094546615-045bf5f7ea0e?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1734094546615-045bf5f7ea0e?q=80&w=435&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Medical apparatus and equipment" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=600&q=80" alt="Healthcare equipment" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1583911860205-72f8ac8ddcbe?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1583911860205-72f8ac8ddcbe?w=600&q=80" alt="Medical instruments" class="w-full h-full object-cover block"> </a>
            </div>

            <div class="gallery-items__item grid-cols__column">
                <a href="https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=1200&q=90" class="gallery-items__item-thumb glightbox gallery-thumb block aspect-square"> <img src="https://images.unsplash.com/photo-1581595219315-a187dd40c322?w=600&q=80" alt="Medical apparatus" class="w-full h-full object-cover block"> </a>
            </div>

        </div>

    </section>


    {{-- ══════════════════════════════════════════
     TESTIMONIALS
  ══════════════════════════════════════════ --}}
  <section id="testimonials" class="s-testimonials relative z-10 px-6 py-20 md:py-28">
  <div class="s-testimonials__content max-w-6xl mx-auto">

    <h3 class="testimonials-title u-text-center serif text-center mb-14" style="font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:var(--cream);letter-spacing:-0.5px;">
      Words That Guide Us
    </h3>

    <div class="quotes-track" style="display:flex;gap:20px;overflow-x:auto;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;padding-bottom:20px;scrollbar-width:thin;scrollbar-color:var(--gold) var(--surface);">

      <div class="quote-card" style="flex:0 0 82%;max-width:360px;scroll-snap-align:start;background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:26px;">
        <div class="flex items-center gap-3 mb-5">
          <div style="width:48px;height:48px;border-radius:50%;background:rgba(201,168,76,0.1);border:2px solid var(--border2);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:18px;color:var(--gold);">H</div>
          <cite class="not-italic">
            <div class="serif" style="font-weight:700;color:var(--cream);font-size:14px;">Hippocrates</div>
            <span style="font-size:12px;color:var(--muted);">Father of Medicine, c. 400 BCE</span>
          </cite>
        </div>
        <p class="light-serif" style="font-size:1.1rem;color:var(--muted2);line-height:1.7;font-style:italic;">"Wherever the art of medicine is loved, there is also a love of humanity."</p>
      </div>

      <div class="quote-card" style="flex:0 0 82%;max-width:360px;scroll-snap-align:start;background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:26px;">
        <div class="flex items-center gap-3 mb-5">
          <div style="width:48px;height:48px;border-radius:50%;background:rgba(61,107,79,0.1);border:2px solid var(--border2);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:18px;color:var(--greenlit);">O</div>
          <cite class="not-italic">
            <div class="serif" style="font-weight:700;color:var(--cream);font-size:14px;">Sir William Osler</div>
            <span style="font-size:12px;color:var(--muted);">Physician, Co-founder of Johns Hopkins Hospital</span>
          </cite>
        </div>
        <p class="light-serif" style="font-size:1.1rem;color:var(--muted2);line-height:1.7;font-style:italic;">"The good physician treats the disease; the great physician treats the patient who has the disease."</p>
      </div>

      <div class="quote-card" style="flex:0 0 82%;max-width:360px;scroll-snap-align:start;background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:26px;">
        <div class="flex items-center gap-3 mb-5">
          <div style="width:48px;height:48px;border-radius:50%;background:rgba(201,168,76,0.1);border:2px solid var(--border2);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:18px;color:var(--gold);">H</div>
          <cite class="not-italic">
            <div class="serif" style="font-weight:700;color:var(--cream);font-size:14px;">Hippocrates</div>
            <span style="font-size:12px;color:var(--muted);">Father of Medicine, c. 400 BCE</span>
          </cite>
        </div>
        <p class="light-serif" style="font-size:1.1rem;color:var(--muted2);line-height:1.7;font-style:italic;">"It is more important to know what sort of person has a disease than what sort of disease a person has."</p>
      </div>

      <div class="quote-card" style="flex:0 0 82%;max-width:360px;scroll-snap-align:start;background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:26px;">
        <div class="flex items-center gap-3 mb-5">
          <div style="width:48px;height:48px;border-radius:50%;background:rgba(61,107,79,0.1);border:2px solid var(--border2);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:18px;color:var(--greenlit);">N</div>
          <cite class="not-italic">
            <div class="serif" style="font-weight:700;color:var(--cream);font-size:14px;">Florence Nightingale</div>
            <span style="font-size:12px;color:var(--muted);">Founder of Modern Nursing</span>
          </cite>
        </div>
        <p class="light-serif" style="font-size:1.1rem;color:var(--muted2);line-height:1.7;font-style:italic;">"I attribute my success to this: I never gave or took an excuse."</p>
      </div>

      <div class="quote-card" style="flex:0 0 82%;max-width:360px;scroll-snap-align:start;background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:26px;">
        <div class="flex items-center gap-3 mb-5">
          <div style="width:48px;height:48px;border-radius:50%;background:rgba(201,168,76,0.1);border:2px solid var(--border2);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-weight:700;font-size:18px;color:var(--gold);">P</div>
          <cite class="not-italic">
            <div class="serif" style="font-weight:700;color:var(--cream);font-size:14px;">Louis Pasteur</div>
            <span style="font-size:12px;color:var(--muted);">Chemist & Microbiologist</span>
          </cite>
        </div>
        <p class="light-serif" style="font-size:1.1rem;color:var(--muted2);line-height:1.7;font-style:italic;">"Science knows no country, because knowledge belongs to humanity."</p>
      </div>

    </div>

    <p style="text-align:center;font-size:12px;color:var(--muted);margin-top:12px;">← Swipe to see more →</p>

  </div>
</section>

</div>

<script>
    (function() {
        var menu = [{
                id: 'tab-legal-digest',
                name: 'Legal Digest & Updates',
                items: [{
                        name: 'Daily Case Law Briefing',
                        desc: 'A short, verified summary of medico-legal news and judgements, delivered every morning so you never start the day behind.',
                        badge: 'Updated Daily'
                    },
                    {
                        name: 'Landmark Judgment Series',
                        desc: 'Long-form breakdowns of the Supreme Court and High Court rulings that continue to shape how medical practice is judged today.',
                        badge: 'In-Depth Read'
                    }
                ]
            },
            {
                id: 'tab-compliance-toolkit',
                name: 'Compliance Toolkit',
                items: [{
                        name: 'Ready-Made Documentation',
                        desc: 'NMC-aligned consent forms, certificates and referral templates — ready to download and customise for your practice the same day.',
                        badge: 'Download & Use'
                    },
                    {
                        name: 'Regulatory Tracker',
                        desc: 'A running record of council notifications and policy amendments, filed the moment they are issued.',
                        badge: 'Always Current'
                    }
                ]
            },
            {
                id: 'tab-practice-protection',
                name: 'Practice Protection',
                items: [{
                        name: 'Risk & Documentation Guides',
                        desc: 'Practical explainers on everyday risk points — from consent to record-keeping — written for how clinics actually work.',
                        badge: 'Practical Guide'
                    },
                    {
                        name: 'Expert Consultation Credits',
                        desc: 'Direct access to a medico-legal expert when a real situation calls for a second opinion, not just general reading.',
                        badge: 'Included in Elite'
                    }
                ]
            }
        ];

        var tabList = document.getElementById('menuTabList');
        var pillStrip = document.getElementById('menuPillStrip');
        var panelHost = document.getElementById('menuPanelHost');

        menu.forEach(function(cat, i) {
            var tab = document.createElement('li');
            var isActive = i === 0;
            tab.innerHTML = '<a href="#' + cat.id + '" class="menu-tab' + (isActive ? ' active' : '') + '" data-idx="' + i + '"><span>' + cat.name + '</span></a>';
            tabList.appendChild(tab);

            var pill = document.createElement('button');
            pill.type = 'button';
            pill.className = 'menu-pill' + (isActive ? ' active' : '');
            pill.dataset.idx = i;
            pill.textContent = cat.name;
            pillStrip.appendChild(pill);

            var panel = document.createElement('div');
            panel.id = cat.id;
            panel.className = 'lc-menu-panel' + (isActive ? ' active' : '');

            var itemsHtml = cat.items.map(function(it) {
                return '<li class="menu-item">' +
                    '<div>' +
                    '<h4 class="serif" style="font-size:1.1rem;font-weight:700;color:var(--cream);margin-bottom:6px;">' + it.name + '</h4>' +
                    '<p style="font-size:14px;color:var(--muted2);line-height:1.65;">' + it.desc + '</p>' +
                    '</div>' +
                    '<span class="menu-badge">' + it.badge + '</span>' +
                    '</li>';
            }).join('');

            panel.innerHTML =
                '<h6 class="eyebrow" style="margin-bottom:6px;">' + cat.name + '</h6>' +
                '<ul class="list-none p-0 m-0">' + itemsHtml + '</ul>';

            panelHost.appendChild(panel);
        });

        function activateMenu(i) {
            document.querySelectorAll('.menu-tab').forEach(function(el) {
                el.classList.toggle('active', +el.dataset.idx === i);
            });
            document.querySelectorAll('.menu-pill').forEach(function(el) {
                el.classList.toggle('active', +el.dataset.idx === i);
            });
            document.querySelectorAll('.lc-menu-panel').forEach(function(el, idx) {
                el.classList.toggle('active', idx === i);
            });
        }

        tabList.addEventListener('click', function(e) {
            var a = e.target.closest('.menu-tab');
            if (!a) return;
            e.preventDefault();
            activateMenu(+a.dataset.idx);
        });
        pillStrip.addEventListener('click', function(e) {
            var p = e.target.closest('.menu-pill');
            if (!p) return;
            activateMenu(+p.dataset.idx);
        });
    })();
</script>

@endsection