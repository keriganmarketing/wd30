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
<body class="h-screen font-Lato text-smoke-darkest">
    <div id="app" class="relative">
        <nav class="fixed bg-tan-lightest w-full z-50 shadow-md">
            <div class="container mx-auto h-full">
                <div class="flex flex-row items-center justify-center">
                    <div class="flex-1 m-0 mx-2">
                        @include('partials.logo')
                    <!--<div class="flex-1 text-right align-middle h-16 small:p-0 md:pb-4 md:py-0 w-1 pin-t pin-r">-->
                        <!--<span class="text-brand text-sm pr-4" v-if="! boilerplate">@{{ user.name }}</span>
                        <span class="text-brand text-sm pr-4" v-else>Your Name</span>-->
                        <a href="{{ route('logout') }}"
                            class="no-underline hover:underline text-cta-red px-4 md:px-8 py-7 lg:px-8 my-1 fixed pin-t pin-r"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 6 24 12" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> 
                            </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class='w-full bg-tan-lightest pt-12 md:pt-24 pb-8'>
            @yield('top')
        </div>
        <div class='bg-beachy-blue pb-16'>
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
