@extends('frontend.layout.master')

@section('title', 'Lawchiption')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend/css/subscription.css') }}">


@section('content')

<div class="subscription-html">

  <section style="position:relative; padding: 100px 24px 90px; text-align:center; overflow:hidden;">
    <div class="mesh-bg">
      <div class="orb" style="width:700px;height:700px;background:radial-gradient(var(--green),transparent);top:-250px;left:50%;transform:translateX(-50%);opacity:0.18;"></div>
      <div class="orb" style="width:450px;height:450px;background:radial-gradient(var(--gold),transparent);bottom:-80px;right:-120px;opacity:0.12;"></div>
      <div class="orb" style="width:350px;height:350px;background:radial-gradient(#5a3a0a,transparent);bottom:-60px;left:-60px;opacity:0.25;"></div>
      <div class="grid-overlay"></div>
    </div>

    <div style="position:relative; z-index:2; max-width:800px; margin:0 auto;">

      <!-- Badge -->
      <div class="reveal d1" style="margin-bottom:22px;">
        <span class="tag" style="background:rgba(61,107,79,0.15);color:var(--greenlit);border:1px solid rgba(61,107,79,0.3);">
          <span style="width:6px;height:6px;border-radius:50%;background:var(--greenlit);animation:pulse 1.5s ease-in-out infinite;display:inline-block;"></span>
          Legal Intelligence for Medical Professionals
        </span>
      </div>

      <!-- Headline -->
      <h1 class="serif reveal d2" style="font-size:clamp(2.6rem,7vw,5.2rem);font-weight:700;line-height:1.08;letter-spacing:-1.5px;margin-bottom:26px;">
        The Law, Decoded<br />
        <span class="shimmer-text light-serif" style="font-style:italic;font-size:1.08em;font-weight:300;">for Every Doctor.</span>
      </h1>

      <p class="reveal d3" style="font-size:1.05rem;color:var(--muted2);line-height:1.85;max-width:520px;margin:0 auto 44px;font-family:'Cormorant Garamond',serif;font-size:1.2rem;">
        Curated legal commentary, landmark judgements, and regulatory insight — written specifically for physicians navigating India's evolving medico-legal landscape.
      </p>

      <!-- Stats row -->
      <div class="reveal d4" style="display:flex;justify-content:center;gap:44px;flex-wrap:wrap;margin-bottom:64px;">
        <div style="text-align:center;">
          <div class="serif shimmer-text" style="font-size:clamp(1.8rem,4vw,3rem);font-weight:700;line-height:1;">12K+</div>
          <div style="font-size:11px;color:var(--muted);margin-top:5px;letter-spacing:2px;text-transform:uppercase;">Physicians</div>
        </div>
        <div style="width:1px;background:var(--border2);"></div>
        <div style="text-align:center;">
          <div class="serif shimmer-text" style="font-size:clamp(1.8rem,4vw,3rem);font-weight:700;line-height:1;">800+</div>
          <div style="font-size:11px;color:var(--muted);margin-top:5px;letter-spacing:2px;text-transform:uppercase;">Articles</div>
        </div>
        <div style="width:1px;background:var(--border2);"></div>
        <div style="text-align:center;">
          <div class="serif shimmer-text" style="font-size:clamp(1.8rem,4vw,3rem);font-weight:700;line-height:1;">4.9★</div>
          <div style="font-size:11px;color:var(--muted);margin-top:5px;letter-spacing:2px;text-transform:uppercase;">Avg Rating</div>
        </div>
      </div>

      <!-- Hero visual collage -->
      <div class="reveal d5" style="position:relative;height:330px;max-width:720px;margin:0 auto;">

        <!-- Main card -->
        <div style="position:absolute;left:50%;top:0;transform:translateX(-50%);width:480px;border-radius:20px;overflow:hidden;border:1px solid rgba(201,168,76,0.22);box-shadow:0 40px 100px rgba(0,0,0,0.6);">
          <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=900&q=80" alt="Legal books" style="width:100%;height:220px;object-fit:cover;display:block;filter:brightness(0.7) sepia(0.3);" />
          <div style="background:var(--surface2);padding:16px 20px;display:flex;align-items:center;justify-content:space-between;">
            <div>
              <div style="font-size:11px;color:var(--muted);margin-bottom:4px;letter-spacing:1px;text-transform:uppercase;">Latest Article</div>
              <div style="font-size:13px;font-weight:600;color:var(--cream);">Consumer Protection Act & Medical Negligence</div>
            </div>
            <div style="background:rgba(61,107,79,0.2);border:1px solid rgba(61,107,79,0.35);border-radius:10px;padding:6px 14px;font-size:12px;color:var(--greenlit);font-weight:600;">New</div>
          </div>
        </div>

        <!-- Float left -->
        <div class="float-card" style="position:absolute;left:-10px;top:40px;background:var(--surface2);border:1px solid var(--border2);border-radius:16px;padding:14px 18px;min-width:160px;box-shadow:0 20px 50px rgba(0,0,0,0.6);">
          <div style="font-size:11px;color:var(--muted);margin-bottom:6px;letter-spacing:1px;">This week</div>
          <div class="serif" style="font-size:1.4rem;font-weight:700;color:var(--gold);">6 Cases</div>
          <div style="font-size:11px;color:var(--greenlit);margin-top:2px;">↑ New judgements</div>
        </div>

        <!-- Float right -->
        <div class="float-card2" style="position:absolute;right:-10px;top:55px;background:var(--surface2);border:1px solid var(--border2);border-radius:16px;padding:14px 18px;min-width:155px;box-shadow:0 20px 50px rgba(0,0,0,0.6);">
          <div style="font-size:11px;color:var(--muted);margin-bottom:8px;letter-spacing:1px;">Reader satisfaction</div>
          <div style="display:flex;gap:2px;">
            <span style="color:var(--gold);font-size:15px;">★★★★★</span>
          </div>
          <div style="font-size:11px;color:var(--muted);margin-top:4px;">4,280 reviews</div>
        </div>

      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════
     TRUST MARQUEE
  ══════════════════════════════════════════ -->
  <div style="overflow:hidden;padding:28px 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:rgba(255,255,255,0.012);position:relative;z-index:2;">
    <div style="font-size:10px;text-align:center;color:var(--muted);letter-spacing:4px;text-transform:uppercase;margin-bottom:16px;">Trusted by doctors from</div>
    <div style="overflow:hidden;">
      <div class="marquee-track" style="gap:56px;align-items:center;padding:0 28px;">
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">AIIMS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">FORTIS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">APOLLO</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">NIMHANS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">PGI CHANDIGARH</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">MANIPAL</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">TATA MEMORIAL</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <!-- duplicate -->
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">AIIMS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">FORTIS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">APOLLO</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">NIMHANS</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">PGI CHANDIGARH</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">MANIPAL</span>
        <span style="color:rgba(201,168,76,0.15);">◆</span>
        <span class="serif" style="font-size:1rem;font-weight:600;color:rgba(242,234,216,0.2);letter-spacing:2px;white-space:nowrap;">TATA MEMORIAL</span>
      </div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════
     FEATURES
  ══════════════════════════════════════════ -->
  <section style="padding:100px 24px;max-width:1100px;margin:0 auto;position:relative;z-index:2;">
    <div style="text-align:center;margin-bottom:70px;">
      <span class="tag reveal d1" style="background:rgba(201,168,76,0.1);color:var(--gold);border:1px solid rgba(201,168,76,0.2);margin-bottom:16px;display:inline-flex;">What You Get</span>
      <h2 class="serif reveal d2" style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-1px;line-height:1.15;">
        The legal clarity<br /><span class="shimmer-text">every doctor deserves.</span>
      </h2>
    </div>

    <div class="legal-features"  class="reveal d3">

      <!-- Feature list left -->
      <div style="display:flex;flex-direction:column;gap:20px;">

        <div style="display:flex;gap:18px;align-items:flex-start;padding:24px;background:var(--surface);border:1px solid var(--border);border-radius:20px;transition:border-color 0.3s;" onmouseover="this.style.borderColor='rgba(201,168,76,0.3)'" onmouseout="this.style.borderColor='var(--border)'">
          <div class="feat-icon" style="background:rgba(201,168,76,0.1);">⚖️</div>
          <div>
            <h3 class="serif" style="font-size:1rem;font-weight:700;margin-bottom:6px;color:var(--cream);">Landmark Judgement Digests</h3>
            <p style="font-size:14px;color:var(--muted);line-height:1.65;">Supreme Court and High Court rulings affecting doctors, simplified into plain-language summaries with clinical relevance.</p>
          </div>
        </div>

        <div style="display:flex;gap:18px;align-items:flex-start;padding:24px;background:var(--surface);border:1px solid var(--border);border-radius:20px;transition:border-color 0.3s;" onmouseover="this.style.borderColor='rgba(61,107,79,0.4)'" onmouseout="this.style.borderColor='var(--border)'">
          <div class="feat-icon" style="background:rgba(61,107,79,0.12);">📋</div>
          <div>
            <h3 class="serif" style="font-size:1rem;font-weight:700;margin-bottom:6px;color:var(--cream);">Regulatory Compliance Updates</h3>
            <p style="font-size:14px;color:var(--muted);line-height:1.65;">NMC guidelines, MCI amendments, PCPNDT compliance, and drug licensing — tracked and explained as they change.</p>
          </div>
        </div>

        <div style="display:flex;gap:18px;align-items:flex-start;padding:24px;background:var(--surface);border:1px solid var(--border);border-radius:20px;transition:border-color 0.3s;" onmouseover="this.style.borderColor='rgba(201,168,76,0.3)'" onmouseout="this.style.borderColor='var(--border)'">
          <div class="feat-icon" style="background:rgba(201,168,76,0.08);">🛡️</div>
          <div>
            <h3 class="serif" style="font-size:1rem;font-weight:700;margin-bottom:6px;color:var(--cream);">Consent & Negligence Guides</h3>
            <p style="font-size:14px;color:var(--muted);line-height:1.65;">Practical templates and expert commentary on informed consent, duty of care, and defending against negligence claims.</p>
          </div>
        </div>

      </div>

      <!-- Right: image -->
      <div style="position:relative;border-radius:24px;overflow:hidden;border:1px solid rgba(201,168,76,0.18);box-shadow:0 40px 100px rgba(0,0,0,0.5);">
        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&q=80" alt="Legal documents" style="width:100%;height:390px;object-fit:cover;display:block;filter:brightness(0.65) sepia(0.25);" />
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,9,8,0.85),transparent 50%);"></div>
        <div style="position:absolute;bottom:20px;left:20px;right:20px;">
          <div style="font-size:11px;color:var(--gold);font-weight:600;letter-spacing:2px;margin-bottom:6px;text-transform:uppercase;">Expert Analysis</div>
          <div class="serif" style="font-size:1.05rem;font-weight:600;color:var(--cream);">Written by practising medico-legal consultants</div>
        </div>
      </div>

    </div>

    <!-- Bottom 3 feature cards -->
    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;margin-top:24px;" class="reveal d4">

      <div style="padding:28px;background:var(--surface);border:1px solid var(--border);border-radius:20px;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-40px;right:-40px;width:120px;height:120px;border-radius:50%;background:radial-gradient(var(--gold),transparent);opacity:0.1;"></div>
        <div style="font-size:2rem;margin-bottom:14px;">📰</div>
        <h3 class="serif" style="font-weight:700;font-size:0.95rem;margin-bottom:8px;color:var(--cream);">Weekly Digest</h3>
        <p style="font-size:13px;color:var(--muted);line-height:1.65;">Curated newsletter with the week's most important legal developments sent every Friday.</p>
      </div>

      <div style="padding:28px;background:var(--surface);border:1px solid var(--border);border-radius:20px;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-40px;right:-40px;width:120px;height:120px;border-radius:50%;background:radial-gradient(var(--green),transparent);opacity:0.14;"></div>
        <div style="font-size:2rem;margin-bottom:14px;">🎓</div>
        <h3 class="serif" style="font-weight:700;font-size:0.95rem;margin-bottom:8px;color:var(--cream);">CME-Eligible Modules</h3>
        <p style="font-size:13px;color:var(--muted);line-height:1.65;">Earn continuing medical education credits through accredited legal literacy modules.</p>
      </div>

      <div style="padding:28px;background:var(--surface);border:1px solid var(--border);border-radius:20px;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-40px;right:-40px;width:120px;height:120px;border-radius:50%;background:radial-gradient(var(--gold2),transparent);opacity:0.09;"></div>
        <div style="font-size:2rem;margin-bottom:14px;">🔍</div>
        <h3 class="serif" style="font-weight:700;font-size:0.95rem;margin-bottom:8px;color:var(--cream);">Case Search Archive</h3>
        <p style="font-size:13px;color:var(--muted);line-height:1.65;">Full-text search across 800+ articles, judgements, and regulatory notices by specialty or keyword.</p>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════════════════
     PRICING
  ══════════════════════════════════════════ -->
  <section id="pricing" style="padding:80px 24px 100px;position:relative;overflow:hidden;z-index:2;">

    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:800px;height:800px;border-radius:50%;background:radial-gradient(ellipse, rgba(61,107,79,0.07), transparent 70%);pointer-events:none;"></div>

    <div style="max-width:1080px;margin:0 auto;">

      <div style="text-align:center;margin-bottom:20px;" class="reveal d1">
        <span class="tag" style="background:rgba(201,168,76,0.1);color:var(--gold);border:1px solid rgba(201,168,76,0.2);margin-bottom:16px;display:inline-flex;">Subscription Plans</span>
        <h2 class="serif reveal d2" style="font-size:clamp(2rem,4vw,3rem);font-weight:700;letter-spacing:-1px;line-height:1.15;margin-bottom:14px;">
          Subscribe longer,<br /><span class="shimmer-text">save substantially.</span>
        </h2>
        <p style="color:var(--muted);font-size:1rem;max-width:400px;margin:0 auto 32px;font-family:'Cormorant Garamond',serif;font-size:1.1rem;">No hidden charges. Cancel anytime. Full access from day one.</p>

        <!-- 2-option toggle (Monthly / Yearly) -->
        <div class="toggle-container">
          <button class="toggle-opt on" id="t1" onclick="setToggle('monthly')">Monthly</button>
          <button class="toggle-opt" id="t2" onclick="setToggle('yearly')">Yearly</button>
        </div>
      </div>

      <!-- Cards — HTML unchanged from original -->
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;align-items:start;margin-top:50px;">

        <!-- Card 1 · BASIC -->
        <div class="plan-card reveal d2" style="background:var(--surface);border-radius:24px;padding:36px 30px;">
          <div style="margin-bottom:28px;">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
              <div>
                <span class="tag" style="background:rgba(255,255,255,0.04);color:var(--muted);font-size:10px;margin-bottom:10px;">BASIC</span>
                <h3 class="serif" style="font-size:1.4rem;font-weight:700;margin-top:8px;color:var(--cream);" id="n1">1 Month</h3>
              </div>
              <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,0.04);display:flex;align-items:center;justify-content:center;font-size:20px;">📖</div>
            </div>
            <div style="display:flex;align-items:flex-end;gap:6px;margin-bottom:6px;">
              <span class="serif" style="font-size:3rem;font-weight:700;line-height:1;color:var(--cream);" id="p1">₹499</span>
              <span style="color:var(--muted);font-size:14px;padding-bottom:8px;">/mo</span>
              <span id="s1" style="font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;margin-bottom:8px;letter-spacing:1px;display:none;"></span>
            </div>
            <p id="b1" style="font-size:12px;color:var(--muted);">Billed monthly</p>
          </div>
          <div style="height:1px;background:var(--border);margin-bottom:28px;"></div>
          <ul style="display:flex;flex-direction:column;gap:14px;margin-bottom:32px;">
            <li class="check-item">
              <div class="check-dot" style="background:rgba(255,255,255,0.05);color:#aaa;font-size:11px;">✓</div><span style="font-size:14px;">Full article access</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(255,255,255,0.05);color:#aaa;font-size:11px;">✓</div><span style="font-size:14px;">Weekly legal digest</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(255,255,255,0.05);color:#aaa;font-size:11px;">✓</div><span style="font-size:14px;">Case search (50 searches/mo)</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(255,255,255,0.05);color:#aaa;font-size:11px;">✓</div><span style="font-size:14px;">Email support</span>
            </li>
            <li class="check-item" style="opacity:0.3;">
              <div class="check-dot" style="background:rgba(255,255,255,0.03);color:#555;font-size:11px;">—</div><span style="font-size:14px;">CME modules</span>
            </li>
            <li class="check-item" style="opacity:0.3;">
              <div class="check-dot" style="background:rgba(255,255,255,0.03);color:#555;font-size:11px;">—</div><span style="font-size:14px;">Expert consultation credits</span>
            </li>
          </ul>
          <button id="plan1Btn" class="btn-plain w-full py-4 rounded-2xl serif" style="font-size:13px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer;color:var(--text);width:100%;padding:16px;border-radius:14px;background:transparent;">
            Start Reading →
          </button>
        </div>

        <!-- Card 2 · PROFESSIONAL (featured) -->
        <div class="plan-card star reveal d3" style="border-radius:24px;padding:36px 30px;">
          <div style="position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--gold),var(--greenlit));border-radius:24px 24px 0 0;"></div>
          <div style="position:absolute;top:20px;right:20px;">
            <span class="tag" id="badge2" style="background:linear-gradient(135deg,var(--gold),var(--greenlit));color:#0A0908;font-size:10px;font-weight:700;">⭐ POPULAR</span>
          </div>
          <div style="margin-bottom:28px;margin-top:8px;">
            <div style="margin-bottom:16px;">
              <span class="tag" style="background:rgba(201,168,76,0.12);color:var(--gold);font-size:10px;margin-bottom:10px;">PROFESSIONAL</span>
              <h3 class="serif" style="font-size:1.4rem;font-weight:700;margin-top:8px;color:var(--cream);" id="n2">3 Months</h3>
            </div>
            <div style="display:flex;align-items:flex-end;gap:6px;margin-bottom:6px;">
              <span class="serif" style="font-size:3rem;font-weight:700;line-height:1;color:var(--cream);" id="p2">₹399</span>
              <span style="color:var(--muted);font-size:14px;padding-bottom:8px;">/mo</span>
              <span id="s2" style="background:rgba(201,168,76,0.18);color:var(--gold);font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;margin-bottom:8px;letter-spacing:1px;">20% OFF</span>
            </div>
            <p id="b2" style="font-size:12px;color:var(--muted);">₹1,197 billed quarterly</p>
          </div>
          <div style="height:1px;background:rgba(201,168,76,0.18);margin-bottom:28px;"></div>
          <ul style="display:flex;flex-direction:column;gap:14px;margin-bottom:32px;">
            <li class="check-item">
              <div class="check-dot" style="background:rgba(201,168,76,0.12);color:var(--gold);">✓</div><span style="font-size:14px;">Unlimited article access</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(201,168,76,0.12);color:var(--gold);">✓</div><span style="font-size:14px;">Weekly + special bulletins</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(201,168,76,0.12);color:var(--gold);">✓</div><span style="font-size:14px;">Unlimited case search</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(201,168,76,0.12);color:var(--gold);">✓</div><span style="font-size:14px;">3 CME modules/month</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(201,168,76,0.12);color:var(--gold);">✓</div><span style="font-size:14px;">Priority support</span>
            </li>
            <li class="check-item" style="opacity:0.35;">
              <div class="check-dot" style="background:rgba(255,255,255,0.03);color:#555;font-size:11px;">—</div><span style="font-size:14px;">Expert consultation credits</span>
            </li>
          </ul>
          <div class="btn-glow" style="border-radius:16px;">
            <button id="plan2Btn" style="width:100%;padding:16px;border-radius:16px;background:linear-gradient(135deg,var(--green),var(--green2));border:none;cursor:pointer;font-family:'Playfair Display',serif;font-size:13px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--cream);position:relative;z-index:1;">
              Choose Professional ✦
            </button>
          </div>
        </div>

        <!-- Card 3 · ELITE -->
        <div class="plan-card reveal d4" style="background:var(--surface);border-radius:24px;padding:36px 30px;">
          <div style="margin-bottom:28px;">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px;">
              <div>
                <span class="tag" style="background:rgba(111,168,130,0.1);color:var(--greenlit);font-size:10px;margin-bottom:10px;">ELITE</span>
                <h3 class="serif" style="font-size:1.4rem;font-weight:700;margin-top:8px;color:var(--cream);" id="n3">6 Months</h3>
              </div>
              <div style="width:44px;height:44px;border-radius:12px;background:rgba(111,168,130,0.1);display:flex;align-items:center;justify-content:center;font-size:20px;">🏛️</div>
            </div>
            <div style="display:flex;align-items:flex-end;gap:6px;margin-bottom:6px;">
              <span class="serif" style="font-size:3rem;font-weight:700;line-height:1;color:var(--cream);" id="p3">₹349</span>
              <span style="color:var(--muted);font-size:14px;padding-bottom:8px;">/mo</span>
              <span id="s3" style="background:rgba(111,168,130,0.12);color:var(--greenlit);font-size:10px;font-weight:700;padding:3px 8px;border-radius:6px;margin-bottom:8px;letter-spacing:1px;">30% OFF</span>
            </div>
            <p id="b3" style="font-size:12px;color:var(--muted);">₹2,094 billed half-yearly</p>
          </div>
          <div style="height:1px;background:var(--border);margin-bottom:28px;"></div>
          <ul style="display:flex;flex-direction:column;gap:14px;margin-bottom:32px;">
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">Everything in Professional</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">Unlimited CME modules</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">2 expert consultation credits</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">Downloadable PDF archive</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">Dedicated account manager</span>
            </li>
            <li class="check-item">
              <div class="check-dot" style="background:rgba(111,168,130,0.1);color:var(--greenlit);">✓</div><span style="font-size:14px;">Institution group licences</span>
            </li>
          </ul>
          <button id="plan3Btn" class="btn-plain w-full py-4 rounded-2xl serif" style="font-size:13px;font-weight:700;letter-spacing:1px;text-transform:uppercase;cursor:pointer;color:var(--greenlit);border-color:rgba(111,168,130,0.2);width:100%;padding:16px;border-radius:14px;background:transparent;">
            Go Elite →
          </button>
        </div>

      </div>

      <!-- Guarantee banner — unchanged -->
      <div class="reveal d5" style="margin-top:32px;padding:20px 30px;background:linear-gradient(135deg,rgba(61,107,79,0.08),rgba(201,168,76,0.05));border:1px solid rgba(201,168,76,0.15);border-radius:16px;display:flex;justify-content:center;align-items:center;gap:16px;flex-wrap:wrap;text-align:center;">
        <span style="font-size:1.2rem;">⚖️</span>
        <span style="font-size:14px;color:var(--muted);font-family:'Cormorant Garamond',serif;font-size:1rem;">
          <span style="color:var(--cream);font-weight:600;">14-day money-back guarantee</span> · Cancel anytime · Secure payment · No hidden fees
        </span>
        <div style="display:flex;gap:8px;flex-wrap:wrap;justify-content:center;">
          <span style="background:rgba(255,255,255,0.04);border:1px solid var(--border);border-radius:8px;padding:4px 10px;font-size:11px;color:var(--muted);">💳 Visa</span>
          <span style="background:rgba(255,255,255,0.04);border:1px solid var(--border);border-radius:8px;padding:4px 10px;font-size:11px;color:var(--muted);">💳 Mastercard</span>
          <span style="background:rgba(255,255,255,0.04);border:1px solid var(--border);border-radius:8px;padding:4px 10px;font-size:11px;color:var(--muted);">🏦 UPI/Razorpay</span>
        </div>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════════════════
     TOPIC BENTO
  ══════════════════════════════════════════ -->
  <section style="padding:80px 24px;max-width:1100px;margin:0 auto;position:relative;z-index:2;">
    <div style="text-align:center;margin-bottom:60px;" class="reveal d1">
      <span class="tag" style="background:rgba(111,168,130,0.08);color:var(--greenlit);border:1px solid rgba(111,168,130,0.15);margin-bottom:16px;display:inline-flex;">Coverage Areas</span>
      <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:700;letter-spacing:-1px;">Built for every specialty.</h2>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;" class="reveal d2">

      <div style="border-radius:24px;overflow:hidden;border:1px solid var(--border);position:relative;grid-row:span 2;">
        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=700&q=80" alt="Surgery" style="width:100%;height:100%;object-fit:cover;display:block;min-height:400px;filter:brightness(0.55) sepia(0.3);" />
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,9,8,0.95) 30%,rgba(10,9,8,0.15));"></div>
        <div style="position:absolute;bottom:0;left:0;right:0;padding:32px;">
          <span class="tag" style="background:rgba(201,168,76,0.15);color:var(--gold);font-size:10px;margin-bottom:12px;">SURGEONS & SPECIALISTS</span>
          <h3 class="serif" style="font-size:1.4rem;font-weight:700;margin-bottom:10px;color:var(--cream);">Operative risk, consent & liability.</h3>
          <p style="font-size:14px;color:rgba(237,232,222,0.65);line-height:1.6;">Deep-dives into surgical negligence cases, post-operative complications, and theatre consent documentation standards.</p>
        </div>
      </div>

      <div style="border-radius:24px;overflow:hidden;border:1px solid var(--border);position:relative;">
        <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=600&q=80" alt="GP" style="width:100%;height:200px;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.25);" />
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,9,8,0.95) 30%,transparent);"></div>
        <div style="position:absolute;bottom:0;left:0;right:0;padding:22px;">
          <span class="tag" style="background:rgba(111,168,130,0.1);color:var(--greenlit);font-size:10px;margin-bottom:8px;">GPs & PRIMARY CARE</span>
          <h3 class="serif" style="font-size:1.1rem;font-weight:700;color:var(--cream);">Referral duties & prescription law.</h3>
        </div>
      </div>

      <div style="border-radius:24px;overflow:hidden;border:1px solid var(--border);position:relative;">
        <img src="https://images.unsplash.com/photo-1504813184591-01572f98c85f?w=600&q=80" alt="Hospital" style="width:100%;height:200px;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.25);" />
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(10,9,8,0.95) 30%,transparent);"></div>
        <div style="position:absolute;bottom:0;left:0;right:0;padding:22px;">
          <span class="tag" style="background:rgba(201,168,76,0.1);color:var(--gold2);font-size:10px;margin-bottom:8px;">HOSPITAL ADMINISTRATORS</span>
          <h3 class="serif" style="font-size:1.1rem;font-weight:700;color:var(--cream);">Licensing, accreditation & NABH.</h3>
        </div>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════════════════
     COMPARISON TABLE
  ══════════════════════════════════════════ -->
  <section style="padding:80px 24px;max-width:900px;margin:0 auto;position:relative;z-index:2;">
    <div style="text-align:center;margin-bottom:50px;" class="reveal d1">
      <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.5rem);font-weight:700;letter-spacing:-1px;margin-bottom:12px;color:var(--cream);">Plan comparison</h2>
      <p style="color:var(--muted);font-size:14px;font-family:'Cormorant Garamond',serif;font-size:1rem;">Every feature, side by side.</p>
    </div>

    <div class="reveal d2" style="border:1px solid var(--border);border-radius:20px;overflow:hidden;">
      <table style="width:100%;border-collapse:collapse;font-size:14px;">
        <thead>
          <tr style="background:var(--surface2);">
            <th style="padding:18px 24px;text-align:left;font-family:'Playfair Display',serif;font-weight:700;font-size:13px;color:var(--muted);border-bottom:1px solid var(--border);">Feature</th>
            <th style="padding:18px 24px;text-align:center;font-family:'Playfair Display',serif;font-weight:700;font-size:13px;border-bottom:1px solid var(--border);color:var(--cream);">1 Month</th>
            <th style="padding:18px 24px;text-align:center;font-family:'Playfair Display',serif;font-weight:700;font-size:13px;color:var(--gold);border-bottom:1px solid var(--border);background:rgba(201,168,76,0.05);">3 Months ⭐</th>
            <th style="padding:18px 24px;text-align:center;font-family:'Playfair Display',serif;font-weight:700;font-size:13px;color:var(--greenlit);border-bottom:1px solid var(--border);">6 Months</th>
          </tr>
        </thead>
        <tbody>
          <tr class="compare-row" style="border-bottom:1px solid var(--border);">
            <td style="padding:16px 24px;color:var(--muted);">Article access</td>
            <td style="padding:16px 24px;text-align:center;color:var(--text);">Full</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);color:var(--gold);font-weight:600;">Unlimited</td>
            <td style="padding:16px 24px;text-align:center;color:var(--greenlit);font-weight:600;">Unlimited</td>
          </tr>
          <tr class="compare-row" style="border-bottom:1px solid var(--border);">
            <td style="padding:16px 24px;color:var(--muted);">Case search / month</td>
            <td style="padding:16px 24px;text-align:center;">50</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);">Unlimited</td>
            <td style="padding:16px 24px;text-align:center;">Unlimited</td>
          </tr>
          <tr class="compare-row" style="border-bottom:1px solid var(--border);">
            <td style="padding:16px 24px;color:var(--muted);">CME modules</td>
            <td style="padding:16px 24px;text-align:center;color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);color:var(--gold);">3 / month</td>
            <td style="padding:16px 24px;text-align:center;color:var(--greenlit);">Unlimited</td>
          </tr>
          <tr class="compare-row" style="border-bottom:1px solid var(--border);">
            <td style="padding:16px 24px;color:var(--muted);">Expert consultation credits</td>
            <td style="padding:16px 24px;text-align:center;color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;color:var(--greenlit);">2 / cycle</td>
          </tr>
          <tr class="compare-row" style="border-bottom:1px solid var(--border);">
            <td style="padding:16px 24px;color:var(--muted);">PDF archive downloads</td>
            <td style="padding:16px 24px;text-align:center;color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;color:var(--greenlit);">✓</td>
          </tr>
          <tr class="compare-row">
            <td style="padding:16px 24px;color:var(--muted);">Group / institution licence</td>
            <td style="padding:16px 24px;text-align:center;color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;background:rgba(201,168,76,0.03);color:#555;">✕</td>
            <td style="padding:16px 24px;text-align:center;color:var(--greenlit);">✓</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- ══════════════════════════════════════════
     TESTIMONIALS
  ══════════════════════════════════════════ -->
  <section style="padding:80px 24px;max-width:1100px;margin:0 auto;position:relative;z-index:2;">
    <div style="text-align:center;margin-bottom:60px;" class="reveal d1">
      <span class="tag" style="background:rgba(201,168,76,0.08);color:var(--gold2);border:1px solid rgba(201,168,76,0.15);margin-bottom:16px;display:inline-flex;">Testimonials</span>
      <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:700;letter-spacing:-1px;">Trusted by 12,000+ physicians.</h2>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;" class="reveal d2">

      <div class="testi-card" style="border-radius:20px;padding:28px;">
        <div style="display:flex;gap:3px;margin-bottom:16px;color:var(--gold);font-size:14px;">★★★★★</div>
        <p class="light-serif" style="font-size:1.05rem;color:rgba(237,232,222,0.75);line-height:1.7;margin-bottom:20px;font-style:italic;">"Finally, legal commentary that speaks in clinical terms. The Consumer Protection Act series alone saved me from a very costly misunderstanding."</p>
        <div style="display:flex;align-items:center;gap:12px;">
          <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=100&q=80" alt="" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid rgba(201,168,76,0.25);" />
          <div>
            <div style="font-size:13px;font-weight:600;color:var(--cream);">Dr. Priya Mehta</div>
            <div style="font-size:11px;color:var(--muted);">Cardiologist, Mumbai</div>
          </div>
        </div>
      </div>

      <div class="testi-card" style="border-radius:20px;padding:28px;border-color:rgba(201,168,76,0.18);">
        <div style="display:flex;gap:3px;margin-bottom:16px;color:var(--gold);font-size:14px;">★★★★★</div>
        <p class="light-serif" style="font-size:1.05rem;color:rgba(237,232,222,0.75);line-height:1.7;margin-bottom:20px;font-style:italic;">"The weekly digest is the first email I open every Friday. Concise, relevant, and it's changed how I approach documentation entirely."</p>
        <div style="display:flex;align-items:center;gap:12px;">
          <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=100&q=80" alt="" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid rgba(111,168,130,0.3);" />
          <div>
            <div style="font-size:13px;font-weight:600;color:var(--cream);">Dr. Rajesh Anand</div>
            <div style="font-size:11px;color:var(--muted);">Orthopaedic Surgeon, Delhi</div>
          </div>
        </div>
      </div>

      <div class="testi-card" style="border-radius:20px;padding:28px;">
        <div style="display:flex;gap:3px;margin-bottom:16px;color:var(--gold);font-size:14px;">★★★★★</div>
        <p class="light-serif" style="font-size:1.05rem;color:rgba(237,232,222,0.75);line-height:1.7;margin-bottom:20px;font-style:italic;">"Used the expert consultation credit before a complex surgery. The medico-legal advice gave my team genuine peace of mind. Worth every rupee."</p>
        <div style="display:flex;align-items:center;gap:12px;">
          <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=100&q=80" alt="" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:2px solid rgba(201,168,76,0.25);" />
          <div>
            <div style="font-size:13px;font-weight:600;color:var(--cream);">Dr. Sunitha Rao</div>
            <div style="font-size:11px;color:var(--muted);">Obstetrician, Bengaluru</div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════════════════
     FAQ
  ══════════════════════════════════════════ -->
  <section style="padding:80px 24px;max-width:720px;margin:0 auto;position:relative;z-index:2;">
    <div style="text-align:center;margin-bottom:50px;" class="reveal d1">
      <h2 class="serif" style="font-size:clamp(1.8rem,4vw,2.5rem);font-weight:700;letter-spacing:-1px;color:var(--cream);">Frequently Asked</h2>
    </div>

    <div style="display:flex;flex-direction:column;gap:12px;" class="reveal d2">

      <details style="background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;cursor:pointer;">
        <summary style="padding:20px 24px;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:var(--cream);">
          Can I cancel anytime?
          <span style="color:var(--gold);font-size:20px;line-height:1;">+</span>
        </summary>
        <div style="padding:0 24px 20px;font-size:14px;color:var(--muted);line-height:1.7;font-family:'Cormorant Garamond',serif;font-size:1rem;">Yes. Cancel from your account settings at any time. Plans cancelled within 14 days receive a full refund — no questions asked.</div>
      </details>

      <details style="background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;cursor:pointer;">
        <summary style="padding:20px 24px;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:var(--cream);">
          Is this legal advice?
          <span style="color:var(--gold);font-size:20px;line-height:1;">+</span>
        </summary>
        <div style="padding:0 24px 20px;font-size:14px;color:var(--muted);line-height:1.7;font-family:'Cormorant Garamond',serif;font-size:1rem;">Lawchiption publishes legal commentary and educational analysis for informational purposes. It does not constitute formal legal advice, and subscription does not create an attorney-client relationship. For specific matters, please consult a qualified advocate.</div>
      </details>

      <details style="background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;cursor:pointer;">
        <summary style="padding:20px 24px;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:var(--cream);">
          Can I upgrade mid-plan?
          <span style="color:var(--gold);font-size:20px;line-height:1;">+</span>
        </summary>
        <div style="padding:0 24px 20px;font-size:14px;color:var(--muted);line-height:1.7;font-family:'Cormorant Garamond',serif;font-size:1rem;">Absolutely. Upgrade instantly and pay only the prorated difference. Your new plan takes effect immediately upon payment.</div>
      </details>

      <details style="background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;cursor:pointer;">
        <summary style="padding:20px 24px;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:var(--cream);">
          Are articles updated regularly?
          <span style="color:var(--gold);font-size:20px;line-height:1;">+</span>
        </summary>
        <div style="padding:0 24px 20px;font-size:14px;color:var(--muted);line-height:1.7;font-family:'Cormorant Garamond',serif;font-size:1rem;">Yes — new articles are published every weekday. Breaking judgements and regulatory changes receive same-day coverage, typically within hours of official gazette notification.</div>
      </details>

      <details style="background:var(--surface);border:1px solid var(--border);border-radius:16px;overflow:hidden;cursor:pointer;">
        <summary style="padding:20px 24px;font-weight:600;font-size:15px;list-style:none;display:flex;justify-content:space-between;align-items:center;color:var(--cream);">
          Do you offer institutional or hospital licences?
          <span style="color:var(--gold);font-size:20px;line-height:1;">+</span>
        </summary>
        <div style="padding:0 24px 20px;font-size:14px;color:var(--muted);line-height:1.7;font-family:'Cormorant Garamond',serif;font-size:1rem;">Yes. The Elite (6-month) plan includes group licensing for up to 5 users. For hospital-wide or institution deployments, contact us for custom pricing.</div>
      </details>

    </div>
  </section>

  <!-- ══════════════════════════════════════════
     FINAL CTA
  ══════════════════════════════════════════ -->
  <section style="padding:80px 24px 100px;position:relative;overflow:hidden;z-index:2;text-align:center;">
    <div class="mesh-bg">
      <div class="orb" style="width:550px;height:550px;background:radial-gradient(var(--green),transparent);top:50%;left:50%;transform:translate(-50%,-50%);opacity:0.16;"></div>
    </div>
    <div style="position:relative;z-index:2;max-width:600px;margin:0 auto;">
      <div class="reveal d1" style="font-size:2.5rem;margin-bottom:16px;">⚖️</div>
      <h2 class="serif reveal d2" style="font-size:clamp(2rem,5vw,3.5rem);font-weight:700;letter-spacing:-1.5px;line-height:1.1;margin-bottom:20px;color:var(--cream);">
        Know your rights.<br />
        <span class="shimmer-text light-serif" style="font-style:italic;">Protect your practice.</span>
      </h2>
      <p class="reveal d3" style="color:var(--muted);font-family:'Cormorant Garamond',serif;font-size:1.15rem;line-height:1.75;margin-bottom:36px;">Join 12,000+ doctors already reading Lawchiption. Your first 14 days are completely risk-free.</p>
      <div class="reveal d4" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <div class="btn-glow" style="border-radius:14px;">
          <button style="padding:16px 36px;border-radius:14px;background:linear-gradient(135deg,var(--green),var(--greenlit));border:none;cursor:pointer;font-family:'Playfair Display',serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--cream);position:relative;z-index:1;">
            Start Free Trial
          </button>
        </div>
        <button class="btn-plain" style="padding:16px 36px;border-radius:14px;background:transparent;cursor:pointer;font-family:'Playfair Display',serif;font-size:14px;font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--text);">
          View All Plans ↓
        </button>
      </div>
    </div>
  </section>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{ asset('frontend/js/subscription.js') }}?v=2"></script>

<script>
  const isLoggedIn = {{Auth::check() ? 'true' : 'false'}};
  const loginUrl = "{{ route('login') }}";
</script>

<script>
  function checkLoginAndPay(plan, amount) {

    if (!isLoggedIn) {
      Swal.fire({
        title: 'Unlock Premium Access ✨',
        html: `<p class="text-gray-600">Sign in to continue with your subscription and access exclusive legal content.</p>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sign In',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#8b5cf6',
        backdrop: true,
        customClass: {
          popup: 'rounded-3xl'
        }
      }).then((result) => {
        if (result.isConfirmed) window.location.href = loginUrl;
      });
      return;
    }

    // ✅ Check if user already has an active plan
    const hasActivePlan = {{$isActive ? 'true' : 'false'}};
    console.log(hasActivePlan, '>>>>>>')
    const currentPlan = "{{ $planLabel ?? '' }}";
    const expiryDate = "{{ ($sub ?? null) ? \Carbon\Carbon::parse($sub->expiry_date)->format('d M Y') : '' }}";

    if (hasActivePlan) {
      Swal.fire({
        title: 'You Already Have an Active Plan!',
        html: `
            <div style="text-align:center; padding:8px 0;">
                <div style="display:inline-flex; align-items:center; gap:8px;
                            background:#fef3c7; border:1px solid #fde68a;
                            padding:10px 20px; border-radius:12px; margin-bottom:14px;">
                    <i class="fas fa-crown" style="color:#f59e0b; font-size:18px;"></i>
                    <span style="font-weight:700; color:#92400e; font-size:15px;">
                        ${currentPlan} Plan
                    </span>
                </div>
                <p style="color:#6b7280; font-size:14px; margin:0;">
                    Your current plan is active until
                    <strong style="color:#111827;">${expiryDate}</strong>.
                </p>
                <p style="color:#9ca3af; font-size:13px; margin:10px 0 0;">
                    You can subscribe to a new plan once your current plan expires.
                </p>
            </div>
        `,
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: '<i class="fas fa-eye" style="margin-right:6px;"></i> View My Plan',
        cancelButtonText: 'OK',
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#6b7280',
        customClass: {
          popup: 'rounded-3xl'
        }
      }).then((result) => {
        if (result.isConfirmed) openPlanModal();
      });
      return;
    }

    payNow(plan, amount);
  }

  // $(document).ready(function() {

  //   console.log('Page Loaded');

  //   // Force buttons above overlays
  //   $('#plan1Btn, #plan2Btn, #plan3Btn').css({
  //     'position': 'relative',
  //     'z-index': '99999',
  //     'pointer-events': 'auto'
  //   });

  //   $(document).on('click touchstart', '#plan1Btn', function(e) {
  //     e.preventDefault();
  //     checkLoginAndPay('1_month', 100);
  //   });

  //   $(document).on('click touchstart', '#plan2Btn', function(e) {
  //     e.preventDefault();
  //     checkLoginAndPay('3_month', 200);
  //   });

  //   $(document).on('click touchstart', '#plan3Btn', function(e) {
  //     e.preventDefault();
  //     checkLoginAndPay('6_month', 300);
  //   });

  // });

  // track current billing mode
var currentMode = 'monthly';

// keep setToggle in sync
var _origSetToggle = setToggle;
window.setToggle = function(mode) {
  currentMode = mode;
  _origSetToggle(mode);
};

$(document).ready(function() {

  console.log('Page Loaded');

  // Force buttons above overlays
  $('#plan1Btn, #plan2Btn, #plan3Btn').css({
    'position': 'relative',
    'z-index': '99999',
    'pointer-events': 'auto'
  });

  // Plan config for each mode
  var planConfig = {
    monthly: {
      plan1: { plan: '1_month',  amount: 499 },
      plan2: { plan: '3_month',  amount: 1197 },
      plan3: { plan: '6_month',  amount: 2094 },
    },
    yearly: {
      plan1: { plan: '1_year',   amount: 3588 },
      plan2: { plan: '2_year',   amount: 5976 },
      plan3: { plan: '3_year',   amount: 7164 },
    },
  };

  $(document).on('click touchstart', '#plan1Btn', function(e) {
    e.preventDefault();
    var cfg = planConfig[currentMode].plan1;
    checkLoginAndPay(cfg.plan, cfg.amount);
  });

  $(document).on('click touchstart', '#plan2Btn', function(e) {
    e.preventDefault();
    var cfg = planConfig[currentMode].plan2;
    checkLoginAndPay(cfg.plan, cfg.amount);
  });

  $(document).on('click touchstart', '#plan3Btn', function(e) {
    e.preventDefault();
    var cfg = planConfig[currentMode].plan3;
    checkLoginAndPay(cfg.plan, cfg.amount);
  });

});

function showLoader() {
    Swal.fire({
        title: 'Processing...',
        html: 'Please wait while we set up your subscription.',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => { Swal.showLoading(); }
    });
}

function payNow(plan, amount) {

    showLoader(); // ← show loader immediately

    $.ajax({
        url: '/create-order',
        type: 'POST',
        dataType: 'json',
        data: { _token: '{{ csrf_token() }}', plan: plan, amount: amount },

        success: function(res) {

            Swal.close(); // ← close loader before opening Razorpay

            if (!res.subscription_id) {
                Swal.fire('Error', 'Could not create subscription. Try again.', 'error');
                return;
            }

            var options = {
                key:             res.key,
                subscription_id: res.subscription_id,
                name:            'Lawchiption',
                description:     'Auto-renewing plan — ' + plan,
                recurring:       1,

                prefill: {
                    name:    '{{ Auth::check() ? Auth::user()->full_name ?? "" : "" }}',
                    email:   '{{ Auth::check() ? Auth::user()->email : "" }}',
                    contact: '{{ Auth::check() ? Auth::user()->mobile_number : "" }}',
                },

                theme: { color: '#2d6b4a' },

                handler: function(response) {

                    showLoader(); // ← show loader again while verifying

                    $.ajax({
                        url: '/verify-payment',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token:                   '{{ csrf_token() }}',
                            plan:                     plan,
                            amount:                   amount,
                            razorpay_payment_id:      response.razorpay_payment_id,
                            razorpay_subscription_id: response.razorpay_subscription_id,
                            razorpay_signature:       response.razorpay_signature,
                        },
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Subscription Activated! 🎉',
                                    text:  'Auto-renewal is set up. You are all set!',
                                    icon:  'success',
                                    confirmButtonColor: '#2d6b4a',
                                }).then(() => location.reload());
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Verification failed. Contact support.', 'error');
                        }
                    });
                },

                modal: {
                    ondismiss: function() {
                        Swal.close(); // ← close loader if user closes Razorpay
                        console.log('Checkout closed');
                    }
                }
            };

            var rzp = new Razorpay(options);
            rzp.on('payment.failed', function(r) {
                Swal.close();
                Swal.fire('Payment Failed', r.error.description, 'error');
            });
            rzp.open();
        },

        error: function() {
            Swal.close();
            Swal.fire('Error', 'Could not reach server. Try again.', 'error');
        }
    });
}
</script>