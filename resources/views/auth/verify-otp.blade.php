<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Verify OTP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .otp-box {
            width: 60px;
            height: 65px;
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: white;
            background: rgba(255, 255, 255, 0.08);
            border: 2px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            outline: none;
            transition: .3s;
            backdrop-filter: blur(10px);
        }

        .otp-box:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 20px rgba(34, 211, 238, .4);
            transform: translateY(-2px);
        }
    </style>

</head>

<div class="min-h-screen bg-gradient-to-br from-indigo-950 via-purple-900 to-blue-900 relative overflow-hidden">

    <!-- Background Blobs -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-500/30 rounded-full blur-3xl"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="text-center p-8">

                    <div class="mx-auto w-20 h-20 rounded-full bg-gradient-to-r from-purple-500 to-cyan-500 flex items-center justify-center shadow-lg">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2h-1V7a5 5 0 00-10 0v0H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                    </div>

                    <h2 class="text-4xl font-bold text-white mt-6">
                        Verify OTP
                    </h2>

                    <p class="text-gray-300 mt-3 text-sm">
                        We've sent a verification code to
                    </p>

                    <p class="text-cyan-300 font-semibold mt-1">
                        {{ session('login_mobile') }}
                    </p>

                </div>

                <!-- Form -->
                <div class="px-8 pb-8">

                    @if(session('error'))
                    <div class="mb-5 bg-red-500/20 border border-red-500/30 text-red-200 p-4 rounded-xl">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verify.otp') }}">

                        @csrf

                        <!-- Hidden OTP -->
                        <input type="hidden" name="otp" id="otp">

                        <!-- OTP Boxes -->
                        <div class="flex justify-center gap-3">

                            <input type="text" maxlength="1" class="otp-box">
                            <input type="text" maxlength="1" class="otp-box">
                            <input type="text" maxlength="1" class="otp-box">
                            <input type="text" maxlength="1" class="otp-box">
                            <input type="text" maxlength="1" class="otp-box">
                            <input type="text" maxlength="1" class="otp-box">

                        </div>

                        <button type="submit" class="w-full mt-8 py-4 rounded-2xl bg-gradient-to-r from-purple-600 to-cyan-500 text-white font-bold text-lg hover:scale-105 transition-all duration-300 shadow-xl">

                            Verify & Continue

                        </button>

                        <div class="text-center mt-6">

                            <button type="button" class="text-cyan-300 hover:text-cyan-200 transition">

                                Resend OTP

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</html>

<script>
    const inputs = document.querySelectorAll('.otp-box');
    const otpField = document.getElementById('otp');

    inputs.forEach((input, index) => {

        input.addEventListener('input', function() {

            this.value = this.value.replace(/[^0-9]/g, '');

            if (this.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }

            updateOTP();
        });

        input.addEventListener('keydown', function(e) {

            if (e.key === 'Backspace' && !this.value && index > 0) {
                inputs[index - 1].focus();
            }

        });

    });

    function updateOTP() {

        let otp = '';

        inputs.forEach(input => {
            otp += input.value;
        });

        otpField.value = otp;
    }
</script>