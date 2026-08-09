<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<footer id="footer" class="lc-footer">

  <style>
    .lc-footer{
      --green:#3d6b4a !important; --green2:#2d5a3d !important; --greenlit:#6fa882 !important;
      --gold:#c9a84c !important; --gold2:#b8922e !important;
      --cream:#f2ead8 !important; --text:#ede8de !important;
      --bg:#0a0908 !important; --surface:#131211 !important; --surface2:#1a1917 !important;
      --border:rgba(242,234,216,0.08) !important; --border2:rgba(201,168,76,0.16) !important;
      --muted:#9a9488 !important; --muted2:#b3ab9c !important;
      background:var(--bg) !important; color:var(--muted2) !important; font-family:'DM Sans',sans-serif !important;
      border-top:1px solid var(--border) !important; position:relative !important; overflow:hidden !important;
      display:block !important; width:100% !important;
    }
    .lc-footer *{ box-sizing:border-box !important; }
    .lc-footer .lc-serif{ font-family:'Playfair Display',serif !important; }
    .lc-footer .lc-lightserif{ font-family:'Cormorant Garamond',serif !important; }
    .lc-footer .lc-eyebrow{
      font-size:11px !important; letter-spacing:2.5px !important; text-transform:uppercase !important;
      color:var(--gold) !important; font-weight:700 !important; display:block !important;
    }
    .lc-footer a{ color:inherit !important; text-decoration:none !important; }

    .lc-footer .lc-mesh{ position:absolute !important; inset:0 !important; pointer-events:none !important; z-index:0 !important; overflow:hidden !important; }
    .lc-footer .lc-orb{ position:absolute !important; border-radius:50% !important; filter:blur(70px) !important; }

    .lc-footer .lc-wrap{ position:relative !important; z-index:10 !important; max-width:1152px !important; margin:0 auto !important; padding:80px 24px 40px !important; }

    /* ── Newsletter ── */
    .lc-footer .lc-newsletter{
      max-width:560px !important; margin:0 auto 64px !important; border-radius:20px !important;
      padding:36px 24px !important; text-align:center !important;
      background:var(--surface) !important; border:1px solid var(--border2) !important;
      box-shadow:0 30px 80px rgba(0,0,0,0.45) !important;
    }
    .lc-footer .lc-newsletter h5{
      font-size:clamp(1.15rem,2.6vw,1.5rem) !important; font-weight:700 !important; color:var(--cream) !important;
      line-height:1.4 !important; margin:12px 0 24px !important;
    }
    .lc-footer .lc-mc-row{
      display:flex !important; flex-direction:row !important; flex-wrap:wrap !important;
      gap:10px !important; align-items:stretch !important; justify-content:center !important; width:100% !important;
    }
    .lc-footer .lc-mc-row input[type="email"]{
      flex:1 1 220px !important; min-width:200px !important; height:50px !important; line-height:50px !important;
      background:rgba(255,255,255,0.05) !important; border:1px solid var(--border) !important;
      border-radius:999px !important; padding:0 22px !important; color:var(--cream) !important;
      font-size:14px !important; outline:none !important; box-shadow:none !important;
      transition:border-color .2s ease !important; margin:0 !important;
    }
    .lc-footer .lc-mc-row input[type="email"]::placeholder{ color:var(--muted) !important; }
    .lc-footer .lc-mc-row input[type="email"]:focus{ border-color:var(--gold) !important; }
    .lc-footer .lc-mc-row input[type="submit"]{
      flex:0 0 auto !important; height:50px !important; line-height:50px !important; padding:0 30px !important;
      background:linear-gradient(135deg,var(--green),var(--green2)) !important; border:none !important;
      color:var(--cream) !important; border-radius:999px !important; cursor:pointer !important;
      font-size:12px !important; font-weight:700 !important; letter-spacing:1.5px !important; text-transform:uppercase !important;
      transition:filter .2s ease !important; margin:0 !important; width:auto !important;
    }
    .lc-footer .lc-mc-row input[type="submit"]:hover{ filter:brightness(1.15) !important; }
    .lc-footer .lc-mc-status{ margin-top:10px !important; font-size:12px !important; color:var(--muted) !important; }

    /* ── Main grid ── */
    .lc-footer .lc-main{
      display:grid !important; grid-template-columns:1fr !important; gap:48px !important; align-items:start !important;
    }
    @media (min-width:1024px){
      .lc-footer .lc-main{ grid-template-columns:minmax(0,1fr) 2fr !important; gap:64px !important; }
    }

    .lc-footer .lc-logo img{ width:128px !important; display:block !important; }
    .lc-footer .lc-tagline{
      font-size:1.05rem !important; color:var(--muted2) !important; line-height:1.75 !important;
      max-width:320px !important; margin:20px 0 24px !important;
    }
    .lc-footer .lc-social{ display:flex !important; flex-direction:row !important; gap:12px !important; list-style:none !important; margin:0 !important; padding:0 !important; }
    .lc-footer .lc-social li{ display:block !important; margin:0 !important; padding:0 !important; }
    .lc-footer .lc-social-ico{
      width:40px !important; height:40px !important; border-radius:999px !important; border:1px solid var(--border) !important;
      display:flex !important; align-items:center !important; justify-content:center !important; color:var(--muted2) !important;
      background:rgba(255,255,255,0.03) !important; transition:all .25s ease !important;
    }
    .lc-footer .lc-social-ico svg{ width:17px !important; height:17px !important; fill:currentColor !important; }
    .lc-footer .lc-social-ico:hover{ border-color:var(--gold) !important; color:var(--gold) !important; background:rgba(201,168,76,0.1) !important; transform:translateY(-2px) !important; }

    .lc-footer .lc-cols{ display:grid !important; grid-template-columns:1fr !important; gap:32px !important; }
    @media (min-width:640px){ .lc-footer .lc-cols{ grid-template-columns:repeat(3,1fr) !important; gap:28px !important; } }

    .lc-footer .lc-col p{ font-size:14px !important; color:var(--muted2) !important; line-height:1.8 !important; margin:0 !important; }

    .lc-footer .lc-links{ list-style:none !important; margin:0 !important; padding:0 !important; display:flex !important; flex-direction:column !important; gap:8px !important; }
    .lc-footer .lc-links li{ margin:0 !important; padding:0 !important; }
    .lc-footer .lc-links a{ color:var(--muted2) !important; font-size:14px !important; transition:color .2s ease !important; }
    .lc-footer .lc-links a:hover{ color:var(--gold) !important; }

    .lc-footer .lc-hours{ list-style:none !important; margin:0 !important; padding:0 !important; }
    .lc-footer .lc-hours li{
      display:flex !important; flex-direction:row !important; flex-wrap:nowrap !important;
      justify-content:space-between !important; align-items:baseline !important; gap:12px !important;
      padding:7px 0 !important; margin:0 !important; font-size:14px !important;
      border-bottom:1px dashed var(--border) !important; white-space:nowrap !important;
    }
    .lc-footer .lc-hours li:last-child{ border-bottom:none !important; }
    .lc-footer .lc-hours .lc-hours-day{ color:var(--muted2) !important; }
    .lc-footer .lc-hours .lc-hours-time{ color:var(--cream) !important; font-weight:500 !important; }

    /* ── Bottom bar ── */
    .lc-footer .lc-bottom{
      margin-top:56px !important; padding-top:28px !important; border-top:1px solid var(--border) !important;
      display:flex !important; flex-direction:column !important; align-items:center !important;
      justify-content:center !important; gap:16px !important; text-align:center !important;
    }
    @media (min-width:768px){ .lc-footer .lc-bottom{ flex-direction:row !important; } }
    .lc-footer .lc-copy{ font-size:13px !important; color:var(--muted) !important; margin:0 !important; }
    .lc-footer .lc-legal-links{ display:flex !important; flex-wrap:wrap !important; align-items:center !important; justify-content:center !important; gap:10px !important; }
    .lc-footer .lc-pill{
      display:inline-block !important; padding:7px 16px !important; border-radius:999px !important;
      background:rgba(255,255,255,0.04) !important; border:1px solid var(--border) !important;
      color:var(--muted2) !important; font-size:13px !important; transition:all .25s ease !important;
    }
    .lc-footer .lc-pill:hover{ color:var(--cream) !important; background:rgba(201,168,76,0.1) !important; border-color:var(--border2) !important; }

    /* ── Back to top ── */
    .lc-footer .ss-go-top{
      display:flex !important; flex-direction:column !important; align-items:center !important;
      gap:4px !important; margin:36px auto 0 !important; width:fit-content !important;
    }
    .lc-footer .ss-go-top a{
      width:44px !important; height:44px !important; border-radius:999px !important; border:1px solid var(--border2) !important;
      background:rgba(201,168,76,0.06) !important; display:flex !important; align-items:center !important; justify-content:center !important;
      font-size:16px !important; color:var(--gold) !important; transition:all .25s ease !important;
    }
    .lc-footer .ss-go-top a:hover{ background:rgba(201,168,76,0.16) !important; transform:translateY(-3px) !important; }
    .lc-footer .ss-go-top span{ font-size:10px !important; letter-spacing:1.5px !important; text-transform:uppercase !important; color:var(--muted) !important; }
  </style>

  <div class="lc-mesh">
    <div class="lc-orb" style="width:520px;height:520px;background:radial-gradient(var(--green),transparent);bottom:-260px;left:-140px;opacity:0.16;"></div>
    <div class="lc-orb" style="width:380px;height:380px;background:radial-gradient(var(--gold),transparent);top:-160px;right:-100px;opacity:0.1;"></div>
  </div>

  <div class="lc-wrap">

    {{-- ══════════════════════════════════════════
       NEWSLETTER
    ══════════════════════════════════════════ --}}
    <div class="lc-newsletter">

      <span class="lc-eyebrow">Stay Informed</span>

      <h5 class="lc-serif">
        Subscribe to our mailing list for
        updates, news, and exclusive offers.
      </h5>

      <form id="mc-form" class="mc-form">

        <div class="lc-mc-row">

          <input type="email" name="EMAIL" id="mce-EMAIL" placeholder="Your Email Address" required>

          <input type="submit" name="subscribe" value="Subscribe">

        </div>

        <div class="mc-status lc-mc-status"></div>

      </form>

    </div>

    {{-- ══════════════════════════════════════════
       MAIN
    ══════════════════════════════════════════ --}}
    <div class="lc-main">

      <div>

        <a class="lc-logo" href="{{ route('home') }}">
          <img src="{{ asset('frontend/images/logo-1.svg') }}" alt="Homepage">
        </a>

        <p class="lc-lightserif lc-tagline">
          Trusted medico-legal knowledge and compliance tools for healthcare professionals.
        </p>

        <ul class="lc-social">
          <li>
            <a class="lc-social-ico" href="#0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z"></path>
              </svg>
              <span class="sr-only">Facebook</span>
            </a>
          </li>
          <li>
            <a class="lc-social-ico" href="#0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="m20.665 3.717-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42 10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15 4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z"></path>
              </svg>
              <span class="sr-only">Telegram</span>
            </a>
          </li>
          <li>
            <a class="lc-social-ico" href="#0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z"></path>
                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                <path d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z"></path>
              </svg>
              <span class="sr-only">Instagram</span>
            </a>
          </li>
          <li>
            <a class="lc-social-ico" href="#0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M8.31 10.28a2.5 2.5 0 1 0 2.5 2.49 2.5 2.5 0 0 0-2.5-2.49zm0 3.8a1.31 1.31 0 1 1 0-2.61 1.31 1.31 0 1 1 0 2.61zm7.38-3.8a2.5 2.5 0 1 0 2.5 2.49 2.5 2.5 0 0 0-2.5-2.49zM17 12.77a1.31 1.31 0 1 1-1.31-1.3 1.31 1.31 0 0 1 1.31 1.3z"></path>
                <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm7.38 10.77a3.69 3.69 0 0 1-6.2 2.71L12 16.77l-1.18-1.29a3.69 3.69 0 1 1-5-5.44l-1.2-1.3H7.3a8.33 8.33 0 0 1 9.41 0h2.67l-1.2 1.31a3.71 3.71 0 0 1 1.2 2.72z"></path>
                <path d="M14.77 9.05a7.19 7.19 0 0 0-5.54 0A4.06 4.06 0 0 1 12 12.7a4.08 4.08 0 0 1 2.77-3.65z"></path>
              </svg>
              <span class="sr-only">Tripadvisor</span>
            </a>
          </li>
        </ul>

      </div>


      <div class="lc-cols">

        <div class="lc-col">
          <h6 class="lc-eyebrow" style="margin-bottom:14px;">Location</h6>
          <p>
            456 Elm Street, Los Angeles <br>
            CA 90001
          </p>
        </div>

        <div class="lc-col">
          <h6 class="lc-eyebrow" style="margin-bottom:14px;">Contacts</h6>
          <ul class="lc-hours">
            <li>
              <span class="lc-hours-day">lawcriptionofficial@gmail.com </span>
              <span class="lc-hours-time"></span>
            </li>
            <li>
              <span class="lc-hours-day">(213) 555-123-3456</span>
              <span class="lc-hours-time"></span>
            </li>
          </ul>
          
        </div>

        <div class="lc-col">
          <h6 class="lc-eyebrow" style="margin-bottom:14px;">Opening Hours</h6>
          <ul class="lc-hours">
            <li>
              <span class="lc-hours-day">Weekdays</span>
              <span class="lc-hours-time">10:00am&nbsp;-&nbsp;9:00pm</span>
            </li>
            <li>
              <span class="lc-hours-day">Weekends</span>
              <span class="lc-hours-time">9:00am&nbsp;-&nbsp;10:00pm</span>
            </li>
          </ul>
        </div>

      </div>

    </div>


    {{-- ══════════════════════════════════════════
       BOTTOM
    ══════════════════════════════════════════ --}}
    <div class="lc-bottom">

      <span class="lc-copy">
        &copy; Lawcription&trade; {{ date('Y') }}. All Rights Reserved.
      </span>

      <div class="lc-legal-links">
        <a href="{{ route('user.privacy') }}" class="lc-pill">Privacy Policy</a>
        <a href="{{ route('user.terms') }}" class="lc-pill">Terms &amp; Conditions</a>
        <a href="{{ route('user.about') }}" class="lc-pill">About Us</a>
      </div>

    </div>

    <div class="ss-go-top">
      <a class="smoothscroll" title="Back to Top" href="#top">↑</a>
      <span>Back To Top</span>
    </div>

  </div>

</footer>

<!-- JavaScript -->
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>