@extends('frontend.layout.master')

@section('title', 'Lawcription – About Us')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap');

    :root {
        --about-bg: #0f1117;
        --about-surface: #161820;
        --about-card: #1c1e27;
        --about-border: rgba(255, 255, 255, 0.07);
        --about-border-hover: rgba(201, 168, 76, 0.3);
        --about-gold: #c9a84c;
        --about-gold-light: #e8c97a;
        --about-green: #3d6b4f;
        --about-greenlit: #6fa882;
        --about-muted: #8b8fa8;
        --about-text: #e8e6e0;
        --about-cream: #f5f0e8;
    }

    .about-wrap {
        background: var(--about-bg);
        font-family: 'DM Sans', sans-serif;
        color: var(--about-text);
    }

    .about-serif {
        font-family: 'Cormorant Garamond', serif;
    }

    /* Shimmer text */
    .about-shimmer {
        background: linear-gradient(90deg, var(--about-gold) 0%, var(--about-gold-light) 40%, var(--about-gold) 80%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmer 3s linear infinite;
    }

    @keyframes shimmer {
        to {
            background-position: 200% center;
        }
    }

    /* Tags */
    .about-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    /* Stat cards */
    .stat-card {
        background: var(--about-card);
        border: 1px solid var(--about-border);
        border-radius: 20px;
        padding: 28px 24px;
        text-align: center;
        transition: border-color .3s, transform .3s;
        min-width: 130px;
    }

    .stat-card:hover {
        border-color: rgba(201, 168, 76, 0.3);
        transform: translateY(-4px);
    }

    /* Value cards */
    .value-card {
        background: var(--about-card);
        border: 1px solid var(--about-border);
        border-radius: 20px;
        padding: 32px 28px;
        transition: border-color .3s, transform .3s;
        position: relative;
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--about-gold), transparent);
        opacity: 0;
        transition: opacity .3s;
    }

    .value-card:hover {
        border-color: rgba(201, 168, 76, 0.25);
        transform: translateY(-4px);
    }

    .value-card:hover::before {
        opacity: 1;
    }

    /* Team cards */
    .team-card {
        background: var(--about-card);
        border: 1px solid var(--about-border);
        border-radius: 24px;
        overflow: hidden;
        transition: border-color .3s, transform .3s;
    }

    .team-card:hover {
        border-color: rgba(111, 168, 130, 0.35);
        transform: translateY(-6px);
    }

    /* Timeline */
    .tl-line {
        position: absolute;
        left: 19px;
        top: 0;
        bottom: 0;
        width: 1px;
        background: linear-gradient(to bottom, transparent, var(--about-gold) 20%, var(--about-greenlit) 80%, transparent);
        opacity: 0.25;
    }

    .tl-dot {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        flex-shrink: 0;
        background: var(--about-card);
        border: 1px solid rgba(201, 168, 76, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        position: relative;
        z-index: 1;
    }

    /* Divider */
    .about-divider {
        height: 1px;
        background: var(--about-border);
    }

    /* Reveal animations */
    .reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity .7s ease, transform .7s ease;
    }

    .reveal.visible {
        opacity: 1;
        transform: none;
    }

    .d1 {
        transition-delay: .05s;
    }

    .d2 {
        transition-delay: .15s;
    }

    .d3 {
        transition-delay: .25s;
    }

    .d4 {
        transition-delay: .35s;
    }

    /* Orb bg */
    .orb-wrap {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
    }

    body {
        padding-top: 0px !important;
        /* Adjust according to header height */
    }
</style>

<div class="about-wrap">

    {{-- ══ HERO ══ --}}
    <section class="relative py-28 px-6 text-center overflow-hidden">
        <div class="orb-wrap">
            <div class="orb" style="width:700px;height:700px;background:radial-gradient(circle,rgba(61,107,79,0.18),transparent);top:-200px;left:50%;transform:translateX(-50%);"></div>
            <div class="orb" style="width:400px;height:400px;background:radial-gradient(circle,rgba(201,168,76,0.1),transparent);bottom:-100px;right:-60px;"></div>
            <!-- subtle grid -->
            <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,0.025) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.025) 1px,transparent 1px);background-size:60px 60px;"></div>
        </div>

        <div class="relative z-10 max-w-3xl mx-auto">

            <div class="reveal d1 flex justify-center mb-6">
                <span class="about-tag" style="background:rgba(61,107,79,0.12);color:var(--about-greenlit);border:1px solid rgba(61,107,79,0.25);">
                    <span style="width:6px;height:6px;border-radius:50%;background:var(--about-greenlit);animation:pulse 1.5s ease-in-out infinite;display:inline-block;"></span>
                    Our Story
                </span>
            </div>

            <h1 class="about-serif reveal d2 mb-6" style="font-size:clamp(2.8rem,7vw,5rem);font-weight:700;line-height:1.05;letter-spacing:-2px;color:var(--about-cream);">
                Where Medicine<br />
                <span class="about-shimmer" style="font-style:italic;font-weight:300;">Meets the Law.</span>
            </h1>

            <p class="about-serif reveal d3 mb-12" style="font-size:1.2rem;color:var(--about-muted);line-height:1.85;max-width:560px;margin-left:auto;margin-right:auto;margin-bottom:3rem;">
                Lawcription was born from a simple frustration — doctors facing legal complexities with no trusted, accessible resource to turn to. We built the platform we wished existed.
            </p>

            <!-- Stats row -->
            <div class="reveal d4 flex justify-center gap-4 flex-wrap">
                <div class="stat-card">
                    <div class="about-serif about-shimmer" style="font-size:2.2rem;font-weight:700;line-height:1;">2021</div>
                    <div style="font-size:10px;color:var(--about-muted);margin-top:6px;letter-spacing:2px;text-transform:uppercase;">Founded</div>
                </div>
                <div class="stat-card">
                    <div class="about-serif about-shimmer" style="font-size:2.2rem;font-weight:700;line-height:1;">12K+</div>
                    <div style="font-size:10px;color:var(--about-muted);margin-top:6px;letter-spacing:2px;text-transform:uppercase;">Doctors</div>
                </div>
                <div class="stat-card">
                    <div class="about-serif about-shimmer" style="font-size:2.2rem;font-weight:700;line-height:1;">800+</div>
                    <div style="font-size:10px;color:var(--about-muted);margin-top:6px;letter-spacing:2px;text-transform:uppercase;">Articles</div>
                </div>
                <div class="stat-card">
                    <div class="about-serif about-shimmer" style="font-size:2.2rem;font-weight:700;line-height:1;">18+</div>
                    <div style="font-size:10px;color:var(--about-muted);margin-top:6px;letter-spacing:2px;text-transform:uppercase;">Legal Experts</div>
                </div>
            </div>

        </div>
    </section>

    <div class="about-divider"></div>

    {{-- ══ MISSION ══ --}}
    <section class="relative py-24 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">

            <div class="reveal d2">
                <span class="about-tag mb-5 inline-flex" style="background:rgba(201,168,76,0.08);color:var(--about-gold);border:1px solid rgba(201,168,76,0.2);">Our Mission</span>
                <h2 class="about-serif mb-6" style="font-size:clamp(1.9rem,4vw,2.9rem);font-weight:700;letter-spacing:-1px;line-height:1.2;color:var(--about-cream);">
                    Empowering doctors with legal literacy they never got in med school.
                </h2>
                <p style="font-size:15px;color:var(--about-muted);line-height:1.85;margin-bottom:16px;">
                    Medical education in India trains brilliant clinicians — but leaves them almost entirely unprepared for the legal realities of practice. Consent disputes, negligence allegations, NMC compliance — these are everyday risks.
                </p>
                <p style="font-size:15px;color:var(--about-muted);line-height:1.85;">
                    Lawcription bridges that gap. We translate complex judicial language and regulatory text into plain, clinically relevant commentary that any doctor can understand and act on.
                </p>

                <!-- Feature pills -->
                <div class="flex flex-wrap gap-3 mt-8">
                    <span style="background:rgba(61,107,79,0.12);color:var(--about-greenlit);border:1px solid rgba(61,107,79,0.2);padding:7px 14px;border-radius:999px;font-size:12px;font-weight:600;">✓ Expert-reviewed</span>
                    <span style="background:rgba(201,168,76,0.08);color:var(--about-gold);border:1px solid rgba(201,168,76,0.18);padding:7px 14px;border-radius:999px;font-size:12px;font-weight:600;">✓ Clinically relevant</span>
                    <span style="background:rgba(61,107,79,0.12);color:var(--about-greenlit);border:1px solid rgba(61,107,79,0.2);padding:7px 14px;border-radius:999px;font-size:12px;font-weight:600;">✓ Plain language</span>
                </div>
            </div>

            <div class="reveal d3" style="position:relative;border-radius:24px;overflow:hidden;border:1px solid rgba(201,168,76,0.15);box-shadow:0 40px 80px rgba(0,0,0,0.5);">
                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&q=80" alt="Legal books" style="width:100%;height:420px;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.25);" />
                <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(15,17,23,0.92),transparent 55%);"></div>
                <div style="position:absolute;bottom:28px;left:28px;right:28px;">
                    <p class="about-serif" style="font-size:clamp(1.1rem,2.5vw,1.5rem);font-style:italic;color:var(--about-cream);line-height:1.6;font-weight:300;">
                        "Every doctor deserves to practise with confidence — clinically and legally."
                    </p>
                    <div style="font-size:11px;color:var(--about-gold);margin-top:10px;letter-spacing:1px;">— Lawcription Founding Principle</div>
                </div>
            </div>

        </div>
    </section>

    <div class="about-divider"></div>

    {{-- ══ VALUES ══ --}}
    <section class="relative py-24 px-6 overflow-hidden">
        <div class="orb-wrap">
            <div class="orb" style="width:500px;height:500px;background:radial-gradient(circle,rgba(201,168,76,0.07),transparent);top:50%;left:50%;transform:translate(-50%,-50%);"></div>
        </div>
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center mb-16 reveal d1">
                <span class="about-tag mb-4 inline-flex" style="background:rgba(111,168,130,0.08);color:var(--about-greenlit);border:1px solid rgba(111,168,130,0.15);">What We Stand For</span>
                <h2 class="about-serif" style="font-size:clamp(1.9rem,4vw,2.9rem);font-weight:700;letter-spacing:-1px;color:var(--about-cream);">Our core values.</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-5 reveal d2">
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">⚖️</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Accuracy Above All</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">Every article is reviewed by practising medico-legal consultants. We never publish commentary we cannot stand behind.</p>
                </div>
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">🏥</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Clinical Relevance</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">We write for doctors, not law students. Every piece connects legal principle to clinical practice.</p>
                </div>
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">🔓</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Accessible Intelligence</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">Legal knowledge should not be locked behind expensive consultations. Every doctor deserves the same clarity.</p>
                </div>
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">⚡</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Real-Time Coverage</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">New judgements, NMC circulars, gazette notifications — we track them all and publish same-day analysis.</p>
                </div>
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">👨‍⚕️</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Doctor-First Always</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">We are not a legal firm. We are squarely on the side of physicians — helping you protect yourself and your career.</p>
                </div>
                <div class="value-card">
                    <div style="font-size:2rem;margin-bottom:16px;">🎓</div>
                    <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Continuous Learning</h3>
                    <p style="font-size:14px;color:var(--about-muted);line-height:1.75;">Through CME-accredited modules, we make legal literacy a formal part of professional development.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="about-divider"></div>

    {{-- ══ TIMELINE ══ --}}
    <section class="py-24 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-start">

            <div class="reveal d2">
                <span class="about-tag mb-5 inline-flex" style="background:rgba(201,168,76,0.08);color:var(--about-gold);border:1px solid rgba(201,168,76,0.18);">How We Got Here</span>
                <h2 class="about-serif mb-10" style="font-size:clamp(1.7rem,3.5vw,2.5rem);font-weight:700;letter-spacing:-1px;color:var(--about-cream);">The Lawcription journey.</h2>

                <div style="position:relative;padding-left:0;">
                    <div class="tl-line"></div>

                    <div style="display:flex;gap:20px;align-items:flex-start;padding-bottom:32px;">
                        <div class="tl-dot">📌</div>
                        <div style="padding-top:8px;">
                            <div style="font-size:10px;color:var(--about-gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:5px;">2021 · The Idea</div>
                            <h4 class="about-serif mb-2" style="font-size:1.05rem;font-weight:700;color:var(--about-cream);">Born from frustration</h4>
                            <p style="font-size:13px;color:var(--about-muted);line-height:1.75;">A group of doctors and advocates, tired of seeing colleagues blindsided by legal cases, decided to build a resource they wished had existed during training.</p>
                        </div>
                    </div>

                    <div style="display:flex;gap:20px;align-items:flex-start;padding-bottom:32px;">
                        <div class="tl-dot">🚀</div>
                        <div style="padding-top:8px;">
                            <div style="font-size:10px;color:var(--about-gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:5px;">2022 · Launch</div>
                            <h4 class="about-serif mb-2" style="font-size:1.05rem;font-weight:700;color:var(--about-cream);">First 100 articles published</h4>
                            <p style="font-size:13px;color:var(--about-muted);line-height:1.75;">Lawcription launched with a focused library of Consumer Protection Act analyses and consent guides. Within 3 months, 2,000 doctors had subscribed.</p>
                        </div>
                    </div>

                    <div style="display:flex;gap:20px;align-items:flex-start;padding-bottom:32px;">
                        <div class="tl-dot">📈</div>
                        <div style="padding-top:8px;">
                            <div style="font-size:10px;color:var(--about-gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:5px;">2023 · Growth</div>
                            <h4 class="about-serif mb-2" style="font-size:1.05rem;font-weight:700;color:var(--about-cream);">CME modules & expert network</h4>
                            <p style="font-size:13px;color:var(--about-muted);line-height:1.75;">We launched accredited CME modules and built a network of 18 medico-legal consultants — a first in India for digital medical publishing.</p>
                        </div>
                    </div>

                    <div style="display:flex;gap:20px;align-items:flex-start;">
                        <div class="tl-dot" style="border-color:rgba(111,168,130,0.4);">🏛️</div>
                        <div style="padding-top:8px;">
                            <div style="font-size:10px;color:var(--about-greenlit);letter-spacing:2px;text-transform:uppercase;margin-bottom:5px;">2024–Present</div>
                            <h4 class="about-serif mb-2" style="font-size:1.05rem;font-weight:700;color:var(--about-cream);">12,000 doctors and growing</h4>
                            <p style="font-size:13px;color:var(--about-muted);line-height:1.75;">Today Lawcription is India's leading medico-legal intelligence platform, trusted by physicians across AIIMS, Apollo, Fortis, and thousands of independent practitioners.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="reveal d3 flex flex-col gap-5">
                <div style="border-radius:24px;overflow:hidden;border:1px solid rgba(111,168,130,0.18);box-shadow:0 30px 70px rgba(0,0,0,0.4);">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=700&q=80" alt="Doctors" style="width:100%;height:260px;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.2);" />
                </div>
                <div style="border-radius:24px;overflow:hidden;border:1px solid rgba(201,168,76,0.15);box-shadow:0 30px 70px rgba(0,0,0,0.4);">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=700&q=80" alt="Legal books" style="width:100%;height:200px;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.25);" />
                </div>

                <!-- Trust badge -->
                <div style="background:var(--about-card);border:1px solid rgba(201,168,76,0.2);border-radius:20px;padding:20px 24px;display:flex;align-items:center;gap:16px;">
                    <div style="width:48px;height:48px;border-radius:14px;background:rgba(201,168,76,0.12);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">🏆</div>
                    <div>
                        <p style="font-size:13px;font-weight:600;color:var(--about-cream);margin:0 0 3px;">India's #1 Medico-Legal Platform</p>
                        <p style="font-size:12px;color:var(--about-muted);margin:0;">Trusted by doctors at AIIMS, Apollo & 3000+ hospitals nationwide</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="about-divider"></div>

    {{-- ══ TEAM ══ --}}
    <section class="py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16 reveal d1">
                <span class="about-tag mb-4 inline-flex" style="background:rgba(201,168,76,0.08);color:var(--about-gold);border:1px solid rgba(201,168,76,0.15);">The People Behind It</span>
                <h2 class="about-serif mb-3" style="font-size:clamp(1.9rem,4vw,2.9rem);font-weight:700;letter-spacing:-1px;color:var(--about-cream);">Our editorial team.</h2>
                <p class="about-serif" style="color:var(--about-muted);font-size:1.1rem;max-width:480px;margin:0 auto;">Doctors, advocates, and journalists — united by one purpose.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 reveal d2">
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500&q=80" alt="Dr. Arjun Sharma" style="width:100%;height:220px;object-fit:cover;display:block;filter:brightness(0.65) sepia(0.2);" />
                    <div style="padding:22px 24px;">
                        <div style="font-size:10px;color:var(--about-gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:7px;">Founder & Editor-in-Chief</div>
                        <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Dr. Arjun Sharma</h3>
                        <p style="font-size:13px;color:var(--about-muted);line-height:1.7;">MBBS, LLB. Former senior resident at AIIMS Delhi turned medico-legal consultant. 14 years navigating the intersection of clinical medicine and Indian law.</p>
                    </div>
                </div>
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&q=80" alt="Adv. Priya Nair" style="width:100%;height:220px;object-fit:cover;display:block;filter:brightness(0.65) sepia(0.2);" />
                    <div style="padding:22px 24px;">
                        <div style="font-size:10px;color:var(--about-greenlit);letter-spacing:2px;text-transform:uppercase;margin-bottom:7px;">Legal Director</div>
                        <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Adv. Priya Nair</h3>
                        <p style="font-size:13px;color:var(--about-muted);line-height:1.7;">Senior advocate specialising in medical negligence. Appeared before the Supreme Court in landmark healthcare judgements.</p>
                    </div>
                </div>
                <div class="team-card">
                    <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=500&q=80" alt="Dr. Rohan Verma" style="width:100%;height:220px;object-fit:cover;display:block;filter:brightness(0.65) sepia(0.2);" />
                    <div style="padding:22px 24px;">
                        <div style="font-size:10px;color:var(--about-gold);letter-spacing:2px;text-transform:uppercase;margin-bottom:7px;">Head of CME Programs</div>
                        <h3 class="about-serif mb-3" style="font-size:1.15rem;font-weight:700;color:var(--about-cream);">Dr. Rohan Verma</h3>
                        <p style="font-size:13px;color:var(--about-muted);line-height:1.7;">MD, Forensic Medicine. Designed India's first online CME curriculum on medico-legal documentation. Faculty at two national medical universities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about-divider"></div>

    {{-- ══ CTA ══ --}}
    <section class="relative py-28 px-6 text-center overflow-hidden">
        <div class="orb-wrap">
            <div class="orb" style="width:600px;height:600px;background:radial-gradient(circle,rgba(61,107,79,0.2),transparent);top:50%;left:50%;transform:translate(-50%,-50%);"></div>
        </div>
        <div class="relative z-10 max-w-2xl mx-auto">
            <div class="reveal d1 text-5xl mb-5">⚖️</div>
            <h2 class="about-serif reveal d2 mb-5" style="font-size:clamp(2rem,5vw,3.4rem);font-weight:700;letter-spacing:-1.5px;line-height:1.1;color:var(--about-cream);">
                Join 12,000+ doctors<br />
                <span class="about-shimmer" style="font-style:italic;font-weight:300;">who practise with confidence.</span>
            </h2>
            <p class="about-serif reveal d3 mb-10" style="color:var(--about-muted);font-size:1.15rem;line-height:1.8;">
                Your first 14 days are completely risk-free. No hidden charges. Cancel anytime.
            </p>
            <div class="reveal d4 flex gap-4 justify-center flex-wrap">
                <a href="{{ route('subscription.index') }}" style="text-decoration:none;">
                    <button style="padding:16px 36px;border-radius:14px;
                               background:linear-gradient(135deg,var(--about-green),var(--about-greenlit));
                               border:none;cursor:pointer;
                               font-family:'DM Sans',sans-serif;font-size:14px;font-weight:600;
                               letter-spacing:.5px;color:#fff;
                               box-shadow:0 8px 28px rgba(61,107,79,0.35);
                               transition:transform .2s,box-shadow .2s;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 12px 36px rgba(61,107,79,0.45)'" onmouseout="this.style.transform='';this.style.boxShadow='0 8px 28px rgba(61,107,79,0.35)'">
                        View Plans →
                    </button>
                </a>
                <a href="{{ route('home') }}" style="text-decoration:none;">
                    <button style="padding:16px 36px;border-radius:14px;
                               background:transparent;
                               border:1px solid rgba(255,255,255,0.12);
                               cursor:pointer;font-family:'DM Sans',sans-serif;
                               font-size:14px;font-weight:600;
                               color:var(--about-text);
                               transition:border-color .2s,background .2s;" onmouseover="this.style.borderColor='rgba(255,255,255,0.25)';this.style.background='rgba(255,255,255,0.05)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.12)';this.style.background='transparent'">
                        Back to Home ↑
                    </button>
                </a>
            </div>
        </div>
    </section>

</div>

<script>
    // Scroll reveal
    const revealEls = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                io.unobserve(e.target);
            }
        });
    }, {
        threshold: 0.12
    });
    revealEls.forEach(el => io.observe(el));
</script>

@endsection