@extends('frontend.layout.master')

@section('title', 'Lawcription™ – Gallery')
@section('bodyClass', 'page-gallery')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Outfit:wght@300;400;500;600&display=swap');

    :root {
        --g-bg: #0d0f14;
        --g-surface: #13151c;
        --g-card: #191c25;
        --g-border: rgba(255, 255, 255, 0.06);
        --g-teal: #2dd4bf;
        --g-teal-dim: rgba(45, 212, 191, 0.15);
        --g-rose: #fb7185;
        --g-rose-dim: rgba(251, 113, 133, 0.15);
        --g-amber: #fbbf24;
        --g-amber-dim: rgba(251, 191, 36, 0.12);
        --g-violet: #a78bfa;
        --g-violet-dim: rgba(167, 139, 250, 0.13);
        --g-muted: #6b7280;
        --g-text: #e2e8f0;
        --g-cream: #f8fafc;
    }

    .gallery-wrap {
        background: var(--g-bg);
        font-family: 'Outfit', sans-serif;
        color: var(--g-text);
        min-height: 100vh;
    }

    .g-serif {
        font-family: 'Playfair Display', serif;
    }

    /* Shimmer */
    .g-shimmer {
        background: linear-gradient(90deg, var(--g-teal) 0%, var(--g-violet) 40%, var(--g-rose) 80%, var(--g-teal) 100%);
        background-size: 300% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gShimmer 4s linear infinite;
    }

    @keyframes gShimmer {
        to {
            background-position: 300% center;
        }
    }

    /* Tag pill */
    .g-tag {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 5px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    /* Pulse dot */
    .pulse-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
        animation: pulseDot 1.8s ease-in-out infinite;
    }

    @keyframes pulseDot {

        0%,
        100% {
            box-shadow: 0 0 0 0 currentColor;
            opacity: 1;
        }

        50% {
            box-shadow: 0 0 0 5px transparent;
            opacity: .7;
        }
    }

    /* ── Reveal ── */
    .g-reveal {
        opacity: 0;
        transform: translateY(32px);
        transition: opacity .75s ease, transform .75s ease;
    }

    .g-reveal.in {
        opacity: 1;
        transform: none;
    }

    .gd1 {
        transition-delay: .05s
    }

    .gd2 {
        transition-delay: .15s
    }

    .gd3 {
        transition-delay: .25s
    }

    .gd4 {
        transition-delay: .35s
    }

    .gd5 {
        transition-delay: .45s
    }

    /* ── Orb ── */
    .g-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        pointer-events: none;
    }

    /* ── Divider ── */
    .g-divider {
        height: 1px;
        background: var(--g-border);
    }

    /* ─────────────────────────────
   HERO
───────────────────────────── */
    .g-hero {
        position: relative;
        padding: 120px 24px 100px;
        text-align: center;
        overflow: hidden;
    }

    /* ─────────────────────────────
   MASONRY GRID  (col approach)
───────────────────────────── */
    .masonry {
        column-count: 3;
        column-gap: 16px;
    }

    @media(max-width:900px) {
        .masonry {
            column-count: 2;
        }
    }

    @media(max-width:560px) {
        .masonry {
            column-count: 1;
        }
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 16px;
        border-radius: 18px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1px solid var(--g-border);
        transition: transform .35s cubic-bezier(.23, 1, .32, 1), box-shadow .35s;
    }

    .masonry-item:hover {
        transform: scale(1.025);
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.6);
    }

    .masonry-item img {
        width: 100%;
        display: block;
        filter: brightness(0.75) saturate(1.1);
        transition: filter .4s, transform .5s cubic-bezier(.23, 1, .32, 1);
    }

    .masonry-item:hover img {
        filter: brightness(0.9) saturate(1.3);
        transform: scale(1.05);
    }

    /* colourful accent border on hover per item */
    .masonry-item.c-teal:hover {
        border-color: var(--g-teal);
        box-shadow: 0 24px 60px rgba(45, 212, 191, .2);
    }

    .masonry-item.c-rose:hover {
        border-color: var(--g-rose);
        box-shadow: 0 24px 60px rgba(251, 113, 133, .2);
    }

    .masonry-item.c-amber:hover {
        border-color: var(--g-amber);
        box-shadow: 0 24px 60px rgba(251, 191, 36, .2);
    }

    .masonry-item.c-violet:hover {
        border-color: var(--g-violet);
        box-shadow: 0 24px 60px rgba(167, 139, 250, .2);
    }

    .masonry-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(13, 15, 20, .9) 0%, transparent 55%);
        opacity: 0;
        transition: opacity .35s;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
    }

    .masonry-item:hover .masonry-overlay {
        opacity: 1;
    }

    /* ─────────────────────────────
   FEATURED STRIP
───────────────────────────── */
    .feat-strip {
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr;
        gap: 16px;
    }

    @media(max-width:800px) {
        .feat-strip {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:500px) {
        .feat-strip {
            grid-template-columns: 1fr;
        }
    }

    .feat-item {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid var(--g-border);
        cursor: pointer;
        transition: transform .35s cubic-bezier(.23, 1, .32, 1), box-shadow .35s;
    }

    .feat-item:hover {
        transform: translateY(-6px);
    }

    .feat-item img {
        width: 100%;
        object-fit: cover;
        display: block;
        filter: brightness(.7) saturate(1.15);
        transition: filter .4s, transform .5s;
    }

    .feat-item:hover img {
        filter: brightness(.85) saturate(1.3);
        transform: scale(1.05);
    }

    .feat-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        backdrop-filter: blur(8px);
    }

    /* ─────────────────────────────
   HORIZONTAL SCROLL STRIP
───────────────────────────── */
    .hscroll-track {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding: 8px 0 20px;
        scrollbar-width: thin;
        scrollbar-color: var(--g-teal) var(--g-surface);
        -webkit-overflow-scrolling: touch;
    }

    .hscroll-track::-webkit-scrollbar {
        height: 4px;
    }

    .hscroll-track::-webkit-scrollbar-track {
        background: var(--g-surface);
        border-radius: 2px;
    }

    .hscroll-track::-webkit-scrollbar-thumb {
        background: var(--g-teal);
        border-radius: 2px;
    }

    .hscroll-card {
        flex-shrink: 0;
        width: 240px;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid var(--g-border);
        position: relative;
        cursor: pointer;
        transition: transform .3s, box-shadow .3s;
    }

    .hscroll-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
    }

    .hscroll-card img {
        width: 100%;
        height: 170px;
        object-fit: cover;
        display: block;
        filter: brightness(.72) saturate(1.1);
        transition: filter .35s;
    }

    .hscroll-card:hover img {
        filter: brightness(.9) saturate(1.3);
    }

    /* ─────────────────────────────
   QUOTE BAND
───────────────────────────── */
    .quote-band {
        background: linear-gradient(135deg, rgba(45, 212, 191, .06), rgba(167, 139, 250, .06));
        border-top: 1px solid rgba(45, 212, 191, .1);
        border-bottom: 1px solid rgba(167, 139, 250, .1);
        padding: 56px 24px;
        text-align: center;
    }

    /* ─────────────────────────────
   BENTO GRID
───────────────────────────── */
    .bento {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: 220px 220px;
        gap: 14px;
    }

    @media(max-width:900px) {
        .bento {
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto;
        }
    }

    @media(max-width:500px) {
        .bento {
            grid-template-columns: 1fr;
        }
    }

    .bento-item {
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        border: 1px solid var(--g-border);
        cursor: pointer;
        transition: transform .35s cubic-bezier(.23, 1, .32, 1), box-shadow .35s;
    }

    .bento-item:hover {
        transform: scale(1.025);
        box-shadow: 0 20px 50px rgba(0, 0, 0, .55);
    }

    .bento-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: brightness(.68) saturate(1.15);
        transition: filter .4s, transform .5s;
    }

    .bento-item:hover img {
        filter: brightness(.85) saturate(1.3);
        transform: scale(1.07);
    }

    .bento-item.span2 {
        grid-column: span 2;
    }

    .bento-item.row2 {
        grid-row: span 2;
    }

    .bento-label {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(13, 15, 20, .85), transparent);
        padding: 18px 18px 16px;
        opacity: 0;
        transform: translateY(8px);
        transition: opacity .3s, transform .3s;
    }

    .bento-item:hover .bento-label {
        opacity: 1;
        transform: none;
    }

    /* ─────────────────────────────
   STATS ROW
───────────────────────────── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    @media(max-width:700px) {
        .stats-row {
            grid-template-columns: 1fr 1fr;
        }
    }

    .stat-tile {
        background: var(--g-card);
        border: 1px solid var(--g-border);
        border-radius: 20px;
        padding: 28px 22px;
        text-align: center;
        transition: border-color .3s, transform .3s;
        position: relative;
        overflow: hidden;
    }

    .stat-tile::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        opacity: 0;
        transition: opacity .3s;
    }

    .stat-tile.t-teal::after {
        background: var(--g-teal);
    }

    .stat-tile.t-rose::after {
        background: var(--g-rose);
    }

    .stat-tile.t-amber::after {
        background: var(--g-amber);
    }

    .stat-tile.t-violet::after {
        background: var(--g-violet);
    }

    .stat-tile:hover {
        transform: translateY(-4px);
    }

    .stat-tile.t-teal:hover {
        border-color: rgba(45, 212, 191, .3);
    }

    .stat-tile.t-rose:hover {
        border-color: rgba(251, 113, 133, .3);
    }

    .stat-tile.t-amber:hover {
        border-color: rgba(251, 191, 36, .3);
    }

    .stat-tile.t-violet:hover {
        border-color: rgba(167, 139, 250, .3);
    }

    .stat-tile:hover::after {
        opacity: 1;
    }

    /* ─────────────────────────────
   LIGHTBOX
───────────────────────────── */
    #gLightbox {
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, .92);
        backdrop-filter: blur(10px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    #gLightbox.open {
        display: flex;
    }

    #gLightbox img {
        max-width: 90vw;
        max-height: 85vh;
        border-radius: 16px;
        box-shadow: 0 40px 100px rgba(0, 0, 0, .7);
        object-fit: contain;
    }

    #gLbClose {
        position: absolute;
        top: 20px;
        right: 24px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .1);
        border: none;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
    }

    #gLbClose:hover {
        background: rgba(255, 255, 255, .2);
    }

    #gLbCaption {
        position: absolute;
        bottom: 28px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: #fff;
    }

    body {
        padding-top: 0px !important;
        /* Adjust according to header height */
    }

    body.page-gallery .lc-footer{
      --green:#3d6b4a !important; --green2:#2d5a3d !important; --greenlit:#6fa882 !important;
      --gold:#122dd1 !important; --gold2:#b8922e !important;
      --cream:#f2ead8 !important; --text:#ede8de !important;
      --bg:#0a0908 !important; --surface:#131211 !important; --surface2:#1a1917 !important;
      --border:rgba(242,234,216,0.08) !important; --border2:rgba(201,168,76,0.16) !important;
      --muted:#9a9488 !important; --muted2:#b3ab9c !important;
      background:var(--bg) !important; color:var(--muted2) !important; font-family:'DM Sans',sans-serif !important;
      border-top:1px solid var(--border) !important; position:relative !important; overflow:hidden !important;
      display:block !important; width:100% !important;
    }


    /* our team section  */
    #our-team { scroll-margin-top: 90px; }
 
 .tm-row {
     display: flex;
     gap: 14px;
     height: 540px;
 }

 .tm-panel {
     position: relative;
     flex: 1;
     min-width: 0;
     border-radius: 18px;
     overflow: hidden;
     cursor: pointer;
     border: 1px solid var(--about-border, rgba(255,255,255,0.08));
     background: #111;
     transition: flex .6s cubic-bezier(.22,.8,.26,1), border-color .4s;
     outline: none;
 }
 .tm-panel.is-active { flex: 2.8; border-color: rgba(201,168,76,0.45); }

 .tm-panel img {
     position: absolute; inset: 0;
     width: 100%; height: 100%;
     object-fit: cover;
     filter: brightness(.5) sepia(.2);
     transform: scale(1.08);
     transition: transform .9s ease, filter .6s ease;
 }
 .tm-panel.is-active img { transform: scale(1); filter: brightness(.62) sepia(.15); }

 .tm-panel::after {
     content: "";
     position: absolute; inset: 0;
     background: linear-gradient(to top, rgba(10,10,10,.96) 8%, rgba(10,10,10,.35) 55%, transparent 100%);
 }

 .tm-num {
     position: absolute; top: 20px; left: 22px; z-index: 2;
     font-size: 13px; font-weight: 600; letter-spacing: 3px;
     color: var(--about-gold);
 }

 .tm-body {
     position: absolute; left: 0; right: 0; bottom: 0; z-index: 2;
     padding: 28px;
 }
 .tm-tag {
     display: inline-block;
     font-size: 10px; letter-spacing: 2px; text-transform: uppercase;
     padding: 5px 12px; border-radius: 99px; margin-bottom: 12px;
     background: rgba(201,168,76,0.1);
     border: 1px solid rgba(201,168,76,0.3);
     color: var(--about-gold);
 }
 .tm-tag.green {
     background: rgba(74,222,128,0.08);
     border-color: rgba(74,222,128,0.3);
     color: var(--about-greenlit);
 }
 .tm-title {
     font-size: 1.25rem; font-weight: 700; line-height: 1.25;
     color: var(--about-cream); margin: 0;
 }
 .tm-text {
     font-size: 13.5px; line-height: 1.75;
     color: rgba(255,255,255,.72);
     max-height: 0; opacity: 0; overflow: hidden;
     margin: 0;
     transition: max-height .6s ease, opacity .5s ease .1s, margin .4s;
 }
 .tm-panel.is-active .tm-text { max-height: 260px; opacity: 1; margin-top: 14px; }

 .tm-line {
     display: block; height: 2px; width: 0; margin-top: 18px;
     background: linear-gradient(90deg, var(--about-gold), transparent);
     transition: width .7s ease .15s;
 }
 .tm-panel.is-active .tm-line { width: 90px; }

 /* Tablet / mobile: stack cards, show all text */
 @media (max-width: 860px) {
     .tm-row { flex-direction: column; height: auto; }
     .tm-panel, .tm-panel.is-active { flex: none; min-height: 380px; }
     .tm-panel img { filter: brightness(.55) sepia(.15); transform: none; }
     .tm-text { max-height: none; opacity: 1; margin-top: 14px; }
     .tm-line { width: 90px; }
 }

/* font of legal text size */

#legal p, #legal li { letter-spacing: .1px; }

/* Main paragraphs */
#legal .g-reveal.gd2 p:first-child { font-size: 19px !important; line-height: 1.9 !important; }
#legal .g-reveal.gd2 p:last-child  { font-size: 17px !important; line-height: 1.9 !important;
                                     color: var(--g-cream) !important; opacity: .8; }

/* Cards */
#legal .lm-card h3 { font-size: 1.6rem !important; }
#legal .lm-card p  { font-size: 16px !important; line-height: 1.8 !important;
                     color: var(--g-cream) !important; opacity: .78; }
#legal .lm-list li { font-size: 15px !important; padding: 12px 0 12px 24px !important; }
#legal .lm-list li::before { top: 19px !important; }
#legal .lm-num { font-size: 13px !important; }

/* How we work */
#legal .lm-step p { font-size: 15.5px !important; line-height: 1.8 !important;
                    color: var(--g-cream) !important; opacity: .8; }

/* Disclaimer */
#legal > div > p:last-child { font-size: 13.5px !important; line-height: 1.8 !important; opacity: .75; }
</style>

<div class="gallery-wrap">

    {{-- ══ HERO ══ --}}
    <section class="g-hero">
        <div class="g-orb" style="width:800px;height:800px;background:radial-gradient(circle,rgba(45,212,191,0.12),transparent);top:-300px;left:50%;transform:translateX(-50%);"></div>
        <div class="g-orb" style="width:400px;height:400px;background:radial-gradient(circle,rgba(251,113,133,0.1),transparent);bottom:-100px;right:-80px;"></div>
        <div class="g-orb" style="width:300px;height:300px;background:radial-gradient(circle,rgba(167,139,250,0.1),transparent);bottom:-50px;left:-60px;"></div>
        <!-- grid overlay -->
        <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.02) 1px,transparent 1px);background-size:50px 50px;pointer-events:none;"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <div class="g-reveal gd1 flex justify-center mb-7">
                <span class="g-tag" style="background:rgba(45,212,191,0.1);color:var(--g-teal);border:1px solid rgba(45,212,191,0.25);">
                    <span class="pulse-dot" style="background:var(--g-teal);color:var(--g-teal);"></span>
                    Visual Showcase
                </span>
            </div>

            <h1 class="g-serif g-reveal gd2 mb-6" style="font-size:clamp(3rem,8vw,5.5rem);font-weight:900;line-height:1.0;letter-spacing:-3px;color:var(--g-cream);">
                The World of<br />
                <span class="g-shimmer" style="font-style:italic;font-weight:400;">Medico-Legal</span><br />
                Excellence.
            </h1>

            <p class="g-reveal gd3 mb-12" style="font-size:1.1rem;color:var(--g-muted);line-height:1.85;max-width:540px;margin-left:auto;margin-right:auto;margin-bottom:3rem;font-weight:300;">
                A curated visual journey through the people, places, and moments that define India's most trusted medico-legal intelligence platform.
            </p>

            <!-- Category filter pills -->
            <div class="g-reveal gd4 flex flex-wrap justify-center gap-3 mb-4">
                <button class="g-filter-btn active" data-cat="all" style="padding:9px 20px;border-radius:999px;font-size:12px;font-weight:600;
                           letter-spacing:.5px;cursor:pointer;transition:.25s;font-family:'Outfit',sans-serif;
                           background:var(--g-teal);color:#0d0f14;border:1px solid var(--g-teal);">
                    All
                </button>
                <button class="g-filter-btn" data-cat="team" style="padding:9px 20px;border-radius:999px;font-size:12px;font-weight:600;
                           letter-spacing:.5px;cursor:pointer;transition:.25s;font-family:'Outfit',sans-serif;
                           background:transparent;color:var(--g-muted);border:1px solid var(--g-border);">
                    Our Team
                </button>
                <button class="g-filter-btn" data-cat="events" style="padding:9px 20px;border-radius:999px;font-size:12px;font-weight:600;
                           letter-spacing:.5px;cursor:pointer;transition:.25s;font-family:'Outfit',sans-serif;
                           background:transparent;color:var(--g-muted);border:1px solid var(--g-border);">
                    Events
                </button>
                <button class="g-filter-btn" data-cat="office" style="padding:9px 20px;border-radius:999px;font-size:12px;font-weight:600;
                           letter-spacing:.5px;cursor:pointer;transition:.25s;font-family:'Outfit',sans-serif;
                           background:transparent;color:var(--g-muted);border:1px solid var(--g-border);">
                    Office & Culture
                </button>
                <button class="g-filter-btn" data-cat="legal" style="padding:9px 20px;border-radius:999px;font-size:12px;font-weight:600;
                           letter-spacing:.5px;cursor:pointer;transition:.25s;font-family:'Outfit',sans-serif;
                           background:transparent;color:var(--g-muted);border:1px solid var(--g-border);">
                    Legal & Medical
                </button>
            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ FEATURED STRIP ══ --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="g-reveal gd1 flex items-center gap-4 mb-8">
                <span class="g-tag" style="background:rgba(251,113,133,0.1);color:var(--g-rose);border:1px solid rgba(251,113,133,0.22);">Featured</span>
                <h2 class="g-serif" style="font-size:1.8rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px;">Highlights</h2>
            </div>

            <div class="feat-strip g-reveal gd2">
                <!-- Large hero image -->
                <div class="feat-item" style="height:420px;" onclick="openLightbox(this)">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=900&q=85" alt="Medical team" style="height:100%;">
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.85),transparent 50%);"></div>
                    <span class="feat-badge" style="background:rgba(45,212,191,.18);color:var(--g-teal);border:1px solid rgba(45,212,191,.3);">Team</span>
                    <div style="position:absolute;bottom:22px;left:22px;right:22px;">
                        <p class="g-serif" style="font-size:1.3rem;font-weight:700;color:#fff;margin:0 0 6px;">Our Founding Team</p>
                        <p style="font-size:13px;color:rgba(255,255,255,.6);margin:0;font-weight:300;">Doctors , Lawyers, Engineers & Journalists</p>
                    </div>
                </div>

                <!-- Right column -->
                <div style="display:flex;flex-direction:column;gap:16px;">
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=600&q=80" alt="Legal books" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(251,191,36,.15);color:var(--g-amber);border:1px solid rgba(251,191,36,.25);">Legal</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Lawyers Nationwide</p>
                        </div>
                    </div>
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=600&q=80" alt="Doctor" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(167,139,250,.15);color:var(--g-violet);border:1px solid rgba(167,139,250,.25);">Medical</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Experienced Doctors</p>
                        </div>
                    </div>
                </div>

                <!-- Third column -->
                <div style="display:flex;flex-direction:column;gap:16px;">
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://plus.unsplash.com/premium_photo-1698084059560-9a53de7b816b?q=80&w=811&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Office" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(45,212,191,.15);color:var(--g-teal);border:1px solid rgba(45,212,191,.25);">Library</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Repository of Knowledge</p>
                        </div>
                    </div>
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://plus.unsplash.com/premium_photo-1694476607274-003dd175d073?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Event" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(251,113,133,.15);color:var(--g-rose);border:1px solid rgba(251,113,133,.25);">Synergy</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">greater Together Then Apart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ STATS ══ --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="stats-row g-reveal gd1">
                <div class="stat-tile t-teal">
                    <div style="font-size:11px;color:var(--g-muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">Photos</div>
                    <div class="g-serif" style="font-size:2.5rem;font-weight:900;color:var(--g-teal);line-height:1;">500+</div>
                    <div style="font-size:12px;color:var(--g-muted);margin-top:6px;">In our archive</div>
                </div>
                <div class="stat-tile t-rose">
                    <div style="font-size:11px;color:var(--g-muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">Events</div>
                    <div class="g-serif" style="font-size:2.5rem;font-weight:900;color:var(--g-rose);line-height:1;">48</div>
                    <div style="font-size:12px;color:var(--g-muted);margin-top:6px;">Covered nation wide</div>
                </div>
                <div class="stat-tile t-amber">
                    <div style="font-size:11px;color:var(--g-muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">Locations</div>
                    <div class="g-serif" style="font-size:2.5rem;font-weight:900;color:var(--g-amber);line-height:1;">22</div>
                    <div style="font-size:12px;color:var(--g-muted);margin-top:6px;">Cities represented</div>
                </div>
                <div class="stat-tile t-violet">
                    <div style="font-size:11px;color:var(--g-muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:10px;">Years</div>
                    <div class="g-serif" style="font-size:2.5rem;font-weight:900;color:var(--g-violet);line-height:1;">4</div>
                    <div style="font-size:12px;color:var(--g-muted);margin-top:6px;">Of visual storytelling</div>
                </div>
            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ MASONRY GALLERY ══ --}}
    <section class="py-16 px-6" id="mainGallery">
        <div class="max-w-6xl mx-auto">
            <div class="g-reveal gd1 flex items-center gap-4 mb-10">
                <span class="g-tag" style="background:rgba(167,139,250,0.1);color:var(--g-violet);border:1px solid rgba(167,139,250,0.22);">Browse All</span>
                <h2 class="g-serif" style="font-size:1.8rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px;">Full Collection</h2>
            </div>

            <div class="masonry g-reveal gd2" id="masonryGrid">

                <div class="masonry-item c-teal" data-cat="team" onclick="openLightbox(this)" data-caption="Nothing is Overlooked">
                    <img src="https://images.unsplash.com/photo-1526930382372-67bf22c0fce2?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team" style="height:320px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Nothing is Overlooked</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Innovation Lowers The Barrier Of Entry">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=600&q=80" alt="Legal" style="height:220px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Legal</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Innovation Lowers The Barrier Of Entry</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="events" onclick="openLightbox(this)" data-caption="Knowledge Multiplies When Shared">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80" alt="Event" style="height:280px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Knowledge Multiplies When Shared</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="team" onclick="openLightbox(this)" data-caption="Crisis Demands Mastery, Not Guesswork">
                    <img src="https://images.unsplash.com/photo-1513224502586-d1e602410265?q=80&w=1031&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team" style="height:260px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-rose);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Crisis Demands Mastery, Not Guesswork</p>
                    </div>
                </div>

                <div class="masonry-item c-teal" data-cat="office" onclick="openLightbox(this)" data-caption="Technology Powers Perfection">
                    <img src="https://plus.unsplash.com/premium_photo-1702598479744-f0fefa59d3a2?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Office" style="height:200px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Culture</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Technology Powers Perfection</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Smarter Hardware & Sharper Intelligence">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&q=80" alt="Medical" style="height:300px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Medical</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Smarter Hardware & Sharper Intelligence</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="team" onclick="openLightbox(this)" data-caption="Legal Vigilance & Protects Practice">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team" style="height:240px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Legal Vigilance & Protects Practice</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="events" onclick="openLightbox(this)" data-caption="Make Your Voice Heard">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&q=80" alt="Event" style="height:220px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-rose);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Make Your Voice Heard</p>
                    </div>
                </div>

                <div class="masonry-item c-teal" data-cat="office" onclick="openLightbox(this)" data-caption="Keep Researching, Keep Advancing">
                    <img src="https://images.unsplash.com/photo-1524683745036-b46f52b8505a?q=80&w=415&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Office" style="height:260px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Office</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Keep Researching, Keep Advancing</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Doctor consultation — patient rights">
                    <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=600&q=80" alt="Medical" style="height:210px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Medical</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Doctor Consultation</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="events" onclick="openLightbox(this)" data-caption="Full-Spectrum Network Architecture">
                    <img src="https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?w=600&q=80" alt="Event" style="height:290px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Full-Spectrum Network Architecture</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="office" onclick="openLightbox(this)" data-caption="Leadership Strategy Meet">
                    <img src="https://plus.unsplash.com/premium_photo-1673958771993-f1c596da32f5?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Office" style="height:230px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-rose);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Culture</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Leadership Strategy Meet</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ QUOTE BAND ══ --}}
    <div class="quote-band g-reveal gd1">
        <div class="max-w-3xl mx-auto">
            <div style="font-size:3rem;margin-bottom:16px;opacity:.5;">"</div>
            <p class="g-serif" style="font-size:clamp(1.4rem,3vw,2rem);font-style:italic;font-weight:400;color:var(--g-cream);line-height:1.6;margin:0 0 20px;">
            "Ignorantia juris non excusat." Ignorance of the law excuses no one.
            </p>
            <div style="font-size:12px;color:var(--g-teal);letter-spacing:2px;text-transform:uppercase;font-weight:600;">
                — Ancient Roman legal maxim
            </div>
        </div>
    </div>

    <div class="g-divider"></div>

    {{-- ══ HORIZONTAL SCROLL — EVENTS ══ --}}
    <section class="py-16 px-6" id="events">
        <div class="max-w-6xl mx-auto">
            <div class="g-reveal gd1 flex items-center justify-between mb-8 flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <span class="g-tag" style="background:rgba(251,191,36,0.1);color:var(--g-amber);border:1px solid rgba(251,191,36,0.22);">Event</span>
                    <h2 class="g-serif" style="font-size:1.8rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px;">Etched In Our Memory</h2>
                </div>
                <p style="font-size:13px;color:var(--g-muted);">← Scroll to explore →</p>
            </div>

            <div class="hscroll-track g-reveal gd2">
                @php
                $eventImgs = [
                ['https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=500&q=80','Knowledge multiplies when shared','Team Lawcription'],
                ['https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=500&q=80','Make your voice heard','Team Lawcription'],
                ['https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?w=500&q=80','Full-spectrum network architecture','Team Lawcription'],
                ['https://images.unsplash.com/photo-1777443726993-8f9c8e96e46e?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D','Tech Drives Our Core','Team Lawcription'],
                ['https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=500&q=80','Committed To Shared Success','Team Lawcription'],
                ['https://images.unsplash.com/photo-1737984954497-06d1615cc177?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D','Small Actions , Vital Rescues','Team Lawcription'],
                ['https://images.unsplash.com/photo-1512102438733-bfa4ed29aef7?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D','Teamwork Resolves Crises','Team Lawcription'],
                ];
                @endphp
                @foreach($eventImgs as $ev)
                <div class="hscroll-card" onclick="openLightbox(this)" data-caption="{{ $ev[0] }} — {{ $ev[1] }}, {{ $ev[2] }}">
                    <img src="{{ $ev[0] }}" alt="{{ $ev[1] }}">
                    <div style="padding:14px 16px;background:var(--g-card);">
                        <p style="font-size:13px;font-weight:600;color:var(--g-cream);margin:0 0 3px;">{{ $ev[1] }}</p>
                        <p style="font-size:11px;color:var(--g-muted);margin:0;">{{ $ev[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ BENTO GRID ══ --}}
    <section class="py-16 px-6" id="life-at-lawcription" style="background-color: #111;">
    <div class="max-w-6xl mx-auto">
        <div class="g-reveal gd1 flex items-center gap-4 mb-10">
            <span class="g-tag" style="background:rgba(251,113,133,0.1);color:var(--g-rose);border:1px solid rgba(251,113,133,0.22); padding: 4px 12px; border-radius: 99px; font-weight: 500;">Culture</span>
            <h2 class="g-serif" style="font-size:2.2rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px; margin: 0;">Life at Lawcription™</h2>
        </div>

        <div class="bento g-reveal gd2" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; grid-auto-rows: minmax(180px, auto);">
            
            <!-- Item 1: HQ -->
            <div class="bento-item" style="grid-row: span 2; position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1618939304347-e91b1f33d2ab?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Modern office building" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:16px;font-weight:600;color:#fff;margin:0 0 4px;">The Heart</p>
                    <p style="font-size:13px;color:rgba(255,255,255,.7);margin:0;">The heart: Every beat builds tomorrow</p>
                </div>
            </div>

            <!-- Item 2: Collaboration -->
            <div class="bento-item" style="position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="People having a discussion in a bright room" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Team Collaboration</p>
                </div>
            </div>

            <!-- Item 3: Retreat -->
            <div class="bento-item" style="position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=600&h=400&auto=format&fit=crop" alt="Team high-fiving outdoors" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Team Retreat</p>
                </div>
            </div>

            <!-- Item 4: Strategy (Span 2) -->
            <div class="bento-item" style="grid-column: span 2; position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1200&h=500&auto=format&fit=crop" alt="Business people discussing charts on a whiteboard" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:16px;font-weight:600;color:#fff;margin:0 0 4px;">Strategy Planning</p>
                    <p style="font-size:13px;color:rgba(255,255,255,.7);margin:0;">Leadership team quarterly session</p>
                </div>
            </div>

            <!-- Item 5: Research -->
            <div class="bento-item" style="position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=600&h=400&auto=format&fit=crop" alt="Person writing in a notebook near a laptop" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Deep Research</p>
                </div>
            </div>

            <!-- Item 6: Recording -->
            <div class="bento-item" style="position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1559757175-5700dde675bc?q=80&w=1031&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Two microphones in a professional studio" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Content Studio</p>
                </div>
            </div>

            <!-- Item 7: Celebration -->
            <div class="bento-item" style="position: relative; overflow: hidden; border-radius: 12px; cursor: pointer;">
                <img src="https://images.unsplash.com/photo-1516997121675-4c2d1684aa3e?q=80&w=600&h=400&auto=format&fit=crop" alt="Group of colleagues celebrating with confetti" style="width: 100%; height: 100%; object-fit: crop;">
                <div class="bento-label" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                    <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Achievement Awards</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="legal" class="py-20 px-6" style="scroll-margin-top:90px;position:relative;overflow:hidden;">

    <style>
        .lm-glow{position:absolute;top:-120px;right:-120px;width:420px;height:420px;border-radius:50%;
                 background:radial-gradient(circle,rgba(251,191,36,.12),transparent 70%);pointer-events:none;}
        .lm-card{background:var(--g-card);border:1px solid var(--g-border);border-radius:20px;padding:30px;
                 position:relative;transition:.3s;}
        .lm-card:hover{transform:translateY(-6px);border-color:rgba(251,191,36,.45);
                       box-shadow:0 18px 40px rgba(0,0,0,.35);}
        .lm-num{font-size:12px;font-weight:700;letter-spacing:2px;color:var(--g-amber);margin-bottom:14px;display:block;}
        .lm-list{list-style:none;padding:0;margin:18px 0 0;}
        .lm-list li{font-size:13px;color:var(--g-cream);padding:9px 0 9px 22px;position:relative;
                    border-top:1px solid var(--g-border);}
        .lm-list li::before{content:"";position:absolute;left:0;top:16px;width:8px;height:8px;border-radius:50%;
                            background:var(--g-amber);}
        .lm-step{flex:1 1 220px;padding:22px;border-left:2px solid rgba(251,191,36,.35);}
    </style>

    <div class="lm-glow"></div>

    <div class="max-w-6xl mx-auto" style="position:relative;">

        {{-- Heading --}}
        <div class="g-reveal gd1 mb-10" style="max-width:760px;">
            <span class="g-tag" style="background:rgba(251,191,36,0.1);color:var(--g-amber);border:1px solid rgba(251,191,36,0.22);">Legal &amp; Medical</span>
            <h2 class="g-serif" style="font-size:2.4rem;line-height:1.15;font-weight:700;color:var(--g-cream);letter-spacing:-.8px;margin:18px 0 0;">
                Where <span style="color:var(--g-amber);">medicine</span> meets the <span style="color:var(--g-amber);">law</span>,<br>clarity begins.
            </h2>
        </div>

        {{-- Long paragraph --}}
        <div class="g-reveal gd2 mb-12" style="max-width:860px;">
            <p style="font-size:16px;line-height:1.9;color:var(--g-cream);margin:0 0 18px;">
                Some of life's hardest moments sit exactly where two worlds overlap: a medical report that a court must understand, a treatment decision with legal consequences, or a patient who simply wants to know their rights. At Lawcription, we work in that space every day. Our team brings together practising doctors, experienced lawyers, journalists and software engineers, so every piece of work is checked from more than one angle before it reaches you.
            </p>
            <p style="font-size:14.5px;line-height:1.9;color:var(--g-muted);margin:0;">
                We believe that legal and medical information should be accurate, readable and respectful of the person reading it. That is why we turn complex terminology into plain language, organise records so nothing important is lost, and build tools that save time for professionals and families alike. Whether you are a clinician, an advocate, a hospital or an individual looking for direction, our goal is the same: to make a complicated process feel clear, calm and manageable.
            </p>
        </div>

        {{-- Two main cards --}}
        <div class="g-reveal gd3" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:22px;">
            <div class="lm-card">
                <span class="lm-num">01 &nbsp;—&nbsp; LEGAL</span>
                <h3 class="g-serif" style="font-size:1.35rem;font-weight:700;color:var(--g-cream);margin:0 0 10px;">Clear, careful legal support</h3>
                <p style="font-size:13.5px;line-height:1.8;color:var(--g-muted);margin:0;">
                    Our lawyers help translate legal language into steps you can act on, with documents prepared accurately and explained in words you can follow.
                </p>
                <ul class="lm-list">
                    <li>Drafting and review of legal documents</li>
                    <li>Notices, agreements and case paperwork</li>
                    <li>Plain-language explanation of your rights</li>
                </ul>
            </div>

            <div class="lm-card">
                <span class="lm-num">02 &nbsp;—&nbsp; MEDICAL</span>
                <h3 class="g-serif" style="font-size:1.35rem;font-weight:700;color:var(--g-cream);margin:0 0 10px;">Medical insight you can trust</h3>
                <p style="font-size:13.5px;line-height:1.8;color:var(--g-muted);margin:0;">
                    Our doctors read between the clinical lines, helping make records, prescriptions and reports understandable for everyone involved in a case.
                </p>
                <ul class="lm-list">
                    <li>Review and summary of medical records</li>
                    <li>Medico-legal opinions and documentation</li>
                    <li>Health information written for real people</li>
                </ul>
            </div>

            <div class="lm-card">
                <span class="lm-num">03 &nbsp;—&nbsp; TOGETHER</span>
                <h3 class="g-serif" style="font-size:1.35rem;font-weight:700;color:var(--g-cream);margin:0 0 10px;">One team, one clear answer</h3>
                <p style="font-size:13.5px;line-height:1.8;color:var(--g-muted);margin:0;">
                    Doctors, lawyers, writers and engineers work side by side, so accuracy, readability and technology come together in everything we deliver.
                </p>
                <ul class="lm-list">
                    <li>Every document reviewed from two professions</li>
                    <li>Clean digital records, easy to find and share</li>
                    <li>Reliable support from first question to final file</li>
                </ul>
            </div>
        </div>

        {{-- How we work --}}
        <div class="g-reveal gd4" style="margin-top:56px;">
            <p class="g-serif" style="font-size:1.25rem;font-weight:700;color:var(--g-cream);margin:0 0 18px;">How we work</p>
            <div style="display:flex;flex-wrap:wrap;gap:8px;">
                <div class="lm-step">
                    <span class="lm-num">STEP 1</span>
                    <p style="font-size:13px;line-height:1.7;color:var(--g-muted);margin:0;"><b style="color:var(--g-cream);">Listen.</b> We understand your situation and what you need before doing anything else.</p>
                </div>
                <div class="lm-step">
                    <span class="lm-num">STEP 2</span>
                    <p style="font-size:13px;line-height:1.7;color:var(--g-muted);margin:0;"><b style="color:var(--g-cream);">Review.</b> Our legal and medical experts examine the details together.</p>
                </div>
                <div class="lm-step">
                    <span class="lm-num">STEP 3</span>
                    <p style="font-size:13px;line-height:1.7;color:var(--g-muted);margin:0;"><b style="color:var(--g-cream);">Deliver.</b> You receive clear, organised and ready-to-use results.</p>
                </div>
            </div>
        </div>

        {{-- Note --}}
        <p class="g-reveal gd4" style="font-size:11.5px;line-height:1.7;color:var(--g-muted);margin:40px 0 0;max-width:760px;border-top:1px solid var(--g-border);padding-top:18px;">
            The information on this page is for general guidance and does not replace personal legal advice or a medical consultation. Please speak to a qualified professional about your specific situation.
        </p>

    </div>
</section>

    <div class="g-divider"></div>

    <section id="our-team" class="py-24 px-6">
                
        <div class="max-w-6xl mx-auto">
        <div class="g-reveal gd1 flex items-center gap-4 mb-10">
            <span class="g-tag" style="background:rgba(251,113,133,0.1);color:var(--g-rose);border:1px solid rgba(251,113,133,0.22); padding: 4px 12px; border-radius: 99px; font-weight: 500;">Our Team</span>
        </div>
    
            <div class="text-center mb-14 reveal d1">
                <h2 class="about-serif mb-3" style="font-size:clamp(1.9rem,4vw,2.9rem);font-weight:700;letter-spacing:-1px;color:var(--about-cream);">Behind Lawcription.</h2>
                <p class="about-serif" style="color:var(--about-muted);font-size:1.1rem;max-width:480px;margin:0 auto;">Doctors, advocates, and journalists — united by one purpose.</p>
            </div>
    
            <div class="tm-row reveal d2" id="tmRow">
    
                <!-- 01 Doctors & Lawyers -->
                <div class="tm-panel is-active" tabindex="0">
                    <img src="{{ asset('frontend/images/menu/21.png') }}" alt="Dedicated doctors and lawyers" />
                    <span class="tm-num">01</span>
                    <div class="tm-body">
                        <span class="tm-tag">Founder’s Vision</span>
                        <h3 class="tm-title about-serif">Dedicated Doctors &amp; Lawyers</h3>
                        <p class="tm-text">Lawcription unites medicine and law with one purpose—protecting life, dignity, and justice. Doctors heal. Lawyers protect. Together, they create confidence for healthcare professionals, fairness for patients, and a stronger foundation of trust in healthcare.</p>
                        <span class="tm-line"></span>
                    </div>
                </div>
    
                <!-- 02 Engineers -->
                <div class="tm-panel" tabindex="0">
                    <img src="{{ asset('frontend/images/menu/22.png') }}" alt="Innovative software engineers" />
                    <span class="tm-num">02</span>
                    <div class="tm-body">
                        <span class="tm-tag green">Experienced Software Team</span>
                        <h3 class="tm-title about-serif">Innovative Engineers</h3>
                        <p class="tm-text">Behind Lawcription stands a team of visionary software engineers who transform ideas into intelligent technology. With precision, innovation, and dedication, they give our vision its digital life.</p>
                        <span class="tm-line"></span>
                    </div>
                </div>
    
                <!-- 03 Journalists -->
                <div class="tm-panel" tabindex="0">
                    <img src="{{ asset('frontend/images/menu/23.png') }}" alt="Committed journalists" />
                    <span class="tm-num">03</span>
                    <div class="tm-body">
                        <span class="tm-tag">Media Professional</span>
                        <h3 class="tm-title about-serif">Committed Journalists</h3>
                        <p class="tm-text">Behind every trusted update is a commitment to truth. Our dedicated journalists transform complex developments into clear, timely, and meaningful information. Through careful research, verification, and responsible reporting, they keep Lawcription accurate, relevant, and connected to the world as it changes.</p>
                        <span class="tm-line"></span>
                    </div>
                </div>
    
            </div>
        </div>
    </section>

    <div class="g-divider"></div>

    {{-- ══ CTA ══ --}}
    <section class="relative py-28 px-6 text-center overflow-hidden">
        <div class="g-orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(45,212,191,0.14),transparent);top:50%;left:50%;transform:translate(-50%,-50%);"></div>
        <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.015) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.015) 1px,transparent 1px);background-size:50px 50px;pointer-events:none;"></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <div class="g-reveal gd1" style="font-size:3rem;margin-bottom:16px;">🏥</div>
            <h2 class="g-serif g-reveal gd2 mb-5" style="font-size:clamp(2rem,5vw,3.2rem);font-weight:900;letter-spacing:-2px;line-height:1.1;color:var(--g-cream);">
                Be part of this story.<br />
                <span class="g-shimmer" style="font-style:italic;font-weight:400;">Join 12,000+ doctors.</span>
            </h2>
            <p class="g-reveal gd3 mb-10" style="color:var(--g-muted);font-size:1.1rem;line-height:1.8;font-weight:300;">
                
Join Risk-Free — Access Starts Instantly. No credit card required.
            </p>
            <div class="g-reveal gd4 flex gap-4 justify-center flex-wrap">
                <a href="{{ route('subscription.index') }}" style="text-decoration:none;">
                    <button style="padding:16px 36px;border-radius:14px;
                               background:linear-gradient(135deg,var(--g-teal),#0d9488);
                               border:none;cursor:pointer;
                               font-family:'Outfit',sans-serif;font-size:14px;font-weight:600;
                               color:#0d0f14;letter-spacing:.5px;
                               box-shadow:0 8px 28px rgba(45,212,191,0.3);
                               transition:transform .2s,box-shadow .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 14px 36px rgba(45,212,191,.45)'" onmouseout="this.style.transform='';this.style.boxShadow='0 8px 28px rgba(45,212,191,.3)'">
                        Get Started →
                    </button>
                </a>
                <a href="{{ route('home') }}" style="text-decoration:none;">
                    <button style="padding:16px 36px;border-radius:14px;
                               background:transparent;
                               border:1px solid rgba(255,255,255,0.1);
                               cursor:pointer;font-family:'Outfit',sans-serif;
                               font-size:14px;font-weight:600;color:var(--g-text);
                               transition:border-color .2s,background .2s;" onmouseover="this.style.borderColor='rgba(255,255,255,.2)';this.style.background='rgba(255,255,255,.04)'" onmouseout="this.style.borderColor='rgba(255,255,255,.1)';this.style.background='transparent'">
                        Back to Home ↑
                    </button>
                </a>
            </div>
        </div>
    </section>

</div>

{{-- LIGHTBOX --}}
<div id="gLightbox">
    <button id="gLbClose" onclick="closeLightbox()"><i class="fas fa-times"></i></button>
    <img id="gLbImg" src="" alt="Gallery photo">
    <div id="gLbCaption">
        <p id="gLbText" style="font-size:14px;color:rgba(255,255,255,.8);margin:0;font-weight:500;"></p>
    </div>
</div>

<script>
    // ── Scroll reveal ──
    const gRevEls = document.querySelectorAll('.g-reveal');
    const gIO = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                gIO.unobserve(e.target);
            }
        });
    }, {
        threshold: 0.1
    });
    gRevEls.forEach(el => gIO.observe(el));

    // ── Lightbox ──
    function openLightbox(el) {
        const img = el.querySelector('img');
        if (!img) return;
        document.getElementById('gLbImg').src = img.src;
        document.getElementById('gLbText').textContent = el.dataset.caption || '';
        document.getElementById('gLightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('gLightbox').classList.remove('open');
        document.getElementById('gLbImg').src = '';
        document.body.style.overflow = '';
    }
    document.getElementById('gLightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeLightbox();
    });

    // ── Filter pills ──
    document.querySelectorAll('.g-filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const cat = this.dataset.cat;

            // Update button styles
            document.querySelectorAll('.g-filter-btn').forEach(b => {
                b.style.background = 'transparent';
                b.style.color = 'var(--g-muted)';
                b.style.borderColor = 'var(--g-border)';
            });
            this.style.background = 'var(--g-teal)';
            this.style.color = '#0d0f14';
            this.style.borderColor = 'var(--g-teal)';

            // Filter masonry items
            document.querySelectorAll('#masonryGrid .masonry-item').forEach(item => {
                if (cat === 'all' || item.dataset.cat === cat) {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<script>
document.querySelector('.g-filter-btn[data-cat="office"]').addEventListener('click', function () {
  var target = document.getElementById('life-at-lawcription');
  if (target) {
    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
});
</script>

<script>
    // Expanding team panels (hover on desktop, tap/focus on touch + keyboard)
    (function () {
        var panels = document.querySelectorAll('#tmRow .tm-panel');
        function activate(p) {
            panels.forEach(function (x) { x.classList.remove('is-active'); });
            p.classList.add('is-active');
        }
        panels.forEach(function (p) {
            p.addEventListener('mouseenter', function () { activate(p); });
            p.addEventListener('focus', function () { activate(p); });
            p.addEventListener('click', function () { activate(p); });
        });
    })();
 
    // "Our Team" button -> smooth scroll to this section
    (function () {
        var btn = document.querySelector('.g-filter-btn[data-cat="team"]');
        if (!btn) return;
        btn.addEventListener('click', function () {
            var target = document.getElementById('our-team');
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    })();
</script>

<script>
document.querySelector('.g-filter-btn[data-cat="events"]')?.addEventListener('click', function () {
    document.getElementById('events')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
});
</script>
<script>
const sectionMap = {
    events: 'events',
    legal: 'legal'
};

document.querySelectorAll('.g-filter-btn').forEach(btn => {
    const target = sectionMap[btn.dataset.cat];
    if (!target) return;

    btn.addEventListener('click', () => {
        document.getElementById(target)?.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});
</script>

@endsection