@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full"
             style="background-image: url('https://beachybeach.com/wp-content/themes/kmaidx/img/beachy-illustration.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white">Property Search</h1>
        </div>
    </section>
    @include('partials.search-bar')
    <div class="properties grid pb-4">
        <div class="container mx-auto">
            <p class="py-4 px-2 text-left text-grey-dark">Showing {{ number_format(count($properties->data)) }} of {{ number_format($properties->total) }} results</p>
            <div class="flex flex-wrap items-center justify-center">
                @foreach ($properties->data as $listing)
                    @include('partials.mini-listing')
                @endforeach
            </div>
            @include('partials.pagination')
            @include('partials.disclaimer')
        </div>
    </div>
    @include('partials.contact')
@endsection