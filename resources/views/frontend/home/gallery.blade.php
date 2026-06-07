@extends('frontend.layout.master')

@section('title', 'Lawcription – Gallery')

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
                        <p class="g-serif" style="font-size:1.3rem;font-weight:700;color:#fff;margin:0 0 6px;">Our Founding Medical Team</p>
                        <p style="font-size:13px;color:rgba(255,255,255,.6);margin:0;font-weight:300;">The doctors who started it all — New Delhi, 2021</p>
                    </div>
                </div>

                <!-- Right column -->
                <div style="display:flex;flex-direction:column;gap:16px;">
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=600&q=80" alt="Legal books" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(251,191,36,.15);color:var(--g-amber);border:1px solid rgba(251,191,36,.25);">Legal</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Supreme Court Archives</p>
                        </div>
                    </div>
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=600&q=80" alt="Doctor" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(167,139,250,.15);color:var(--g-violet);border:1px solid rgba(167,139,250,.25);">Medical</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Clinical Excellence Award</p>
                        </div>
                    </div>
                </div>

                <!-- Third column -->
                <div style="display:flex;flex-direction:column;gap:16px;">
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Office" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(45,212,191,.15);color:var(--g-teal);border:1px solid rgba(45,212,191,.25);">Office</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Mumbai HQ Studio</p>
                        </div>
                    </div>
                    <div class="feat-item" style="height:200px;" onclick="openLightbox(this)">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80" alt="Event" style="height:100%;">
                        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(13,15,20,.8),transparent 55%);"></div>
                        <span class="feat-badge" style="background:rgba(251,113,133,.15);color:var(--g-rose);border:1px solid rgba(251,113,133,.25);">Event</span>
                        <div style="position:absolute;bottom:16px;left:16px;">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Annual MedLaw Summit 2023</p>
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
                    <div style="font-size:12px;color:var(--g-muted);margin-top:6px;">Covered nationwide</div>
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

                <div class="masonry-item c-teal" data-cat="team" onclick="openLightbox(this)" data-caption="Dr. Arjun Sharma — Founder">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=600&q=80" alt="Team" style="height:320px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Dr. Arjun Sharma</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Supreme Court Library — New Delhi">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=600&q=80" alt="Legal" style="height:220px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Legal</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Supreme Court Library</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="events" onclick="openLightbox(this)" data-caption="MedLaw Conference 2023">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80" alt="Event" style="height:280px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">MedLaw Summit 2023</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="team" onclick="openLightbox(this)" data-caption="Adv. Priya Nair — Legal Director">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&q=80" alt="Team" style="height:260px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-rose);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Adv. Priya Nair</p>
                    </div>
                </div>

                <div class="masonry-item c-teal" data-cat="office" onclick="openLightbox(this)" data-caption="Editorial Team in session — Mumbai">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&q=80" alt="Office" style="height:200px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Culture</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Editorial Team Session</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Medical documentation review">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&q=80" alt="Medical" style="height:300px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Medical</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Clinical Documentation</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="team" onclick="openLightbox(this)" data-caption="Dr. Rohan Verma — CME Director">
                    <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=600&q=80" alt="Team" style="height:240px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Team</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Dr. Rohan Verma</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="events" onclick="openLightbox(this)" data-caption="CME Workshop — Bengaluru 2023">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&q=80" alt="Event" style="height:220px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-rose);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">CME Workshop Bengaluru</p>
                    </div>
                </div>

                <div class="masonry-item c-teal" data-cat="office" onclick="openLightbox(this)" data-caption="Research & Writing Studio">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Office" style="height:260px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-teal);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Office</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Research Studio</p>
                    </div>
                </div>

                <div class="masonry-item c-amber" data-cat="legal" onclick="openLightbox(this)" data-caption="Doctor consultation — patient rights">
                    <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=600&q=80" alt="Medical" style="height:210px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-amber);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Medical</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Doctor Consultation</p>
                    </div>
                </div>

                <div class="masonry-item c-violet" data-cat="events" onclick="openLightbox(this)" data-caption="National Healthcare Law Forum 2024">
                    <img src="https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?w=600&q=80" alt="Event" style="height:290px;object-fit:cover;">
                    <div class="masonry-overlay">
                        <span style="font-size:10px;color:var(--g-violet);letter-spacing:1.5px;text-transform:uppercase;font-weight:600;margin-bottom:5px;">Events</span>
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0;">Healthcare Law Forum 2024</p>
                    </div>
                </div>

                <div class="masonry-item c-rose" data-cat="office" onclick="openLightbox(this)" data-caption="Strategy meeting — leadership team">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&q=80" alt="Office" style="height:230px;object-fit:cover;">
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
                These images capture more than moments — they document a movement to make Indian medicine safer, wiser, and legally protected.
            </p>
            <div style="font-size:12px;color:var(--g-teal);letter-spacing:2px;text-transform:uppercase;font-weight:600;">
                — Dr. Arjun Sharma, Founder
            </div>
        </div>
    </div>

    <div class="g-divider"></div>

    {{-- ══ HORIZONTAL SCROLL — EVENTS ══ --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="g-reveal gd1 flex items-center justify-between mb-8 flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <span class="g-tag" style="background:rgba(251,191,36,0.1);color:var(--g-amber);border:1px solid rgba(251,191,36,0.22);">Events</span>
                    <h2 class="g-serif" style="font-size:1.8rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px;">Across India</h2>
                </div>
                <p style="font-size:13px;color:var(--g-muted);">← Scroll to explore →</p>
            </div>

            <div class="hscroll-track g-reveal gd2">
                @php
                $eventImgs = [
                ['https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=500&q=80','Annual MedLaw Summit','New Delhi, 2023'],
                ['https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=500&q=80','CME Workshop','Bengaluru, 2023'],
                ['https://images.unsplash.com/photo-1491895200222-0fc4a4c35e18?w=500&q=80','Healthcare Law Forum','Mumbai, 2024'],
                ['https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=500&q=80','Doctor Rights Seminar','Chennai, 2023'],
                ['https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=500&q=80','NMC Compliance Bootcamp','Pune, 2024'],
                ['https://images.unsplash.com/photo-1530099486328-e021101a494a?w=500&q=80','Medico-Legal Moot','Hyderabad, 2022'],
                ['https://images.unsplash.com/photo-1511578314322-379afb476865?w=500&q=80','Legal Literacy Drive','Kolkata, 2023'],
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
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="g-reveal gd1 flex items-center gap-4 mb-10">
                <span class="g-tag" style="background:rgba(251,113,133,0.1);color:var(--g-rose);border:1px solid rgba(251,113,133,0.22);">Culture</span>
                <h2 class="g-serif" style="font-size:1.8rem;font-weight:700;color:var(--g-cream);letter-spacing:-.5px;">Life at Lawcription</h2>
            </div>

            <div class="bento g-reveal gd2">
                <div class="bento-item row2" onclick="openLightbox(this)" data-caption="Our Mumbai headquarters">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=80" alt="HQ">
                    <div class="bento-label">
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0 0 3px;">Mumbai Headquarters</p>
                        <p style="font-size:12px;color:rgba(255,255,255,.55);margin:0;">Where ideas become articles</p>
                    </div>
                </div>
                <div class="bento-item" onclick="openLightbox(this)" data-caption="Team at work">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&q=80" alt="Team">
                    <div class="bento-label">
                        <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Team Collaboration</p>
                    </div>
                </div>
                <div class="bento-item" onclick="openLightbox(this)" data-caption="Annual team retreat 2023">
                    <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600&q=80" alt="Team retreat">
                    <div class="bento-label">
                        <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Team Retreat 2023</p>
                    </div>
                </div>
                <div class="bento-item span2" onclick="openLightbox(this)" data-caption="Strategy planning session — leadership team">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80" alt="Strategy">
                    <div class="bento-label">
                        <p style="font-size:14px;font-weight:600;color:#fff;margin:0 0 3px;">Strategy Planning</p>
                        <p style="font-size:12px;color:rgba(255,255,255,.55);margin:0;">Leadership team quarterly session</p>
                    </div>
                </div>
                <div class="bento-item" onclick="openLightbox(this)" data-caption="Research desk — deep work">
                    <img src="https://images.unsplash.com/photo-1530099486328-e021101a494a?w=600&q=80" alt="Research">
                    <div class="bento-label">
                        <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Deep Research</p>
                    </div>
                </div>
                <div class="bento-item" onclick="openLightbox(this)" data-caption="Podcast recording studio — MedLaw Talks">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&q=80" alt="Studio">
                    <div class="bento-label">
                        <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">MedLaw Talks Studio</p>
                    </div>
                </div>
                <div class="bento-item" onclick="openLightbox(this)" data-caption="Awards night — Medico-Legal Excellence 2024">
                    <img src="https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=600&q=80" alt="Awards">
                    <div class="bento-label">
                        <p style="font-size:13px;font-weight:600;color:#fff;margin:0;">Excellence Awards 2024</p>
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
            <div class="g-reveal gd1" style="font-size:3rem;margin-bottom:16px;">📸</div>
            <h2 class="g-serif g-reveal gd2 mb-5" style="font-size:clamp(2rem,5vw,3.2rem);font-weight:900;letter-spacing:-2px;line-height:1.1;color:var(--g-cream);">
                Be part of this story.<br />
                <span class="g-shimmer" style="font-style:italic;font-weight:400;">Join 12,000+ doctors.</span>
            </h2>
            <p class="g-reveal gd3 mb-10" style="color:var(--g-muted);font-size:1.1rem;line-height:1.8;font-weight:300;">
                Start your free 14-day trial. No credit card required.
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

@endsection