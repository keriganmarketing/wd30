@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://www.xtns.org/wp-content/uploads/2014/06/beach-resort-glamorous-panama-city-beach-chateau-resort-panama-city-beach-resorts-beachfront-panama-city-beach-resorts-and-condos-panama-city-beach-resorts-with-tiki-bar-panama-city-beach-southern.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white">Property Search</h1>
        </div>
    </section>
    @include('partials.search-bar')
    <div class="properties grid pb-4">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-center">
                @foreach ($properties->data as $listing)
                    @include('partials.mini-listing')
                @endforeach
            </div>

            @include('partials.disclaimer')
        </div>
    </div>
    @include('partials.contact')
@endsection