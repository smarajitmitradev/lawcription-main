<!DOCTYPE html>
<html lang="en" class="no-js">

@include('frontend.layout.header')

<body id="top">

    <!-- Preloader -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="page" class="s-pagewrap ss-home">

        {{-- Navbar --}}
        @include('frontend.layout.navbar')

        {{-- Main Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('frontend.layout.footer')

    </div>

</body>
</html>