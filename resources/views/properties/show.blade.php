@extends('layouts.app')
@section('content')
    @include('partials.property.header')
    <div class="full-listing py-8">
        <div class="container mx-auto text-center md:text-left md:px-32">
            <div class="flex flex-wrap">
                @include('partials.property.photos')
                <div class="listing-right w-full md:w-3/5 px-4">
                    @include('partials.property.actionbuttons')
                    @include('partials.property.info')
                    @if($property->has_open_houses)
                        @include('partials.property.openhouses')
                    @endif
                    @include('partials.property.features')
                </div>
                <div class="location-left w-full py-4">
                    @include('partials.property.infotable')
                </div>
                <div class="location-right h-64 w-full px-4">
                    <google-map :latitude="{{ $property->latitude }}" :longitude="{{ $property->longitude }}" :zoom="15" />
                </div>
                @include('partials.disclaimer')
            </div>
        </div>
    </div>
    @include('partials.contact')
@endsection