@extends('frontend.layout.master')

@section('title', 'Lawcription – Gallery')

@section('content')

<style>
    .box-fnt-size {
        font-size: 24px;
        font-family: serif;
    }

    body {
        padding-top: 0px !important ;
        /* Adjust according to header height */
    }
</style>

<div class="bg-[#0d0f14] text-white overflow-hidden">

    <!-- HERO SECTION -->
    <section class="relative py-32 px-6 overflow-hidden">

        <!-- Background Orbs -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-500/20 blur-[140px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 blur-[140px] rounded-full"></div>

        <div class="relative max-w-7xl mx-auto text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-cyan-400/20 bg-cyan-500/10 text-cyan-400 text-xs tracking-widest uppercase font-semibold">
                Contact Lawcription
            </span>

            <h1 class="mt-8 text-5xl md:text-7xl font-black leading-tight">
                Let's Connect &
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-purple-400 to-pink-400">
                    Start The Conversation
                </span>
            </h1>

            <p class="max-w-3xl mx-auto mt-8 text-lg text-gray-400 leading-relaxed">
                Whether you're a doctor, legal professional, institution, or healthcare organization,
                we're here to help. Reach out to our team and we'll get back to you shortly.
            </p>

        </div>
    </section>


    <!-- CONTACT CARDS -->
    <section class="px-6 pb-24 mt-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Call Us -->
            <div class="group bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-cyan-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-xl mb-5">
                    <i class="fas fa-phone"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Call Us
                </h3>

                <p class="text-gray-400 mb-4 text-sm">
                    Speak directly with our support team.
                </p>

                <a href="tel:+919999999999" class="text-cyan-400 font-semibold hover:text-cyan-300 box-fnt-size">
                    +91 99999 99999
                </a>
            </div>

            <!-- Email -->
            <div class="group bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-purple-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 text-xl mb-5">
                    <i class="fas fa-envelope"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Email Us
                </h3>

                <p class="text-gray-400 mb-4 text-sm">
                    Send us your questions anytime.
                </p>

                <a href="mailto:info@lawcription.com" class="text-purple-400 font-semibold hover:text-purple-300 break-all box-fnt-size">
                    info@lawcription.com
                </a>
            </div>

            <!-- Office -->
            <div class="group bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-pink-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-pink-500/10 flex items-center justify-center text-pink-400 text-xl mb-5">
                    <i class="fas fa-location-dot"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Visit Office
                </h3>

                <p class="text-gray-400 mb-4 text-sm">
                    Meet our team in person.
                </p>

                <span class="text-pink-400 font-semibold box-fnt-size">
                    New Delhi, India
                </span>
            </div>

            <!-- Dr Sujan -->
            <div class="group bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-amber-400/30 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-amber-500/10 flex items-center justify-center text-amber-400 text-xl mb-5">
                    <i class="fas fa-user-doctor"></i>
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Dr. Sujan Debnath
                </h3>

                <p class="text-gray-400 mb-4 text-sm">
                    Founder & Medical Director
                </p>

                <a href="mailto:sujan@lawcription.com" class="text-amber-400 font-semibold hover:text-amber-300 break-all box-fnt-size">
                    sujan@lawcription.com
                </a>
            </div>

        </div>
    </section>


    <!-- CONTACT FORM -->
    <section class="px-6 pb-24">

        <div class="max-w-7xl mx-auto">

            <div class="grid lg:grid-cols-2 gap-12 bg-white/[0.03] border border-white/10 rounded-[40px] overflow-hidden backdrop-blur-xl">

                <!-- LEFT -->
                <div class="p-10 lg:p-16">

                    <span class="inline-flex px-4 py-2 rounded-full bg-cyan-500/10 text-cyan-400 text-xs uppercase tracking-widest">
                        Get In Touch
                    </span>

                    <h2 class="text-4xl font-black mt-6 mb-6">
                        We'd Love To Hear From You
                    </h2>

                    <p class="text-gray-400 leading-relaxed mb-10">
                        Have questions about medico-legal guidance, subscriptions,
                        partnerships, or educational resources? Send us a message and our team
                        will respond as soon as possible.
                    </p>

                    <div class="space-y-8">

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">
                                    Business Hours
                                </h4>
                                <p class="text-gray-400">
                                    Monday – Saturday
                                    <br>
                                    9:00 AM – 6:00 PM
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">
                                    Dedicated Support
                                </h4>
                                <p class="text-gray-400">
                                    Fast responses from our expert team.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="p-10 lg:p-16 bg-white/[0.02]">

                    <form action="javascript:void(0);" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm mb-2 text-gray-300">
                                    Full Name
                                </label>

                                <input type="text" name="name" style="border:1px solid #555; height:50px" class="  w-full h-14 px-5 rounded-2xl bg-black/30 border border-white/10 focus:border-cyan-400 focus:outline-none transition">
                            </div>

                            <div>
                                <label class="block text-sm mb-2 text-gray-300">
                                    Phone
                                </label>

                                <input type="text" name="phone" style="border:1px solid #555; height:50px" class="w-full h-14 px-5 rounded-2xl bg-black/30 border border-white/10 focus:border-cyan-400 focus:outline-none transition">
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm mb-2 text-gray-300">
                                Email Address
                            </label>

                            <input type="email" name="email" style="border:1px solid #555; height:50px" class="w-full h-14 px-5 rounded-2xl bg-black/30 border border-white/10 focus:border-cyan-400 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm mb-2 text-gray-300">
                                Subject
                            </label>

                            <input type="text" name="subject" style="border:1px solid #555; height:50px" class="w-full h-14 px-5 rounded-2xl bg-black/30 border border-white/10 focus:border-cyan-400 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm mb-2 text-gray-300">
                                Message
                            </label>

                            <textarea rows="6" name="message" style="border:1px solid #555; min-height:150px" class="w-full p-5 rounded-2xl bg-black/30 border border-white/10 focus:border-cyan-400 focus:outline-none transition"></textarea>
                        </div>

                        <button type="submit" class="w-full h-14 rounded-2xl font-semibold text-black bg-gradient-to-r from-cyan-400 to-teal-400 hover:scale-[1.02] transition duration-300">
                            Send Message →
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>


    <!-- MAP SECTION -->
    <section class="px-6 pb-24">

        <div class="max-w-7xl mx-auto">

            <div class="rounded-[40px] overflow-hidden border border-white/10 shadow-2xl">

                <iframe src="https://www.google.com/maps/embed?pb=" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

            </div>

        </div>

    </section>

</div>

@endsection