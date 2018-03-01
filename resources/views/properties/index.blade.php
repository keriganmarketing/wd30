@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://beachybeach.com/wp-content/themes/kmaidx/img/beachy-illustration.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white">Property Search</h1>
        </div>
    </section>
    <search-bar v-on:switch-view="switchView" :view="viewType"></search-bar>
    <div v-if="viewType === 'grid'" class="properties grid pb-4">
        <div class="container mx-auto">
            @include('partials.sortbar')
            <property-search></property-search>
            @include('partials.pagination')
        </div>
    </div>
    <div v-if="viewType === 'map'" >
        <map-search :latitude="{{ $properties->data[0]->latitude }}" :longitude="{{ $properties->data[0]->longitude }}" :zoom="15" ></map-search>
    </div>
    <div class="container mx-auto">
        @include('partials.disclaimer')
    </div>
    @include('partials.contact')
@endsection