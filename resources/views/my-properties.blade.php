@extends('layouts.dashboard')

@section('content')
    <section id="featured-listings" class="featured-listings py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto py-2">
            @if($listings->count() > 0)
            <h2 class="text-brand-dark text-center pb-4">My Listings</h2>
            <div class="flex flex-wrap items-center justify-center">
                @foreach($listings as $listing)
                    @include('partials.mini-listing')
                @endforeach
            </div>
            @else
                <h2 class="text-white text-center pb-4">Check back later for my featured listings!</h2>
            @endif
        </div>
    </section>
@endsection