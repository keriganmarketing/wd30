@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-64 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://www.xtns.org/wp-content/uploads/2014/06/beach-resort-glamorous-panama-city-beach-chateau-resort-panama-city-beach-resorts-beachfront-panama-city-beach-resorts-and-condos-panama-city-beach-resorts-with-tiki-bar-panama-city-beach-southern.jpg')">
        @include('partials.quick-search')
    </section>
    <section id="about" class="about bg-white py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto py-2">
            <div class="flex flex-wrap items-center">
                <div class="flex-auto w-full md:w-3/4 px-3 py-2 text-center md:text-left">
                    <h1 class="mb-4">Compelling SEO headline here. Compelling SEO headline here. Compelling SEO headline here.</h1>
                    <p class="leading-normal">Lorem ipsum dolor sit amet, euismod pericula an sea, in usu suas soluta placerat. Timeam tritani ea sed. Mea lorem cotidieque te. Meis aperiam consequat nam cu, equidem ocurreret ei vel, sumo zril eloquentiam te vim. At sea decore contentiones, per eu suas accusata appellantur.</p>
                    <a href="#" class="button-brand w-auto mt-4 no-underline" >Property Search</a>
                </div>
                <div class="flex-auto w-full md:w-1/4 px-3 justify-center text-center py-2">
                    <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" class="border border-grey-darker rounded inline-block" >
                </div>
            </div>
        </div>
    </section>
    <section id="featured-listings" class="featured-listings bg-brand-dark py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto py-2">
            {{-- @if($listings->count() > 0) --}}
            <h2 class="text-white text-center pb-4">Featured Listings</h2>
            <div class="flex flex-wrap items-center justify-center">
                {{-- @for ($i = 0; $i < 4; $i++)
                    @include('partials.mini-listing')
                @endfor --}}
            </div>
            {{-- @else
                <h2 class="text-white text-center pb-4">Check back later for my featured listings!</h2>
            @endif --}}
        </div>
    </section>
    @include('partials.contact')
@endsection