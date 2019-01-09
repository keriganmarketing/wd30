@extends('layouts.app')
@section('content')
    <section class="flex lg:h-64 bg-brand-darker py-4 pt-24 bg-image-full" style="background-image: url('{{ $headerPhoto }}')">
        @include('partials.quick-search')
    </section>
    <section id="about" class="about bg-white py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto py-2">
            <div class="flex flex-wrap items-center">
                <div class="flex-auto w-full md:w-3/4 px-3 py-2 text-center md:text-left">
                    <h1 class="mb-4 text-secondary-lighter">{{ $content->title }}</h1>
                    <p class="leading-normal text-grey-darker">{!! nl2br($content->body) !!}</p>
                    <a href="/property-search/" class="button-brand w-auto mt-4 no-underline" >Property Search</a>
                </div>
                <div class="flex-auto w-full md:w-1/4 px-3 justify-center text-center py-2">
                    @if ($realtor->data->avatar_path != '')
                    <img src="{{ asset('/storage/'. $realtor->data->avatar_path) }}" class="border border-grey-darker rounded inline-block" >
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if($realtor->hasListings())
    <section id="featured-listings" class="featured-listings bg-brand-dark py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto flex flex-wrap items-center justify-center py-2">

            <h2 class="text-white w-full text-center pb-4 text-3xl">
                {{ $realtor->data->name }}'s Active Listings
            </h2>
            <featured-properties
                class="flex flex-wrap w-full items-center justify-center"
                :properties="{{ json_encode($activeListings) }}"
            >
            </featured-properties>
        </div>
    </section>
    <section id="featured-listings" class="featured-listings bg-brand-darker py-8 lg:py-16 xl:py-24">
        <div class="container mx-auto flex flex-wrap items-center justify-center py-2">
            <h2 class="text-white w-full text-center pb-4 mt-6 text-3xl">
                {{ $realtor->data->name }}'s Listings Sold<br>
                <span class="text-xl text-brand-lightest leading-none">in the last 6 months</span>
            </h2>
            <featured-properties
                class="flex flex-wrap w-full items-center justify-center"
                :properties="{{ json_encode($otherListings) }}"
            >
            </featured-properties>
        </div>
    </section>
    @endif
    @if($realtor->shouldHaveBlogs())
        <section class="bg-white py-8 lg:py-16 xl:py-24">
            <div class="container flex flex-wrap items-center justify-center mx-auto py-2">
                <h2 class="text-brand-darker w-full text-center pb-4 text-3xl">
                    Latest Blog Posts
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -28 48 48"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather h-16 w-16 feather-rss"
                    >
                        <path d="M4 11a9 9 0 0 1 9 9"></path>
                        <path d="M4 4a16 16 0 0 1 16 16"></path>
                        <circle cx="5" cy="19" r="1"></circle>
                    </svg>
                </h2>
                <blog-feed class="flex flex-wrap w-full justify-center"></blog-feed>
            </div>
        </section>
    @endif
    @if($realtor->shouldHaveFacebook())
        <section class="bg-secondary-lightest py-8 lg:py-16 xl:py-24">
            <div class="container flex flex-wrap items-center justify-center mx-auto py-2">
                <h2 class="text-white w-full text-center pb-4 text-3xl">
                    Latest News
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -28 48 48"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather h-16 w-16 feather-rss"
                    >
                        <path d="M4 11a9 9 0 0 1 9 9"></path>
                        <path d="M4 4a16 16 0 0 1 16 16"></path>
                        <circle cx="5" cy="19" r="1"></circle>
                    </svg>
                </h2>
                <facebook-feed class="flex flex-wrap w-full justify-center"></facebook-feed>
            </div>
        </section>
    @endif
    @if($realtor->shouldHaveYoutube())
        <section class="bg-secondary py-8 lg:py-16 xl:py-24">
            <div class="container flex flex-wrap items-center justify-center mx-auto py-2">
                <h2 class="text-white text-center pb-4 text-3xl">
                    Featured Videos
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -28 48 48"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather h-16 w-16 ml-2 feather-video"
                    >
                        <polygon points="23 7 16 12 23 17 23 7"></polygon>
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                    </svg>
                </h2>
                <youtube-gallery class="flex flex-wrap w-full items-center justify-center"></youtube-gallery>
            </div>
        </section>
    @endif
    @include('partials.contact')
@endsection
