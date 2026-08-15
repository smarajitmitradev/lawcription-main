@extends('frontend.layout.master')

@section('title', 'Your Library — Lawcription')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend/css/subscription.css') }}">

@section('content')

<div class="library-html">

  <style>
    .library-html{
      --green:#3d6b4a; --green2:#2d5a3d; --greenlit:#6fa882;
      --gold:#c9a84c; --gold2:#b8922e;
      --cream:#f2ead8; --text:#ede8de;
      --bg:#0a0908; --surface:#131211; --surface2:#1a1917;
      --border:rgba(242,234,216,0.08); --border2:rgba(201,168,76,0.16);
      --muted:#9a9488; --muted2:#b3ab9c;
      background:var(--bg); color:var(--text); font-family:'DM Sans',sans-serif;
      position:relative; overflow:hidden;
    }
    .library-html .serif{ font-family:'Playfair Display',serif; }
    .library-html .light-serif{ font-family:'Cormorant Garamond',serif; }
    .library-html .shimmer{
      background:linear-gradient(100deg,var(--gold) 20%,var(--cream) 40%,var(--greenlit) 60%,var(--gold) 80%);
      background-size:220% auto; -webkit-background-clip:text; background-clip:text; color:transparent;
      animation:shimmer 7s linear infinite;
    }
    @keyframes shimmer{ to{ background-position:-220% center; } }
    .library-html .mesh{ position:absolute; inset:0; pointer-events:none; z-index:0; }
    .library-html .orb{ position:absolute; border-radius:50%; filter:blur(60px); }
    .library-html .grain{
      position:absolute; inset:0; opacity:0.05; mix-blend-mode:overlay; pointer-events:none;
      background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2'/%3E%3C/filter%3E%3Crect width='100' height='100' filter='url(%23n)'/%3E%3C/svg%3E");
    }
    .library-html .tag{
      display:inline-flex; align-items:center; gap:6px; padding:6px 14px; border-radius:999px;
      font-size:11px; letter-spacing:1.5px; text-transform:uppercase; font-weight:600; font-family:'DM Sans',sans-serif;
    }

    /* ── Folder-tab rail ── */
    .library-html .rail-item{
      display:flex; align-items:center; gap:14px; width:100%; text-align:left;
      padding:14px 16px; border-radius:14px; border:1px solid transparent;
      background:transparent; cursor:pointer; transition:all .25s ease; position:relative;
      color:var(--muted2);
    }
    .library-html .rail-item:hover{ background:rgba(255,255,255,0.03); border-color:var(--border); }
    .library-html .rail-item.active{
      background:linear-gradient(90deg,rgba(201,168,76,0.12),rgba(61,107,79,0.08));
      border-color:var(--border2); color:var(--cream);
      box-shadow:inset 3px 0 0 var(--gold);
      transform:translateX(4px);
    }
    .library-html .rail-num{
      font-family:'Playfair Display',serif; font-size:11px; color:var(--muted); letter-spacing:1px; min-width:34px;
    }
    .library-html .rail-item.active .rail-num{ color:var(--gold); }
    .library-html .rail-icon{
      width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.04);
      display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0;
      border:1px solid var(--border);
    }
    .library-html .rail-item.active .rail-icon{ background:rgba(201,168,76,0.14); border-color:rgba(201,168,76,0.3); }
    .library-html .rail-title{ font-size:13.5px; font-weight:600; line-height:1.3; }

    /* ── Mobile pill strip ── */
    .library-html .pill-strip{ -webkit-overflow-scrolling:touch; scrollbar-width:none; }
    .library-html .pill-strip::-webkit-scrollbar{ display:none; }
    .library-html .pill-chip{
      flex:0 0 auto; display:flex; align-items:center; gap:8px; padding:10px 16px; border-radius:999px;
      border:1px solid var(--border); background:var(--surface); font-size:12.5px; font-weight:600;
      color:var(--muted2); white-space:nowrap; cursor:pointer; transition:all .2s ease;
    }
    .library-html .pill-chip.active{
      background:linear-gradient(135deg,rgba(201,168,76,0.16),rgba(61,107,79,0.14));
      border-color:rgba(201,168,76,0.4); color:var(--gold);
    }

    /* ── Content panel ── */
    .library-html .panel{ display:none; }
    .library-html .panel.active{ display:block; animation:fadein .4s ease; }
    @keyframes fadein{ from{ opacity:0; transform:translateY(8px); } to{ opacity:1; transform:translateY(0); } }
    .library-html .chip{
      display:inline-flex; align-items:center; gap:6px; padding:8px 14px; border-radius:10px;
      background:rgba(255,255,255,0.03); border:1px solid var(--border); font-size:12.5px; color:var(--muted2);
    }
    .library-html .chip::before{ content:'§'; color:var(--gold); font-weight:700; }

    .library-html .locked-note{
      display:flex; gap:10px; align-items:flex-start; padding:14px 16px; border-radius:12px;
      background:rgba(201,168,76,0.06); border:1px dashed rgba(201,168,76,0.28); font-size:12.5px; color:var(--muted2);
    }
  </style>

  {{-- ══════════════════════════════════════════
     HEADER
  ══════════════════════════════════════════ --}}
  <section class="relative px-6 pt-20 pb-14 md:pt-28 md:pb-20 text-center">
    <div class="mesh">
      <div class="orb" style="width:600px;height:600px;background:radial-gradient(var(--green),transparent);top:-260px;left:50%;transform:translateX(-50%);opacity:0.18;"></div>
      <div class="orb" style="width:380px;height:380px;background:radial-gradient(var(--gold),transparent);bottom:-100px;right:-100px;opacity:0.12;"></div>
    </div>
    <div class="grain"></div>

    <div class="relative z-10 max-w-2xl mx-auto">
      <span class="tag mb-5" style="background:rgba(61,107,79,0.15);color:var(--greenlit);border:1px solid rgba(61,107,79,0.3);">
        <span style="width:6px;height:6px;border-radius:50%;background:var(--greenlit);display:inline-block;"></span>
        Your Subscriber Library
      </span>
      <h1 class="serif" style="font-size:clamp(2.1rem,6vw,3.6rem);font-weight:700;line-height:1.1;letter-spacing:-1px;">
        Fifteen sections.<br /><span class="shimmer light-serif italic" style="font-weight:300;">One legal case file.</span>
      </h1>
      <p class="light-serif mt-5 mx-auto" style="font-size:1.15rem;color:var(--muted2);line-height:1.8;max-width:520px;">
        Everything in your subscription, organised the way a medico-legal advisor would keep it — indexed, tabbed, and ready to open.
      </p>
      <div class="flex justify-center gap-10 mt-10 flex-wrap">
        <div class="text-center">
          <div class="serif shimmer" style="font-size:1.9rem;font-weight:700;">15</div>
          <div style="font-size:10.5px;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-top:2px;">Sections</div>
        </div>
        <div style="width:1px;background:var(--border);"></div>
        <div class="text-center">
          <div class="serif shimmer" style="font-size:1.9rem;font-weight:700;">800+</div>
          <div style="font-size:10.5px;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-top:2px;">Articles</div>
        </div>
        <div style="width:1px;background:var(--border);"></div>
        <div class="text-center">
          <div class="serif shimmer" style="font-size:1.9rem;font-weight:700;">Regularly</div>
          <div style="font-size:10.5px;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-top:2px;">Updates</div>
        </div>
      </div>
    </div>
  </section>

  {{-- ══════════════════════════════════════════
     MOBILE / TABLET PILL STRIP (below md)
  ══════════════════════════════════════════ --}}
  <div class="md:hidden sticky top-0 z-30 px-4 py-3" style="background:rgba(10,9,8,0.92);backdrop-filter:blur(10px);border-bottom:1px solid var(--border);">
    <div id="pillStrip" class="pill-strip flex gap-2 overflow-x-auto"></div>
  </div>

  {{-- ══════════════════════════════════════════
     MAIN — RAIL + PANEL
  ══════════════════════════════════════════ --}}
  <section class="relative z-10 px-4 sm:px-6 pb-24 max-w-6xl mx-auto">
    <div class="flex flex-col md:flex-row gap-6 md:gap-8 mt-4 md:mt-6">

      {{-- Desktop rail --}}
      <aside class="hidden md:block md:w-[300px] flex-shrink-0">
        <div class="sticky top-8">
          <div style="padding:20px 10px;border-bottom:1px solid var(--border);margin-bottom:10px;">
            <div style="font-size:10.5px;letter-spacing:2px;text-transform:uppercase;color:var(--muted);">Table of Contents</div>
          </div>
          <div id="railList" class="flex flex-col gap-1.5 pr-2" style="max-height:calc(100vh - 140px);overflow-y:auto;"></div>
        </div>
      </aside>

      {{-- Content panel --}}
      <div class="flex-1 min-w-0">
        <div id="panelHost" style="background:var(--surface);border:1px solid var(--border);border-radius:24px;overflow:hidden;"></div>
      </div>

    </div>
  </section>

  {{-- ══════════════════════════════════════════
     BOTTOM STRIP
  ══════════════════════════════════════════ --}}
  <section class="relative z-10 px-6 pb-20">
  <div class="max-w-5xl mx-auto grid md:grid-cols-3 gap-6">

    <div class="p-8 rounded-3xl text-center" style="background:linear-gradient(135deg,rgba(61,107,79,0.08),rgba(201,168,76,0.05));border:1px solid var(--border2);">
      <div style="font-size:1.6rem;margin-bottom:10px;">📂</div>
      <h3 class="serif" style="font-size:1.15rem;font-weight:700;color:var(--cream);margin-bottom:8px;">New sections added regularly</h3>
      <p class="light-serif" style="font-size:0.95rem;color:var(--muted2);line-height:1.7;">As new laws, judgements and NMC circulars land, we file them straight into the section they belong to — nothing to search for.</p>
    </div>

    <div class="p-8 rounded-3xl text-center" style="background:linear-gradient(135deg,rgba(61,107,79,0.08),rgba(201,168,76,0.05));border:1px solid var(--border2);">
      <div style="font-size:1.6rem;margin-bottom:10px;">⚖️</div>
      <h3 class="serif" style="font-size:1.15rem;font-weight:700;color:var(--cream);margin-bottom:8px;">Written for practice, not just theory</h3>
      <p class="light-serif" style="font-size:0.95rem;color:var(--muted2);line-height:1.7;">Every explainer connects the law back to what it means for your day-to-day decisions in clinic — not just what a judgement says on paper.</p>
    </div>

    <div class="p-8 rounded-3xl text-center" style="background:linear-gradient(135deg,rgba(61,107,79,0.08),rgba(201,168,76,0.05));border:1px solid var(--border2);">
      <div style="font-size:1.6rem;margin-bottom:10px;">🔔</div>
      <h3 class="serif" style="font-size:1.15rem;font-weight:700;color:var(--cream);margin-bottom:8px;">Stay ahead of regulatory changes</h3>
      <p class="light-serif" style="font-size:0.95rem;color:var(--muted2);line-height:1.7;">Subscribers get notified the moment a relevant circular or amendment is published, so nothing catches your practice off guard.</p>
    </div>

  </div>
</section>

</div>

<script>
(function(){
  var sections = [
    { icon:'📰', title:'News', tagline:'Daily verified medicolegal, regulatory, and healthcare policy updates.',
      body:'A single, verified feed so you stop hunting across gazette notices, WhatsApp forwards and council circulars. Every item is checked against the primary source before it reaches you.',
      topics:['NMC circulars','State council notices','Policy amendments','Ministry orders'],
      img:'{{ asset("frontend/images/menu/19.png") }}' },

    { icon:'🩺', title:'Safe Practice', tagline:'Practical guidance reducing medico-legal risks in everyday clinical practice.',
      body:'Small, repeatable habits — how a note is written, how a referral is worded, what a file should contain — are what actually hold up later. This section turns those habits into checklists.',
      topics:['Documentation standards','Referral protocols','Record retention','Pre-procedure checklists'],
      img:'{{ asset("frontend/images/menu/2.png") }}' },

    { icon:'🚨', title:'Healthcare Violence', tagline:'Legal protection, reporting procedures, and safety during workplace violence incidents.',
      body:'What to do in the first ten minutes after an incident matters legally, not just physically. Covers the protections available to you and the exact reporting trail to follow.',
      topics:['Hospital protection acts','FIR filing steps','Security protocols','Post-incident documentation'],
      img:'{{ asset("frontend/images/menu/3.png") }}' },

    { icon:'⚖️', title:'Rights', tagline:'Understand legal rights and responsibilities of both patients, doctors and other healthcare professionals.',
      body:'Rights only protect you when you know their edges. Plain-language breakdowns of what patients can demand, what you can refuse, and where professional autonomy is actually protected in law.',
      topics:['Patient rights charter',"Doctor's duty of care",'Right to refuse treatment','Professional autonomy'],
      img:'{{ asset("frontend/images/menu/12.png") }}' },

    { icon:'📋', title:'Medical Negligence', tagline:'Learn negligence principles, documentation, defenses, and important judicial precedents.',
      body:'From the Bolam standard to what an Indian court actually expects as proof of care, this section builds your understanding of negligence from first principles up to real case outcomes.',
      topics:['Bolam & Bolitho tests','Standard of care','Expert testimony','Common defenses'],
      img:'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1000&q=80' },

    { icon:'🛡️', title:'Consumer Protection Act', tagline:'Understand consumer law, complaint procedures, and legal responsibilities in healthcare.',
      body:'Since medical service falls under consumer law, this is often where negligence claims actually begin. Understand how complaints move through District, State and National forums.',
      topics:['Filing procedures','Deficiency of service','Forum jurisdiction','Compensation caps'],
      img:'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1000&q=80' },

    { icon:'📢', title:'Medical Advertising', tagline:'Stay compliant with ethical advertising rules and applicable legal regulations.',
      body:'A single non-compliant Instagram post can trigger a council notice. Clear rules on what you can say about your practice, your results, and yourself.',
      topics:['NMC advertising code','Social media rules','Testimonial restrictions','Penalties & notices'],
      img:'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=1000&q=80' },

    { icon:'💻', title:'Telemedicine', tagline:'Follow telemedicine guidelines, consent requirements, and prescription regulations confidently.',
      body:'Remote consultation has its own consent, documentation and prescribing rules — different enough from in-person practice that assuming they are the same is the most common mistake.',
      topics:['Telemedicine Practice Guidelines','e-Prescriptions','Informed e-consent','Cross-state practice'],
      img:'{{ asset("frontend/images/menu/6.png") }}' },

    { icon:'🦷', title:'Allied Health', tagline:'Dental, Nursing & Allied Laws — legal updates for dentists, nurses, and allied healthcare professionals across India.',
      body:'Coverage built specifically for the parts of the profession that general medico-legal content usually skips — dental, nursing and paramedical scope-of-practice law.',
      topics:['Dental Council rules','Nursing Council Act','Paramedical regulation','Scope-of-practice limits'],
      img:'{{ asset("frontend/images/menu/10.png") }}' },

    { icon:'🏛️', title:'Court Process', tagline:'Learn FIRs, notices, evidence, court procedures, and legal documentation essentials.',
      body:'Most doctors\' first brush with court is stressful largely because the process is unfamiliar. Step-by-step walkthroughs of what a notice means and what happens after it.',
      topics:['Responding to an FIR','Summons & notices','Evidence & cross-exam','Courtroom conduct'],
      img:'{{ asset("frontend/images/menu/8.png") }}' },

    { icon:'⚠️', title:'High-Risk Laws', tagline:'Important laws commonly creating legal risks during routine medical practice.',
      body:'A short list of Acts responsible for a disproportionate share of medico-legal trouble — worth knowing cold rather than looking up after the fact.',
      topics:['PCPNDT Act','MTP Act','Transplantation of Human Organs Act','Drugs & Cosmetics Act'],
      img:'{{ asset("frontend/images/menu/9.png") }}' },

    { icon:'🧰', title:'Ready-Made Tools', tagline:'Access NMC-compliant certificates, consent forms, templates, and essential medico-legal documents.',
      body:'Pre-formatted documents you can download and customise the same day — built to NMC format so you are not drafting from scratch under time pressure.',
      topics:['Consent form templates','Medical & death certificates','Discharge summary formats','Referral letters'],
      img:'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1000&q=80' },

    { icon:'🏆', title:'Landmark Judgments', tagline:'Simplified summaries of landmark Supreme Court and High Court judgments affecting medical practice.',
      body:'The rulings that actually shaped how negligence, consent and liability are judged today — summarised for what they mean for your practice, not just the legal history.',
      topics:['Supreme Court rulings','High Court precedents','Case-by-case takeaways','Timeline of key judgments'],
      img:'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=1000&q=80' },

    { icon:'📚', title:'Acts & Regulations', tagline:'Browse important healthcare laws, rules, notifications, and official regulations of both Central and State Government.',
      body:'The full shelf — Central Acts down to state-specific rules and gazette notifications — kept current as amendments are notified.',
      topics:['Central Acts','State-specific rules','Gazette notifications','Amendment tracker'],
      img:'{{ asset("frontend/images/menu/1.png") }}' },

    { icon:'🧭', title:'Daily Laws', tagline:'Daily essential laws every citizen should know for informed, lawful living.',
      body:'Beyond the clinic — the everyday legal knowledge that makes you a better-informed citizen, from consumer basics to property and cyber law.',
      topics:['Consumer rights basics','RTI essentials','Property & tenancy','Cyber law for citizens'],
      img:'{{ asset("frontend/images/menu/13.png") }}' }
  ];

  var railList = document.getElementById('railList');
  var pillStrip = document.getElementById('pillStrip');
  var panelHost = document.getElementById('panelHost');

  sections.forEach(function(s, i){
    var num = String(i+1).padStart(2,'0');

    var rail = document.createElement('button');
    rail.type = 'button';
    rail.className = 'rail-item' + (i===0 ? ' active' : '');
    rail.dataset.idx = i;
    rail.innerHTML =
      '<span class="rail-num">No. '+num+'</span>' +
      '<span class="rail-icon">'+s.icon+'</span>' +
      '<span class="rail-title">'+s.title+'</span>';
    rail.addEventListener('click', function(){ activate(i); });
    railList.appendChild(rail);

    var pill = document.createElement('button');
    pill.type = 'button';
    pill.className = 'pill-chip' + (i===0 ? ' active' : '');
    pill.dataset.idx = i;
    pill.innerHTML = '<span>'+s.icon+'</span><span>'+s.title+'</span>';
    pill.addEventListener('click', function(){ activate(i); });
    pillStrip.appendChild(pill);

    var panel = document.createElement('div');
    panel.className = 'panel' + (i===0 ? ' active' : '');
    panel.id = 'panel-'+i;
    panel.innerHTML =
      '<div style="position:relative;height:210px;overflow:hidden;">' +
        '<img src="'+s.img+'" alt="'+s.title+'" style="width:100%;height:100%;object-fit:cover;display:block;filter:brightness(0.55) sepia(0.22);" />' +
        '<div style="position:absolute;inset:0;background:linear-gradient(to top,var(--surface) 5%,transparent 80%);"></div>' +
        '<div style="position:absolute;bottom:16px;left:24px;right:24px;display:flex;align-items:center;gap:12px;">' +
          '<span style="width:48px;height:48px;border-radius:12px;background:rgba(201,168,76,0.16);border:1px solid rgba(201,168,76,0.35);display:flex;align-items:center;justify-content:center;font-size:22px;">'+s.icon+'</span>' +
          '<div>' +
            '<div style="font-size:10.5px;letter-spacing:2px;text-transform:uppercase;color:var(--gold);">Case File No. '+num+'</div>' +
            '<div class="serif" style="font-size:1.5rem;font-weight:700;color:var(--cream);">'+s.title+'</div>' +
          '</div>' +
        '</div>' +
      '</div>' +
      '<div style="padding:28px 28px 32px;">' +
        '<p class="light-serif" style="font-size:1.15rem;color:var(--muted2);line-height:1.7;margin-bottom:16px;">'+s.tagline+'</p>' +
        '<p style="font-size:14px;color:var(--muted2);line-height:1.8;margin-bottom:24px;">'+s.body+'</p>' +
        '<div style="font-size:10.5px;letter-spacing:2px;text-transform:uppercase;color:var(--muted);margin-bottom:12px;">Inside this section</div>' +
        '<div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:24px;">' +
          s.topics.map(function(t){ return '<span class="chip">'+t+'</span>'; }).join('') +
        '</div>' +
        '<div class="locked-note">' +
          '<span style="font-size:16px;">🔒</span>' +
          '<span>Unlocked with your active subscription — open the Lawcription app to read every article inside this section.</span>' +
        '</div>' +
      '</div>';
    panelHost.appendChild(panel);
  });

  function activate(i){
    document.querySelectorAll('.rail-item').forEach(function(el){ el.classList.toggle('active', +el.dataset.idx === i); });
    document.querySelectorAll('.pill-chip').forEach(function(el){ el.classList.toggle('active', +el.dataset.idx === i); });
    document.querySelectorAll('.panel').forEach(function(el){ el.classList.toggle('active', el.id === 'panel-'+i); });
    var activePill = document.querySelector('.pill-chip.active');
    if (activePill) activePill.scrollIntoView({ behavior:'smooth', inline:'center', block:'nearest' });
  }
})();
</script>

@endsection
