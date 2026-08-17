{{-- resources/views/subscription/how-it-works-modal.blade.php --}}
{{-- Rendered as a partial and injected into #subscriptionModalRoot via fetch --}}

<div id="subscriptionModalOverlay" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
    <div class="relative w-full max-w-2xl max-h-[90vh] overflow-y-auto rounded-2xl border border-[#c9a84c]/20 bg-[#12110f] shadow-2xl">

        {{-- Close button --}}
        <button id="subscriptionModalClose" type="button" aria-label="Close" class="absolute top-4 right-4 flex h-9 w-9 items-center justify-center rounded-full bg-white/5 text-[#e8e2d0] hover:bg-white/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Header --}}
        <div class="px-6 pt-8 pb-4 sm:px-8 sm:pt-10">
            <span class="inline-block rounded-full bg-[#c9a84c]/10 px-3 py-1 text-[10px] font-bold tracking-[2px] uppercase text-[#c9a84c]">
                How it works
            </span>
            <h2 class="mt-3 font-serif text-2xl sm:text-3xl font-bold text-[#f5f0e1]">
                From login to unlocked access
            </h2>
            <p class="mt-2 text-sm text-[#9a9384] leading-relaxed">
                Here's exactly what happens when you subscribe, and every payment method we support.
            </p>
        </div>

        {{-- Steps --}}
        <div class="px-6 sm:px-8 py-2">
            <ol class="space-y-4">

                <li class="flex gap-4">
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#c9a84c]/10 border border-[#c9a84c]/25 text-xs font-bold text-[#c9a84c]">1</span>
                    <div>
                        <p class="text-sm font-semibold text-[#f5f0e1]">Log in or create your account</p>
                        <p class="text-xs text-[#9a9384] mt-0.5">Takes under a minute — email and password is all you need.</p>
                    </div>
                </li>

                <li class="flex gap-4">
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#c9a84c]/10 border border-[#c9a84c]/25 text-xs font-bold text-[#c9a84c]">2</span>
                    <div>
                        <p class="text-sm font-semibold text-[#f5f0e1]">Choose your plan</p>
                        <p class="text-xs text-[#9a9384] mt-0.5">1 Month, 6 Months, or 1 Year — pick what fits, upgrade anytime.</p>
                    </div>
                </li>

                <li class="flex gap-4">
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#c9a84c]/10 border border-[#c9a84c]/25 text-xs font-bold text-[#c9a84c]">3</span>
                    <div>
                        <p class="text-sm font-semibold text-[#f5f0e1]">Pick a payment method</p>
                        <p class="text-xs text-[#9a9384] mt-0.5">UPI, Debit Card, or Net Banking (eMandate) — see details below.</p>
                    </div>
                </li>

                <li class="flex gap-4">
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#c9a84c]/10 border border-[#c9a84c]/25 text-xs font-bold text-[#c9a84c]">4</span>
                    <div>
                        <p class="text-sm font-semibold text-[#f5f0e1]">Confirm and get instant access</p>
                        <p class="text-xs text-[#9a9384] mt-0.5">Your plan activates immediately — auto-renews so you're never interrupted.</p>
                    </div>
                </li>

            </ol>
        </div>

        {{-- Payment methods --}}
        <div class="px-6 sm:px-8 py-6 mt-2">
            <p class="text-[11px] font-bold tracking-[2px] uppercase text-[#9a9384] mb-4">Available payment methods</p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                {{-- UPI --}}
                <div class="rounded-xl border border-white/10 bg-white/[0.02] p-4">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">📱</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">UPI Autopay</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Approve once in your UPI app. Fastest activation — usually instant.
                    </p>
                </div>

                {{-- Debit Card --}}
                <div class="rounded-xl border border-white/10 bg-white/[0.02] p-4">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">💳</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">Debit Card</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Enter your card once. Auto-renews securely each cycle.
                    </p>
                </div>

                {{-- eMandate --}}
                <div class="rounded-xl border border-white/10 bg-white/[0.02] p-4">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#6fa882]/10 text-lg mb-3">🏦</div>
                    <p class="text-sm font-semibold text-[#f5f0e1]">Net Banking</p>
                    <p class="text-xs text-[#9a9384] mt-1 leading-relaxed">
                        Authorize via your bank's portal. Activation may take up to 48 hrs.
                    </p>
                </div>

            </div>
        </div>

        {{-- Footer CTA --}}
        <div class="px-6 sm:px-8 pb-8 pt-2">
            <button type="button" onclick="handleViewPlansClick()" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-[#c9a84c] to-[#6fa882] text-[#0a0908] text-sm font-bold tracking-wide uppercase">
                View Plans
            </button>
        </div>

    </div>
</div>

