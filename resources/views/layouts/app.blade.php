<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    <!-- Styles -->
    <link href="{{ asset('css/' . config('modules.theme') . '.css') }}" rel="stylesheet">

    @php
        if( config('google.has_analytics') && config('google.analytics_code')) {
            echo "<script> window.analytics_code = '" . config('google.analytics_code') . "'; </script>";
        }
    @endphp
    <!-- Global site tag (gtag.js) - Google Analytics -->

    @if( config('google.has_analytics') && config('google.analytics_code') )
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('google.analytics_code') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', window.analytics_code);
        </script>
    @endif
</head>
<body class="bg-white h-screen antialiased">
    <a class="skip-link screen-reader-text" href="#content">Skip to Content</a>
    <div id="app" class="flex flex-col min-h-full justify-between">
        <div class="top fixed pin-t pin-l pin-r w-100 z-50 shadow-md">
            <nav class="bg-primary-dark">
                <div class="container mx-auto">
                    <div class="md:flex items-center justify-between">
                        <div class="flex flex-wrap text-center md:text-right sm:flex-row-reverse w-full">
                            @guest
                                @if(isset($realtor))
                                    <a class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1" href="mailto:bryan@kerigan.com">{{ $realtor->data->email }}</a>
                                    <a class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pb-3 sm:py-3 md:py-1" href="tel:{{ $realtor->data->primary_phone }}">{{ $realtor->data->primary_phone }}</a>
                                @endif
                            @else
                                <a
                                    href="{{ route('logout') }}"
                                    class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1 bg-tertiary"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <a
                                    class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1 bg-tertiary"
                                    href="{{ route('home') }}"
                                >
                                        Dashboard
                                </a>
                                <span class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1">Hello, {{ \Auth::user()->name }}</span>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="main-navigation">
                <div class="container mx-auto h-full">
                    <div class="md:flex justify-between">
                        <div class="text-center md:mr-6 md:text-left md:py-0">
                            @include('partials.logo')
                        </div>
                        <div class="flex text-right nav-items">
                            <a class="hidden md:flex items-center no-underline text-navitem text-sm h-full align-middle px-4 py-6 hover:bg-navhover" href="/">Home</a>
                            <a class="hidden md:flex items-center no-underline text-navitem text-sm h-full align-middle px-4 py-6 hover:bg-navhover" href="/property-search/">Property Search</a>
                            <a class="hidden md:flex items-center no-underline text-navitem text-sm h-full align-middle px-4 py-6 hover:bg-navhover" href="/#featured-listings">Featured Listings</a>
                            <a class="hidden md:flex items-center no-underline text-navitem text-sm h-full align-middle px-4 py-6 hover:bg-navhover" href="/#about">About Me</a>
                            <a class="hidden md:flex items-center no-underline text-navitem text-sm h-full align-middle px-4 py-6 hover:bg-navhover" href="#contact">Contact</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="content" class="mid flex-grow pt-32 md:pt-24">
        @yield('content')
        </div>
        <div class="bot">
            <nav class="bg-tertiary">
                <div class="mx-auto h-full justify-center md:flex align-middle text-center">
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-tertiary-dark" href="/">Home</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-tertiary-dark" href="/property-search/">Property Search</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-tertiary-dark" href="/#featured-listings">Featured Listings</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-tertiary-dark" href="/#about">About Me</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-tertiary-dark" href="#contact">Contact</a>
                </div>
            </nav>
            <section class="bg-tertiary-dark text-center py-8" >
                <p class="text-xs text-white">&copy; @php echo date('Y'); @endphp {{ config('app.name', 'Realtor') }}. All rights reserved.
                <p class="text-xs text-white pt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.5 8.7" class="h-2">
                        <path fill="#b4be35" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
                    </svg> <a class="text-white no-underline" href="https://keriganmarketing.com" target="_blank" >Site by KMA</a>.</p>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
