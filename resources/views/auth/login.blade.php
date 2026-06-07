<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Medical Portal</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .15);
        }

        .input-field {
            width: 100%;
            padding: 16px 18px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .08);
            border: 2px solid rgba(255, 255, 255, .08);
            transition: .3s;
        }

        .input-field:focus {
            outline: none;
            border-color: #22d3ee;
            box-shadow: 0 0 20px rgba(34, 211, 238, .25);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-cyan-950 overflow-x-hidden">

    <!-- Background Effects -->
    <div class="fixed top-0 left-0 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl floating"></div>

    <div class="fixed bottom-0 right-0 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl floating"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-md">

            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="p-10 text-center">

                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-r from-cyan-400 to-blue-600 flex items-center justify-center shadow-2xl">

                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v6h6a1 1 0 110 2h-6v6a1 1 0 11-2 0v-6H3a1 1 0 110-2h6V3a1 1 0 011-1z" />
                        </svg>

                    </div>

                    <h1 class="text-4xl font-bold text-white mt-6">
                        Welcome Back
                    </h1>

                    <p class="text-gray-300 mt-3">
                        Sign in securely with your mobile number
                    </p>

                </div>

                <!-- Form -->
                <form id="loginForm" method="POST" action="{{ route('send.otp') }}" class="px-8 pb-10">

                    @csrf

                    <div>

                        <label class="block text-gray-300 text-sm font-semibold mb-3">
                            Mobile Number
                        </label>

                        <div class="relative">

                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-400">
                                +91
                            </span>

                            <input type="text" id="mobile" name="mobile_number" maxlength="10" placeholder="9876543210" class="input-field pl-14 text-white">

                        </div>

                        <p id="mobileError" class="hidden text-red-400 text-sm mt-2">
                        </p>

                    </div>

                    <button id="submitBtn" type="submit" class="w-full mt-8 py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold text-lg shadow-xl hover:scale-[1.02] transition-all">

                        Send OTP →

                    </button>

                    <div class="mt-6 text-center">

                        <p class="text-gray-400 text-sm">
                            Secure login powered by OTP verification
                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>

</html>


<script>
    const form = document.getElementById('loginForm');
    const mobile = document.getElementById('mobile');
    const error = document.getElementById('mobileError');

    mobile.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '');
    });

    form.addEventListener('submit', function(e) {

        const mobileNumber = mobile.value.trim();

        if (mobileNumber.length !== 10) {

            e.preventDefault();

            error.innerText = 'Please enter a valid 10-digit mobile number';
            error.classList.remove('hidden');

            mobile.focus();

            return;
        }

        error.classList.add('hidden');

        const btn = document.getElementById('submitBtn');

        btn.disabled = true;

        btn.innerHTML = `
        <svg class="animate-spin h-5 w-5 inline-block mr-2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24">

            <circle class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4">
            </circle>

            <path class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v8z">
            </path>

        </svg>

        Sending OTP...
    `;
    });
</script>

</body>