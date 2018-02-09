<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="bg-white h-screen">
    <div id="app" class="flex flex-col min-h-full justify-between">
        <div class="top shadow-md">
            <nav class="bg-brand-dark">
                <div class="container mx-auto">
                    <div class="md:flex items-center justify-between">
                        <div class="flex flex-wrap text-center md:text-right sm:flex-row-reverse w-full">
                            @guest
                                {{--<a class="inline-block w-1/2 sm:w-auto no-underline text-white text-xs px-2 py-3 md:py-1 pr-4 bg-brand-darker hover:bg-darkest" href="{{ url('/register') }}">Register</a>--}}
                                {{--<a class="inline-block w-1/2 sm:w-auto no-underline text-white text-xs px-2 py-3 md:py-1 pl-4 bg-brand-darker hover:bg-darkest" href="{{ url('/login') }}">Login</a>--}}
                                <a class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1" href="mailto:bryan@kerigan.com">{{ $realtor->email }}</a>
                                <a class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pb-3 sm:py-3 md:py-1" href="tel:8506484560">{{ $realtor->phone_number }}</a>
                            @else
                                <a
                                    href="{{ route('logout') }}"
                                    class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1 bg-brand-darker"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <a
                                    class="inline-block w-full sm:w-auto no-underline text-white text-xs px-2 py-1 pt-3 sm:py-3 md:py-1 bg-brand-darker"
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
            <nav class="bg-white">
                <div class="container mx-auto h-full">
                    <div class="md:flex items-center justify-between">
                        <div class="text-center md:mr-6 md:text-left py-8 md:py-0">
                            <a href="{{ url('/') }}" class="no-underline text-2xl text-brown-brand font-brand inline-flex justify-start items-center leading-none">
                                <span class="logo-block px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 450 450" class="h-12">
                                        <path class="fill-current" d="M450,225c0,124.26-100.74,225-225,225S0,349.26,0,225,100.74,0,225,0,450,100.74,450,225ZM328.83,166.63H251.11c-1.4-5.72-10-15.43-32.5-26.85-19.43-7.54-34.39-5.65-39.57-5.65-.94-.24-1.41-.47,0-1.41,1.41-.47,14.37-9.07,18.37-9.89,5.3-1.41,6,.24,8.48,1.41,6.57,2.28,13.17,4.23,20.14,1.77,1.88-.71,2-3.18,2.47-3.18.47,1.41.82,4.36,2.24,4.83,3.06,1.53,6.36,3.06,19-2-.47-13.86-7-20-11.31-29.68-12.85.07-28.26,13-42.4,12.72,1.06-4.24,5.18-8.48,5.65-8.48v4.24c1.41,0,4.12-2.83,7.07-4.24,4-2.24,6-1.06,7.77-4.12.47-2.36.24-3.42.71-5.77,1.77,2.83,3.89,1.3,2-1.3-2.59-3.89-4.47-14.25-10.48-14.25-24.29.5-46.16,42.4-46.63,42.4.85-8.68-4.71-39.33-12.72-53.7-7.54-12-25.38-4.17-31.09-1.41.47.94,4.12,1.77,5.65,4.24,4.12,6.48-.94,9.42,4.24,19.78-3.85,1.08-6.36,3.53-5.65,7.07.59,1.77,2.59,4.46,8.48,5.65v12.72c4.64.95,8.22,3.38,9.89,7.07.94,3.3,0,3.77,0,5.65,1.41.47,2.24-.12,4.24,1.41,3.3,3.89,2.53,5,2.83,8.48-1.41,1.53-2.36,2.12-5.65,0-2.39-2.95-16.49-15-39.57-29.68-15-7.54-28.47-7.9-37.57-5.3-14.37,4.36-16.72,9.42-19,11-4.24,4.12-8,11.78-8.48,14.13,10-5.06,1.18,5.3,11.89,2.36.55,4.56.35,7.54,2.71,7.77,1.77.47,2-1.95,6.83-3.18.85,2.82,3.18,1.53,4,4.36,4-5-.94-6.39,8.48-8.48,1.77,9.3,2.83.47,8.48-2.83,4.22,1.92.24,3.65,8.48,2.83-1.3,2.94.71,5.77,4.24,7.07-1.06-3.89,6.84-4.93,9.89-4.24,16.13,5.06,18.33,8.24,24,11.31,1.53,1.18,2.24,1.65,0,2.83-1.41-.47-13-6.59-26.85-8.48a131.19,131.19,0,0,0-45.22,7.07C38.31,155.21,36.3,150,31.18,155.68c-.18,3.18,7.12-1.06,6.36,4.68-1.53,5.49-7,9.33-5.48,11.92,1.65,2.12,12.49-10.57,11.31-1.41-.47,3.65,8.6-2.59,14.75-8.92,1.85,4.68,0,4.09.79,6.36.59,1,2-1,2.83-3.09,2.12-1.88,3.65-1.3,5.53-.94,4.59.35,8.13-1.88,11.42-1.88-1.3-9.54,6.63-1.9,14.13-4.24-1.65-5.3,4.83-3.53,8.48,0,6.29-1.75,5-5.42,11.31-7.07,0,.94,1.06,4.12,5.65,2.83,0-1.41-2.83-2.47,0-4.24,1.41,0,4.47.35,5.65,1.41,2.36,2.71,1.06,3.53,0,4.24-4.36,2.83-15.19,3.18-25.44,7.07-6,2.36-7.37,4.87-8.24,9.77-16.6,8.24-15.94,23.76-15.78,28.38,11.18-.52,5.36-6,10.25-11.19,2.83-1.88,3.38,1.14,6.71,1.3.85-2.82-1.06-4.12,1.41-5.65,4.59-1.53,4,2.33,5.65,1.41-.59-7.42,2.36-7.07,2.83-9.89,4.59-.47,5.42.24,9.89,2.83.86-2.26,2.71-2.83,1.41-7.07,4.36,6.12,11.85-3.58,12.72-8.48,5.53,3.65,15.54-6.12,18.37-7.07,4.29,11.75,0,27.63,0,41,0,35.07-4.62,75,4.24,104.57,0,2.83,3.77,18.37,4.24,18.37,1.88,5,.6,8,4.24,11.31-1,7.17-1.59,5.65-5.65,11.31,9.12.93,17.66,4.69,25.44,7.07,5.18.47,10.33,0,15.54,1.41C194.58,353,196,355.53,196,356c9.89.47,29.68,2.36,29.68,2.83,1.41,0,5.18,1.89,5.65,2.83,2.57.92,19.78-9,57.94-9.89,34.27-1.06,72.07,9.89,72.07,9.89H391v-8.48c-.53-3.53-.86-3.51-2.47-5.77-5.65-3.77-11.66-7.42-17.31-11.19,0-13.19,1.41-56.05,1.41-56.53,3.71,3.89,3.95,3,7.07,2.83,5.54-1.18,5.65-5.65,5.65-5.65,0-5.65-1.06-17.55,2.83-18.37s6.39.84,11.31,1.41c-.47-1.41-42.87-56.06-43.81-56.53-3.18-4.71-2.8-6.55-2.83-12.72l-8.48-2.83M170.55,156.74c1.65-.41,2.83-2.36,4.24-2.83l4.24,5.65c5.77,4.59,15.78,7.48,19.78,7.07,5.54-.41,6.48-2.18,7.07-4.24.24-.77-1.77-1.53,0-1.41,3.06-.12,5.12,5.89,8.48,7.07-.06-4.24,1.06-4.24,2.83-4.24,2.47.06,4,5.53,4.24,5.65,1.79.9.73-.82,1.41-1.41,1.16-1,6.75,2.07,7.23,3.35,1,2.59,0,1.64-1.23,3.39-1.78,2.63-49.84,38-50,38.36-4.17.34-8.42,0-12.61.17-4.23,1.53-2.45,6.18-2.76,10-.23,2.89-8.56,12.25-8.47,12.48-1.59-4.44-1.4-11.87-1.4-18.34L155,185a125,125,0,0,0,4.24-28.26C163,156.74,167.43,157.86,170.55,156.74Zm4.24,124.36v28.26h0v4.24c.19,4.39,0,19.31,0,22.61-1.59-1.21-1.63.19-2.83-1.41l-2.83-1.41v-7.07c.09-.38,1.83-.44,1.41-2.83l-11.31-43.81m50.87,1.41c-.47,2.83-.94,4.24-1.41,7.07,2.88.54,10.07,2.12,33.92,1.41v46.63H190.34V281.1Zm79.14,8.48c17.13-.88,20.49,10.07,31.09,9.89,7.24.88,22.61-9.42,24-9.89.47,10.36,0,41.45,0,46.63h-86.2V289.58C262.41,290.05,289.26,290.05,289.26,289.58Z"/>
                                    </svg>
                                </span><span class="realtor-name">{{ config('app.name', 'Laravel') }}</span>
                            </a>
                        </div>
                        <div class="flex text-right">
                            <a class="hidden md:inline-block no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-6 hover:bg-grey-lightest" href="/">Home</a>
                            <a class="hidden md:inline-block no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-6 hover:bg-grey-lightest" href="/property-search/">Property Search</a>
                            <a class="hidden md:inline-block no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-6 hover:bg-grey-lightest" href="/#featured-listings">Featured Listings</a>
                            <a class="hidden md:inline-block no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-6 hover:bg-grey-lightest" href="/#about">About Me</a>
                            <a class="hidden md:inline-block no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-6 hover:bg-grey-lightest" href="#contact">Contact</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="mid flex-grow">
        @yield('content')
        </div>
        <div class="bot">
            <nav class="bg-brand-darker">
                <div class="mx-auto h-full justify-center md:flex align-middle text-center">
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-brand-darkest" href="/">Home</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-brand-darkest" href="/property-search/">Property Search</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-brand-darkest" href="/#featured-listings">Featured Listings</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-brand-darkest" href="/#about">About Me</a>
                    <a class="block md:inline-block text-white no-underline text-grey-darker text-sm h-full h-12 align-middle px-4 py-4 hover:bg-brand-darkest" href="#contact">Contact</a>
                </div>
            </nav>
            <section class="bg-brand-darkest text-center py-8" >
                <p class="text-xs text-white">&copy; <?= date('Y'); ?> {{ config('app.name', 'Realtor') }}. All rights reserved.
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
