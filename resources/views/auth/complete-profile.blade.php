<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Complete Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .glass-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .15);
        }

        .form-input {
            width: 100%;
            padding: 16px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .08);
            border: 2px solid rgba(255, 255, 255, .08);
            color: white;
            transition: .3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #22d3ee;
            box-shadow: 0 0 20px rgba(34, 211, 238, .25);
            transform: translateY(-2px);
        }

        .form-label {
            color: #d1d5db;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        select option {
            color: black;
        }

        .animate-float {
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

<body class="min-h-screen bg-gradient-to-br from-indigo-950 via-slate-900 to-cyan-950 overflow-x-hidden overflow-y-auto">

    <!-- Background -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-5">

        <div class="w-full max-w-3xl">

            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="p-10 text-center">

                    <div class="w-28 h-28 rounded-full mx-auto bg-gradient-to-r from-cyan-400 to-blue-600 flex items-center justify-center shadow-2xl">

                        <svg class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a5 5 0 100 10 5 5 0 000-10zM2 18a8 8 0 1116 0H2z" />
                        </svg>

                    </div>

                    <div class="mt-6 inline-flex items-center px-4 py-2 rounded-full bg-cyan-500/20 border border-cyan-400/20">

                        <span class="text-cyan-300 text-sm font-semibold">
                            Step 2 of 2
                        </span>

                    </div>

                    <h1 class="text-4xl font-bold text-white mt-5">
                        Complete Your Profile
                    </h1>

                    <p class="text-gray-400 mt-3">
                        Tell us a little about yourself to personalize your experience.
                    </p>

                </div>

                <!-- Form -->
                <form id="profileForm" method="POST" action="{{ route('save.profile') }}" class="px-8 pb-10">

                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-input" placeholder="Enter first name">
                        </div>

                        <div>
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-input" placeholder="Enter last name">
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="form-label">Email Address</label>

                        <input type="email" name="email" value="{{ $user->email }}" class="form-input" placeholder="Enter email address">

                    </div>

                    <div class="mt-6">

                        <label class="form-label">Mobile Number</label>

                        <input type="text" readonly value="{{ $user->mobile_number }}" class="form-input opacity-70 cursor-not-allowed">

                    </div>

                    <div class="mt-6">

                        <label class="form-label">Professional Role</label>

                        <select name="user_type" class="form-input">

                            <option value="">Choose your role</option>
                            <option value="doctor">Doctor</option>
                            <option value="nurse">Nurse</option>
                            <option value="pharmacist">Pharmacist</option>
                            <option value="lab_technician">Lab Technician</option>
                            <option value="medical_student">Medical Student</option>
                            <option value="healthcare_worker">Healthcare Worker</option>
                            <option value="hospital_admin">Hospital Admin</option>
                            <option value="clinic_owner">Clinic Owner</option>
                            <option value="other">Other</option>

                        </select>

                    </div>

                    <button id="submitBtn" type="submit" class="w-full mt-8 py-5 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold text-lg shadow-xl hover:scale-[1.02] transition-all">

                        Save Profile & Continue →

                    </button>

                </form>

            </div>

        </div>

    </div>

</html>


<script>
    document.getElementById('profileForm').addEventListener('submit', function() {

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
                stroke-width="4"></circle>

            <path class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v8z"></path>

        </svg>

        Saving Profile...
    `;
    });
</script>