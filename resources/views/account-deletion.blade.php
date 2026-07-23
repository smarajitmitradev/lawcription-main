<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Your Account - Lawcription</title>

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23b91c1c' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16'/%3E%3C/svg%3E">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', -apple-system, sans-serif; }
        html, body { height: 100%; }

        @keyframes gradientMove {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animated-gradient {
            background: linear-gradient(120deg, #4c1d95, #1e1b4b, #7f1d1d, #b91c1c, #6d28d9, #0f172a, #991b1b);
            background-size: 400% 400%;
            animation: gradientMove 14s ease infinite;
        }

        @keyframes floatBlob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50%      { transform: translate(30px, -20px) scale(1.1); }
        }
        .blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(70px);
            opacity: 0.4;
            animation: floatBlob 9s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glow-border {
            background: linear-gradient(130deg, #f43f5e, #f59e0b, #a855f7, #6366f1, #f43f5e);
            background-size: 300% 300%;
            animation: borderGlow 6s ease infinite;
        }

        .glass-card { background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    width: 500px;
    max-width: 90%;
    height: 600px;
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    border-radius: 12px; }

    

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1); }

        input:focus, select:focus, textarea:focus { box-shadow: 0 0 0 4px rgba(185, 28, 28, 0.1); }

        .btn-delete {
            background: linear-gradient(135deg, #dc2626, #991b1b);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .btn-delete:hover {
            background: linear-gradient(135deg, #b91c1c, #7f1d1d);
            transform: translateY(-1px);
            box-shadow: 0 12px 24px -6px rgba(185, 28, 28, 0.5);
        }
        .btn-delete:active { transform: translateY(0); }

        .otp-box {
            width: 2.75rem; height: 3.25rem;
            text-align: center; font-size: 1.35rem; font-weight: 700;
            letter-spacing: 0;
        }
        @media (min-width: 640px) {
            .otp-box { width: 3.25rem; height: 3.75rem; font-size: 1.5rem; }
        }

        @media (max-height: 760px) {
            .fit-mb { margin-bottom: 0.9rem !important; }
            .fit-gap { gap: 0.65rem !important; }
        }
    </style>
</head>
<body class="animated-gradient h-full relative overflow-hidden">

    <div class="blob w-72 h-72 bg-fuchsia-500 top-[-8%] left-[-8%]"></div>
    <div class="blob w-72 h-72 bg-indigo-500 bottom-[-10%] right-[-8%]" style="animation-delay: -3s;"></div>
    <div class="blob w-56 h-56 bg-amber-400 top-[40%] right-[10%]" style="animation-delay: -6s;"></div>

    <div class="relative z-10 h-full flex items-center justify-center px-3 sm:px-4 py-3 sm:py-4">
        <div class="w-full max-w-2xl">
            <div class="">
                <div class="glass-card fade-up rounded-[calc(2rem-2px)] p-5 sm:p-8 md:p-10">

                    {{-- ================= HEADER ================= --}}
                    <div class="flex items-center gap-3 fit-mb mb-5">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 via-rose-600 to-red-700 flex items-center justify-center shrink-0 shadow-lg shadow-red-600/30">
                            @if (($step ?? 'request') === 'otp')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h1 class="text-lg sm:text-2xl font-extrabold text-gray-900 tracking-tight leading-tight">
                                {{ ($step ?? 'request') === 'otp' ? 'Verify Your Number' : 'Delete Your Account' }}
                            </h1>
                            <p class="text-xs sm:text-sm text-gray-400 font-semibold tracking-wide">LAWCRIPTION</p>
                        </div>
                        <span class="hidden sm:inline-flex items-center gap-1.5 text-[11px] font-bold text-red-700 bg-red-50 border border-red-100 px-3 py-1.5 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> IRREVERSIBLE
                        </span>
                    </div>

                    {{-- ================= ALERTS ================= --}}
                    @if (session('success'))
                        <div class="fit-mb mb-4 flex items-start gap-2.5 bg-green-50 border border-green-200 text-green-800 text-sm rounded-xl px-4 py-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="fit-mb mb-4 bg-red-50 border border-red-200 text-red-800 text-sm rounded-xl px-4 py-3 space-y-1.5">
                            @foreach ($errors->all() as $error)
                                <div class="flex items-start gap-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                    <span class="font-medium">{{ $error }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (($step ?? 'request') === 'otp')

                        {{-- ================= STEP 2: OTP SCREEN ================= --}}
                        <div class="fit-mb mb-5 flex items-start gap-2.5 bg-amber-50 border border-amber-200/80 rounded-xl px-4 py-3 text-xs sm:text-[13px] text-amber-800 leading-relaxed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>We've sent a 6-digit code to your mobile number. Enter it below to permanently delete your account. <span class="font-semibold">This action cannot be undone.</span></span>
                        </div>

                        <form method="POST" action="{{ route('account-deletion.otp.verify') }}" class="space-y-5 fit-gap" id="otpForm">
                            @csrf

                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase tracking-wide mb-2.5 text-center">Enter OTP</label>
                                <div class="flex items-center justify-center gap-2 sm:gap-3" id="otpBoxes">
                                    @for ($i = 0; $i < 6; $i++)
                                        <input type="text" inputmode="numeric" maxlength="1"
                                            class="otp-box border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:border-red-400 transition"
                                            oninput="
                                                this.value = this.value.replace(/[^0-9]/g, '');
                                                if (this.value && this.nextElementSibling) { this.nextElementSibling.focus(); }
                                                document.getElementById('otp').value = Array.from(document.querySelectorAll('.otp-box')).map(b => b.value).join('');
                                            "
                                            onkeydown="
                                                if (event.key === 'Backspace' && !this.value && this.previousElementSibling) { this.previousElementSibling.focus(); }
                                            "
                                            onpaste="
                                                event.preventDefault();
                                                const digits = (event.clipboardData.getData('text').match(/[0-9]/g) || []).slice(0, 6);
                                                document.querySelectorAll('.otp-box').forEach((b, idx) => b.value = digits[idx] || '');
                                                document.getElementById('otp').value = digits.join('');
                                                (document.querySelectorAll('.otp-box')[Math.min(digits.length, 5)] || this).focus();
                                            ">
                                    @endfor
                                </div>
                                <input type="hidden" name="otp" id="otp" required>
                            </div>

                            <button type="submit"
                                onclick="return confirm('This will permanently delete your account. Continue?');"
                                class="btn-delete w-full py-3 sm:py-3.5 rounded-xl font-bold text-white text-sm tracking-wide">
                                Verify &amp; Delete My Account
                            </button>
                        </form>

                        <form method="GET" action="{{ route('account-deletion.show') }}" class="mt-3">
                            <button type="submit" class="w-full text-center text-xs font-semibold text-gray-400 hover:text-gray-600 transition py-1">
                                &larr; Use a different mobile number
                            </button>
                        </form>

                    @else

                        {{-- ================= STEP 1: REQUEST FORM ================= --}}
                        <div class="fit-mb mb-5 flex items-start gap-2.5 bg-amber-50 border border-amber-200/80 rounded-xl px-4 py-3 text-xs sm:text-[13px] text-amber-800 leading-relaxed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>We'll text a one-time code to your mobile number before anything is deleted. <span class="font-semibold">This action cannot be undone.</span></span>
                        </div>

                        <form method="POST" action="{{ route('account-deletion.destroy') }}" class="space-y-4 fit-gap">
                            @csrf

                            <div>
                                <label for="mobile" class="block text-xs font-bold text-gray-600 uppercase tracking-wide mb-1.5">Mobile number</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold text-gray-400">+91</span>
                                    <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}" required placeholder="9876543210"
                                        inputmode="numeric" pattern="[0-9]{10}" maxlength="10" autocomplete="tel"
                                        class="w-full pl-12 pr-4 py-2.5 sm:py-3 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-red-400 transition tracking-wide"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                </div>
                                <p class="text-[11px] text-gray-400 mt-1.5">Enter the 10-digit number linked to your account.</p>
                            </div>

                            <div>
                                <label for="delete_type" class="block text-xs font-bold text-gray-600 uppercase tracking-wide mb-1.5">Reason category</label>
                                <select name="delete_type" id="delete_type" required
                                    class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-xl text-sm text-gray-900 bg-white focus:outline-none focus:border-red-400 transition appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%239ca3af%22 stroke-width=%222%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 d=%22M19 9l-7 7-7-7%22/%3E%3C/svg%3E')] bg-no-repeat bg-[right_1rem_center] bg-[length:16px] pr-10">
                                    <option value="">Select a reason</option>
                                    <option value="not_useful" @selected(old('delete_type') === 'not_useful')>Not finding it useful</option>
                                    <option value="privacy_concerns" @selected(old('delete_type') === 'privacy_concerns')>Privacy concerns</option>
                                    <option value="too_expensive" @selected(old('delete_type') === 'too_expensive')>Too expensive</option>
                                    <option value="switching_service" @selected(old('delete_type') === 'switching_service')>Switching to another service</option>
                                    <option value="other" @selected(old('delete_type') === 'other')>Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="delete_reason" class="block text-xs font-bold text-gray-600 uppercase tracking-wide mb-1.5">Tell us more <span class="text-gray-400 font-medium normal-case">(min 10 characters)</span></label>
                                <textarea name="delete_reason" id="delete_reason" rows="2" required placeholder="Help us understand why you're leaving..."
                                    class="w-full px-4 py-2.5 sm:py-3 border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 resize-none focus:outline-none focus:border-red-400 transition">{{ old('delete_reason') }}</textarea>
                            </div>

                            <button type="submit"
                                class="btn-delete w-full mt-1 py-3 sm:py-3.5 rounded-xl font-bold text-white text-sm tracking-wide">
                                Continue &amp; Send OTP
                            </button>
                        </form>

                    @endif

                    <p class="text-center text-xs text-gray-400 mt-5 pt-4 border-t border-gray-100">
                        Need help instead? <a href="mailto:support@lawcription.in" class="text-red-600 hover:text-red-700 hover:underline font-semibold">Contact support</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>