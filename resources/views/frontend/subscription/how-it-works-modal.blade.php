{{-- resources/views/subscription/how-it-works-modal.blade.php --}}
{{-- Rendered as a partial and injected into #subscriptionModalRoot via fetch --}}

<style>
    /* ===== Lawcription :: How It Works — Flowchart Modal ===== */
    .lc-modal-overlay {
        background: rgba(6, 5, 4, 0.82);
        backdrop-filter: blur(6px);
    }

    .lc-modal-panel {
        background:
            radial-gradient(circle at 15% 0%, rgba(201, 168, 76, 0.10), transparent 45%),
            radial-gradient(circle at 85% 100%, rgba(111, 168, 130, 0.10), transparent 45%),
            #100f0d;
        border: 1px solid rgba(201, 168, 76, 0.18);
        scrollbar-width: thin;
        scrollbar-color: #c9a84c33 transparent;
    }

    .lc-modal-panel::-webkit-scrollbar { width: 6px; }
    .lc-modal-panel::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #c9a84c, #6fa882);
        border-radius: 999px;
    }

    .lc-eyebrow {
        letter-spacing: 3px;
        background: linear-gradient(90deg, rgba(201,168,76,0.16), rgba(111,168,130,0.10));
        border: 1px solid rgba(201, 168, 76, 0.35);
    }

    .lc-heading-gradient {
        background: linear-gradient(90deg, #f5f0e1 0%, #e9d9a6 45%, #c9a84c 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    /* ---- Stage wrapper ---- */
    .lc-stage {
        position: relative;
        border-radius: 20px;
        border: 1px solid var(--stage-border, rgba(255,255,255,0.08));
        background: linear-gradient(160deg, var(--stage-glow, rgba(255,255,255,0.02)), rgba(255,255,255,0.01));
        overflow: hidden;
    }
    .lc-stage::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: radial-gradient(circle at 0% 0%, var(--stage-glow, transparent), transparent 60%);
        opacity: .6;
    }

    .lc-stage-head {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .lc-stage-num {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 42px;
        width: 42px;
        border-radius: 999px;
        font-weight: 800;
        font-size: 15px;
        color: #0a0908;
        background: var(--stage-accent, #c9a84c);
        box-shadow: 0 0 0 4px #100f0d, 0 0 20px var(--stage-accent-glow, rgba(201,168,76,.45));
        flex-shrink: 0;
    }

    .lc-stage-title {
        font-size: 15px;
        font-weight: 700;
        color: #f5f0e1;
        letter-spacing: .3px;
    }

    .lc-stage-sub {
        font-size: 11px;
        color: #9a9384;
    }

    /* connector arrow BETWEEN stages */
    .lc-stage-connector {
        display: flex;
        justify-content: center;
        padding: 4px 0;
    }
    .lc-stage-connector .lc-chevron {
        width: 30px;
        height: 30px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, #c9a84c, #6fa882);
        box-shadow: 0 0 14px rgba(201,168,76,.35);
    }
    .lc-stage-connector svg { width: 14px; height: 14px; }

    /* sub-step chip inside a stage */
    .lc-substep {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.07);
        transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
    }
    .lc-substep:hover {
        transform: translateY(-3px);
        border-color: var(--stage-accent, #c9a84c);
        box-shadow: 0 10px 24px -10px var(--stage-accent-glow, rgba(201,168,76,.4));
    }

    .lc-shot-frame {
        background: #05070a;
        border: 1px solid rgba(255,255,255,0.08);
    }
    .lc-shot-frame img { transition: transform .4s ease; display:block; }
    .lc-substep:hover .lc-shot-frame img { transform: scale(1.07); }

    .lc-substep-arrow {
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--stage-accent, #c9a84c);
        opacity: .6;
    }

    .lc-mini-badge {
        font-size: 10px;
        letter-spacing: 1px;
        font-weight: 700;
        color: var(--stage-accent, #c9a84c);
    }

    .lc-cta-btn {
        background: linear-gradient(90deg, #c9a84c, #6fa882);
        color: #0a0908;
    }
    .lc-cta-btn:hover { filter: brightness(1.08); }

    .lc-note-strip {
        background: linear-gradient(90deg, rgba(201,168,76,0.08), rgba(111,168,130,0.06));
        border: 1px dashed rgba(201, 168, 76, 0.35);
    }

    /* ---- Clickable thumbnail + zoom hint ---- */
    .lc-shot-frame {
        position: relative;
        cursor: zoom-in;
    }
    .lc-zoom-hint {
        position: absolute;
        top: 6px;
        right: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 26px;
        width: 26px;
        border-radius: 999px;
        background: rgba(16, 15, 13, 0.65);
        border: 1px solid rgba(255,255,255,0.18);
        opacity: 0;
        transform: translateY(-2px);
        transition: opacity .2s ease, transform .2s ease;
        pointer-events: none;
    }
    .lc-shot-frame:hover .lc-zoom-hint {
        opacity: 1;
        transform: translateY(0);
    }
    .lc-zoom-hint svg { height: 13px; width: 13px; color: #f5f0e1; }

    /* ---- Fullscreen lightbox ---- */
    .lc-lightbox {
        position: fixed;
        inset: 0;
        z-index: 60;
        background: rgba(4, 3, 2, 0.92);
        backdrop-filter: blur(8px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 24px;
        opacity: 0;
        transition: opacity .2s ease;
    }
    .lc-lightbox.is-open {
        display: flex;
        opacity: 1;
    }
    .lc-lightbox-img {
        max-height: 90vh;
        max-width: min(92vw, 480px);
        border-radius: 16px;
        border: 1px solid rgba(201, 168, 76, 0.35);
        box-shadow: 0 20px 60px -10px rgba(0,0,0,0.6), 0 0 40px rgba(201,168,76,0.15);
        transform: scale(.96);
        transition: transform .2s ease;
    }
    .lc-lightbox.is-open .lc-lightbox-img {
        transform: scale(1);
    }
    .lc-lightbox-caption {
        position: absolute;
        bottom: 28px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 12px;
        color: #c9c4b4;
        letter-spacing: .5px;
    }
    .lc-lightbox-close {
        position: absolute;
        top: 20px;
        right: 20px;
        height: 40px;
        width: 40px;
        border-radius: 999px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f5f0e1;
        transition: background .2s ease, transform .2s ease;
    }
    .lc-lightbox-close:hover {
        background: rgba(255,255,255,0.14);
        transform: rotate(90deg);
    }
</style>

<div id="subscriptionModalOverlay" class="lc-modal-overlay fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="lc-modal-panel relative w-full max-w-3xl max-h-[92vh] overflow-y-auto rounded-2xl shadow-2xl">

        {{-- Close button --}}
        <button id="subscriptionModalClose" type="button" aria-label="Close" class="absolute top-4 right-4 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-white/5 text-[#e8e2d0] hover:bg-white/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Header --}}
        <div class="px-6 pt-8 pb-6 sm:px-10 sm:pt-10">
            <span class="lc-eyebrow inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase text-[#c9a84c]">
                How it works — the full flow
            </span>
            <h2 class="lc-heading-gradient mt-3 font-serif text-2xl sm:text-3xl font-bold">
                Login → Verify → Choose Plan → Pay → Unlocked
            </h2>
            <p class="mt-2 text-sm text-[#9a9384] leading-relaxed max-w-xl">
                Here's exactly what happens on screen, in order — from signing in, to verifying your number,
                choosing a plan, completing payment, and getting instant access.
            </p>
        </div>

        {{-- ===== FLOWCHART ===== --}}
        <div class="px-6 sm:px-10 pb-4 space-y-0">

            {{-- ============ STAGE 1 — LOGIN ============ --}}
            <div class="lc-stage p-5" style="--stage-accent:#7aa7ff; --stage-accent-glow:rgba(122,167,255,.45); --stage-border:rgba(122,167,255,.25); --stage-glow:rgba(122,167,255,.08);">
                <div class="lc-stage-head mb-4">
                    <span class="lc-stage-num">1</span>
                    <div>
                        <p class="lc-stage-title">Login</p>
                        <p class="lc-stage-sub">Sign in securely to start your subscription journey</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181155_Chrome.png') }}" alt="Unlock premium access, sign in prompt" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Sign-in prompt</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Tap "Sign In" whenever premium content needs unlocking.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181205_Chrome.png') }}" alt="Enter mobile number" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Enter mobile number</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">No passwords — just enter your number and request an OTP.</p>
                    </div>
                </div>
            </div>

            <div class="lc-stage-connector"><span class="lc-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="#0a0908" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6"/></svg></span></div>

            {{-- ============ STAGE 2 — OTP VERIFY ============ --}}
            <div class="lc-stage p-5" style="--stage-accent:#c084fc; --stage-accent-glow:rgba(192,132,252,.45); --stage-border:rgba(192,132,252,.25); --stage-glow:rgba(192,132,252,.08);">
                <div class="lc-stage-head mb-4">
                    <span class="lc-stage-num">2</span>
                    <div>
                        <p class="lc-stage-title">OTP Verify</p>
                        <p class="lc-stage-sub">A 6-digit code confirms it's really you</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181217_Chrome.png') }}" alt="Verify OTP screen" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Verify OTP</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Enter the 6-digit code sent to your phone and continue.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181305_Chrome.png') }}" alt="Login successful" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Login successful</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">You're verified and signed in — on to choosing a plan.</p>
                    </div>
                </div>
            </div>

            <div class="lc-stage-connector"><span class="lc-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="#0a0908" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6"/></svg></span></div>

            {{-- ============ STAGE 3 — PLAN SELECTION ============ --}}
            <div class="lc-stage p-5" style="--stage-accent:#c9a84c; --stage-accent-glow:rgba(201,168,76,.45); --stage-border:rgba(201,168,76,.3); --stage-glow:rgba(201,168,76,.10);">
                <div class="lc-stage-head mb-4">
                    <span class="lc-stage-num">3</span>
                    <div>
                        <p class="lc-stage-title">Plan Selection</p>
                        <p class="lc-stage-sub">Compare tiers and pick what fits your needs</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181148_Chrome.png') }}" alt="Basic plan pricing card" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Browse plans</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">See what's included — full articles, daily updates, case laws, tools.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181329_Chrome.png') }}" alt="Confirm selected plan" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Confirm your pick</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Review the price and billing cycle, then tap "Start Reading" to proceed to payment.</p>
                    </div>
                </div>
            </div>

            <div class="lc-stage-connector"><span class="lc-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="#0a0908" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6"/></svg></span></div>

            {{-- ============ STAGE 4 — PAYMENT PROCESS ============ --}}
            <div class="lc-stage p-5" style="--stage-accent:#6fa882; --stage-accent-glow:rgba(111,168,130,.45); --stage-border:rgba(111,168,130,.3); --stage-glow:rgba(111,168,130,.10);">
                <div class="lc-stage-head mb-4">
                    <span class="lc-stage-num">4</span>
                    <div>
                        <p class="lc-stage-title">Payment Process</p>
                        <p class="lc-stage-sub">Secure checkout, powered by Razorpay UPI Autopay</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2165.PNG') }}" alt="Secure checkout begins" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4a · Checkout opens</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Razorpay's secure sheet loads instantly.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2170.PNG') }}" alt="Choose a payment method" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4b · Pick method</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">UPI, Cards, or Net Banking eMandate.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2167.PNG') }}" alt="Review autopay details" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4c · Review autopay</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Amount, frequency &amp; validity shown clearly.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2168.PNG') }}" alt="Choose bank account" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4d · Choose account</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Select the UPI-linked bank account to pay from.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2171.PNG') }}" alt="Autopay mandate confirmation" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4e · Confirm mandate</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Final review of the recurring mandate details.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-40 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2172.PNG') }}" alt="Approve and set up autopay" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">4f · Approve &amp; pay</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">Tap "Set up Autopay" to authorize the payment.</p>
                    </div>
                </div>
            </div>

            <div class="lc-stage-connector"><span class="lc-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="#0a0908" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0l-6-6m6 6l6-6"/></svg></span></div>

            {{-- ============ STAGE 5 — SUCCESS ============ --}}
            <div class="lc-stage p-5" style="--stage-accent:#f0c94a; --stage-accent-glow:rgba(240,201,74,.5); --stage-border:rgba(240,201,74,.35); --stage-glow:rgba(240,201,74,.12);">
                <div class="lc-stage-head mb-4">
                    <span class="lc-stage-num">5</span>
                    <div>
                        <p class="lc-stage-title">Success</p>
                        <p class="lc-stage-sub">Instant activation, instant access</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/IMG_2174.PNG') }}" alt="Subscription activated success" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Subscription activated 🎉</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">You're confirmed — premium content is now unlocked.</p>
                    </div>
                    <div class="lc-substep rounded-xl p-3">
                        <div class="lc-shot-frame w-full h-44 rounded-lg overflow-hidden">
                            <img onclick="var lb=document.getElementById('lcLightbox');var im=document.getElementById('lcLightboxImg');var cp=document.getElementById('lcLightboxCaption');im.src=this.src;im.alt=this.alt;cp.textContent=this.alt;lb.classList.add('is-open');document.body.style.overflow='hidden';lb.focus();" src="{{ asset('frontend/flow/Screenshot_20260823-181343_Chrome.png') }}" alt="Already have an active plan" class="h-full w-full object-cover object-top">
                            <span class="lc-zoom-hint"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6M8 11h6"/></svg></span>
                        </div>
                        <p class="lc-mini-badge mt-2 uppercase">Already subscribed?</p>
                        <p class="text-xs text-[#c9c4b4] mt-1">We'll show your active plan and its renewal date — no double charges.</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Payment methods --}}
        <div class="px-6 sm:px-10 py-6 mt-6 border-t border-white/5">
            <p class="text-[11px] font-bold tracking-[2px] uppercase text-[#9a9384] mb-4">Available payment methods</p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                {{-- UPI --}}
                <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">📱</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">UPI Autopay</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Approve once in your UPI app. Fastest activation — usually instant.
                    </p>
                </div>

                {{-- Debit Card --}}
                <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">💳</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">Debit Card</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Enter your card once. Auto-renews securely each cycle.
                    </p>
                </div>

                {{-- eMandate --}}
                <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">🏦</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">Net Banking</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Authorize via your bank's portal. Activation may take up to 48 hrs.
                    </p>
                </div>

            </div>
        </div>

        {{-- Recurring Billing & Refund Details --}}
        <div class="px-6 sm:px-10 py-6 border-t border-white/5 space-y-6">

            <div>
                <p class="text-[11px] font-bold tracking-[2px] uppercase text-[#9a9384] mb-1">Subscription &amp; billing details</p>
                <p class="text-xs text-[#7d7768] leading-relaxed max-w-xl">
                    Here's exactly how your plan renews, when your bank account gets debited, and when your
                    portal access actually unlocks — for every billing cycle and every payment method.
                </p>
            </div>

            {{-- Recurring cycles --}}
            <div>
                <p class="lc-mini-badge text-[10px] uppercase mb-3" style="--stage-accent:#c9a84c;">How recurring billing works</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                        <p class="text-sm font-semibold text-[#f5f0e1]">Monthly Plan</p>
                        <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                            Auto-debits every 30 days from the date you subscribed. Your mandate stays active until
                            you cancel — each cycle renews automatically, no manual repayment needed.
                        </p>
                    </div>

                    <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                        <p class="text-sm font-semibold text-[#f5f0e1]">Half-Yearly Plan</p>
                        <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                            Auto-debits once every 6 months on your subscription anniversary date. One mandate
                            covers all renewals until cancelled — you're reminded before each debit.
                        </p>
                    </div>

                    <div class="lc-substep rounded-xl p-4" style="--stage-accent:#c9a84c;">
                        <p class="text-sm font-semibold text-[#f5f0e1]">Annual Plan</p>
                        <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                            Auto-debits once every 12 months. Best value, least frequent renewals — the mandate
                            silently renews access each year until you choose to cancel.
                        </p>
                    </div>

                </div>
                <p class="text-[11px] text-[#7d7768] mt-3 leading-relaxed">
                    In every case, the auto-debit is powered by the <span class="text-[#c9b98a]">Autopay mandate</span>
                    you approved during checkout — Razorpay triggers the charge automatically on your renewal date,
                    and your plan validity extends the moment it succeeds.
                </p>
            </div>

            {{-- Activation timing comparison --}}
            <div>
                <p class="lc-mini-badge text-[10px] uppercase mb-3" style="--stage-accent:#6fa882;">When your payment method unlocks access</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    <div class="lc-substep rounded-xl p-4" style="--stage-accent:#6fa882;">
                        <div class="flex items-center gap-2">
                            <span class="lc-tag lc-tag-success inline-block rounded-full px-2.5 py-1 font-bold uppercase">Instant</span>
                            <p class="text-sm font-semibold text-[#f5f0e1]">UPI &amp; Debit Card</p>
                        </div>
                        <p class="text-xs text-[#9a9384] mt-2 leading-relaxed">
                            Both the debit and your portal unlock happen the moment you approve payment — UPI and
                            Cards settle in real time, so there's nothing to wait for.
                        </p>
                    </div>

                    <div class="lc-substep rounded-xl p-4" style="--stage-accent:#7aa7ff;">
                        <div class="flex items-center gap-2">
                            <span class="lc-tag lc-tag-account inline-block rounded-full px-2.5 py-1 font-bold uppercase">3–4 working days</span>
                            <p class="text-sm font-semibold text-[#f5f0e1]">Net Banking (eMandate)</p>
                        </div>
                        <p class="text-xs text-[#9a9384] mt-2 leading-relaxed">
                            eMandate goes through your bank's NACH registration process, which banks take
                            3–4 working days to confirm — so both the actual debit and your portal access unlock
                            only once that confirmation comes back. This delay is on the banking network's side,
                            not ours.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Refund note --}}
            <div class="lc-note-strip rounded-xl px-4 py-3 flex items-start gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#c9a84c]/10 text-base shrink-0">↩️</div>
                <p class="text-xs text-[#c9b98a] leading-relaxed">
                    <span class="font-semibold">Payment failed but amount deducted?</span>
                    If a transaction fails after your account was debited, the amount is automatically reversed
                    and refunded to your original payment source within <span class="font-semibold">2–3 working days</span>
                    — no action needed on your part.
                </p>
            </div>

        </div>

        {{-- Footer CTA --}}
        <div class="px-6 sm:px-10 pb-8 pt-2">
            <button type="button" onclick="handleViewPlansClick()" class="lc-cta-btn w-full py-3.5 rounded-xl text-sm font-bold tracking-wide uppercase">
                View Plans
            </button>
        </div>

    </div>
</div>

{{-- ===== Fullscreen Lightbox (click any screenshot to view full size) ===== --}}
<div id="lcLightbox" class="lc-lightbox" tabindex="-1"
     onclick="this.classList.remove('is-open');document.body.style.overflow='';"
     onkeydown="if(event.key==='Escape'){this.classList.remove('is-open');document.body.style.overflow='';}">
    <button type="button" class="lc-lightbox-close"
            onclick="event.stopPropagation();document.getElementById('lcLightbox').classList.remove('is-open');document.body.style.overflow='';"
            aria-label="Close preview">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <img id="lcLightboxImg" src="" alt="" class="lc-lightbox-img" onclick="event.stopPropagation()">
    <p id="lcLightboxCaption" class="lc-lightbox-caption"></p>
</div>