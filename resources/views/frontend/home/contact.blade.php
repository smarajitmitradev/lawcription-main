@extends('frontend.layout.master')

@section('title', 'Lawcription™ – Gallery')
@section('bodyClass', 'page-contact')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400;1,600&family=DM+Sans:wght@300;400;500;600;700&display=swap');

    .contact-wrap {
        font-family: 'DM Sans', sans-serif;
    }

    .contact-wrap .serif {
        font-family: 'Playfair Display', serif;
    }

    .box-fnt-size {
        font-size: 24px;
        font-family: serif;
    }

    body {
        padding-top: 0px !important;
    }

    body.page-contact .lc-footer {
        --green: #3d6b4a !important;
        --green2: #2d5a3d !important;
        --greenlit: #6fa882 !important;
        --gold: #122dd1 !important;
        --gold2: #b8922e !important;
        --cream: #f2ead8 !important;
        --text: #ede8de !important;
        --bg: #0a0908 !important;
        --surface: #131211 !important;
        --surface2: #1a1917 !important;
        --border: rgba(242, 234, 216, 0.08) !important;
        --border2: rgba(201, 168, 76, 0.16) !important;
        --muted: #9a9488 !important;
        --muted2: #b3ab9c !important;
        background: var(--bg) !important;
        color: var(--muted2) !important;
        font-family: 'DM Sans', sans-serif !important;
        border-top: 1px solid var(--border) !important;
        position: relative !important;
        overflow: hidden !important;
        display: block !important;
        width: 100% !important;
    }

    All three keep contrast intact for the gold accents,
    cream headings,
    and muted body text already in the footer — no other overrides needed.
</style>

<div class="contact-wrap bg-[#0d0f14] text-white overflow-hidden">

    <!-- HERO SECTION -->
    <section class="relative py-32 px-6 overflow-hidden">

        <!-- Background Orbs -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-500/20 blur-[140px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/20 blur-[140px] rounded-full"></div>

        <div class="relative max-w-7xl mx-auto text-center">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-cyan-400/20 bg-cyan-500/10 text-cyan-400 text-xs tracking-widest uppercase font-semibold">
                Contact Lawcription™
            </span>

            <h1 class="serif mt-8 text-5xl md:text-7xl font-black leading-tight">
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
        <div class="max-w-7xl mx-auto text-center mb-14">
            <span class="inline-block rounded-full bg-white/5 border border-white/10 px-4 py-1.5 text-[11px] font-bold tracking-[3px] uppercase text-gray-400 mb-4">
                Get in Touch
            </span>
            <h2 class="serif text-3xl md:text-4xl font-bold text-white">
                Reach the right team, faster
            </h2>
            <p class="text-gray-400 text-sm md:text-base mt-3 max-w-xl mx-auto">
                Each inbox below is monitored by a dedicated team — pick the one that matches your query.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Content & Suggestions -->
            <div class="group relative bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-cyan-400/30 hover:bg-white/[0.05] transition-all duration-500">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-cyan-500/0 to-cyan-500/0 group-hover:from-cyan-500/[0.04] group-hover:to-transparent transition-all duration-500"></div>

                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-xl mb-5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-lightbulb"></i>
                    </div>

                    <h3 class="serif text-lg font-bold mb-2 text-white">
                        Content & Suggestions
                    </h3>

                    <p class="text-gray-400 mb-5 text-sm leading-relaxed">
                        Questions, topic requests, content suggestions or feedback.
                    </p>

                    <a href="mailto:lawcription@gmail.com" class="inline-flex items-center gap-2 text-cyan-400 font-semibold hover:text-cyan-300 break-all text-sm transition-colors">
                        <i class="fas fa-envelope text-xs"></i>
                        lawcription@gmail.com
                    </a>
                </div>
            </div>

            <!-- Subscription Support -->
            <div class="group relative bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-purple-400/30 hover:bg-white/[0.05] transition-all duration-500">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-purple-500/0 to-purple-500/0 group-hover:from-purple-500/[0.04] group-hover:to-transparent transition-all duration-500"></div>

                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 text-xl mb-5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-headset"></i>
                    </div>

                    <h3 class="serif text-lg font-bold mb-2 text-white">
                        Subscription Support
                    </h3>

                    <p class="text-gray-400 mb-5 text-sm leading-relaxed">
                        For subscription, payment, access or account-related assistance.
                    </p>

                    <a href="mailto:lawcriptionofficial@gmail.com" class="inline-flex items-center gap-2 text-purple-400 font-semibold hover:text-purple-300 break-all text-sm transition-colors">
                        <i class="fas fa-envelope text-xs"></i>
                        lawcriptionofficial@gmail.com
                    </a>
                </div>
            </div>

            <!-- Dr. Sujan Debnath — Founder & Director -->
            <div class="group relative bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-amber-400/30 hover:bg-white/[0.05] transition-all duration-500">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-amber-500/0 to-amber-500/0 group-hover:from-amber-500/[0.04] group-hover:to-transparent transition-all duration-500"></div>

                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-amber-500/10 flex items-center justify-center text-amber-400 text-xl mb-5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-user-doctor"></i>
                    </div>

                    <h3 class="serif text-lg font-bold mb-1 text-white">
                        Dr. Sujan Debnath
                    </h3>

                    <p class="text-amber-400/80 text-xs font-semibold tracking-wide uppercase mb-3">
                        MBBS, LLB &middot; Founder &amp; Director
                    </p>

                    <a href="mailto:adminlawcription@gmail.com" class="inline-flex items-center gap-2 text-amber-400 font-semibold hover:text-amber-300 break-all text-sm transition-colors">
                        <i class="fas fa-envelope text-xs"></i>
                        adminlawcription@gmail.com
                    </a>
                </div>
            </div>

            <!-- Grievance Officer -->
            <div class="group relative bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-3xl p-6 hover:border-rose-400/30 hover:bg-white/[0.05] transition-all duration-500">
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-rose-500/0 to-rose-500/0 group-hover:from-rose-500/[0.04] group-hover:to-transparent transition-all duration-500"></div>

                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-rose-500/10 flex items-center justify-center text-rose-400 text-xl mb-5 group-hover:scale-110 transition-transform duration-500">
                        <i class="fas fa-shield-halved"></i>
                    </div>

                    <h3 class="serif text-lg font-bold mb-1 text-white">
                        Grievance Officer
                    </h3>

                    <p class="text-rose-400/80 text-xs font-semibold tracking-wide uppercase mb-3">
                        P. Debnath
                    </p>

                    <p class="text-gray-400 mb-5 text-sm leading-relaxed">
                        For complaints, grievances and formal concerns.
                    </p>

                    <a href="mailto:healthcription@gmail.com" class="inline-flex items-center gap-2 text-rose-400 font-semibold hover:text-rose-300 break-all text-sm transition-colors">
                        <i class="fas fa-envelope text-xs"></i>
                        healthcription@gmail.com
                    </a>
                </div>
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

                    <h2 class="serif text-4xl font-black mt-6 mb-6">
                        We'd Love To Hear From You
                    </h2>

                    <p class="serif text-gray-400 leading-relaxed mb-10">
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
                                <h4 class="serif font-semibold mb-1">
                                    Business Hours
                                </h4>
                                <p class="serif text-gray-400">
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
    <!-- <section class="px-6 pb-24">

        <div class="max-w-7xl mx-auto">

            <div class="rounded-[40px] overflow-hidden border border-white/10 shadow-2xl">

                <iframe src="https://www.google.com/maps/embed?pb=" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

            </div>

        </div>

    </section> -->

</div>

@endsection