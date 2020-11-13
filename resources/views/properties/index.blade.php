@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-48 bg-brand-darker py-4 pt-32 bg-image-full" style="background-image: url('{{ $headerPhoto }}')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white text-shadow" tabindex="0">Property Search</h1>
        </div>
    </section>
    <property-search
        :initial-search-terms="{{ $searchParams }}"
        :initial-search-results="{{ $properties }}"
        :google-key="'{{ config('google.api_key') }}'"
        :data-map-module="'{{ config('modules.map_search') }}'"
    >
    </property-search>
    <div class="container mx-auto">
        @include('partials.disclaimer')
    </div>
    @include('partials.contact')
@endsection