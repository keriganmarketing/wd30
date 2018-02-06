@extends('layouts.app')
@section('content')
    <section
        class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full"
        style="background-image: url('https://www.xtns.org/wp-content/uploads/2014/06/beach-resort-glamorous-panama-city-beach-chateau-resort-panama-city-beach-resorts-beachfront-panama-city-beach-resorts-and-condos-panama-city-beach-resorts-with-tiki-bar-panama-city-beach-southern.jpg')"
    >
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white text-center md:text-left">
                {{ $property->street_number }} {{ $property->street_name }}
                <span class="block md:inline-block text-sm"> MLS# {{ $property->mls_account }}</span>
            </h1>
        </div>
    </section>
    <div class="full-listing py-8">
        <div class="container mx-auto text-center md:text-left">
            <div class="flex flex-wrap">
                <div class="listing-left w-full md:w-2/5">
                    <div class="listing-slider px-1">
                        <img class="w-auto h-auto min-h-full min-w-full" src="{{ $property->preferred_image }}" >
                    </div>
                    <property-gallery>
                        @foreach($property->photos as $key => $photo)
                            <property-photo class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-1 py-1 overflow-hidden" :photoid="{{ $key }}" photourl="{{ $photo->url }}"></property-photo>
                        @endforeach
                    </property-gallery>
                </div>
                <div class="listing-right w-full md:w-3/5 px-4">
                    <div class="text-center md:text-right md:float-right">
                        <a class="button button-brand no-underline" href="#contact" >Request Info</a>
                        <a class="button button-brand cursor-pointer" @click="$emit('openPhotoViewer')" >View Photos</a>
                    </div>
                    <h2 class="listing-page-location mt-2 md:m-t-0">{{ $property->street_number }} {{ $property->street_name }} </h2>
                    <h2 class="listing-page-area">{{ $property->city }}, {{ $property->state }}</h2>
                    <h3 class="listing-page-price text-xl text-brand">${{ number_format($property->price) }}</h3>
                    <p class="text-grey-darkest pt-4 leading-normal">{{ $property->description }}</p>
                    @if($property->has_open_houses)
                    <h2 class="mt-6">Upcoming Open Houses</h2>
                    <div class="flex flex-wrap my-2">
                    @foreach($openHouses as $openHouse)
                        <div class="w-full md:w-auto p-1" >
                            <div class="card border-brand border-b-2 shadow">
                                <div class="card-block p-2">
                                    <p class="card-text text-grey-darkest py-2"><strong>Date: </strong> {{ $openHouse['start_date'] }}<br>
                                        <strong>Time: </strong> {{ $openHouse['start_time'] }} - {{ $openHouse['end_time'] }}</p>
                                    <a target="_blank" href="https://www.google.com/maps/place/{{ $property->street_number }} {{ $property->street_name }} {{ $property->city }}, {{ $property->state }}" class="button button-brand text-xs">Get Directions</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @endif
                    <h2 class="mt-6">Property Features</h2>
                    <table class="border-b-2 border-brand mx-1 my-4 mb-1 shadow flex flex-col text-left text-grey-darkest">
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">MLS#</td><td class="w-1/2 p-2">{{ $property->mls_account }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Status</td><td class="w-1/2 p-2">{{ $property->status }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Property Type</td><td class="w-1/2 p-2">{{ $property->property_type }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Bedrooms</td><td class="w-1/2 p-2">{{ $property->bedrooms }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Bathrooms</td><td class="w-1/2 p-2">{{ $property->bathrooms }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">H/C Sqft</td><td class="w-1/2 p-2">{{ $property->sq_ft }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Year Built</td><td class="w-1/2 p-2">{{ $property->year_built }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Stories</td><td class="w-1/2 p-2">{{ $property->stories }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Lot Size (Acres)</td><td class="w-1/2 p-2">{{ $property->acreage }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Taxes in {{ $property->last_tax_year }} </td><td class="w-1/2 p-2">${{ $property->last_taxes }}</td></tr>
                    </table>

                    @if(count($features) > 0)
                        <div class="flex flex-wrap justify-start">
                            @foreach ($features as $key => $value)
                                @include('partials.feature')
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="location-left w-full md:w-2/5 py-4">
                    <table class="border-b-2 border-brand mx-1 shadow flex flex-col text-left text-grey-darkest">
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Waterfront</td><td class="w-1/2 p-2">{{ $property->waterfront }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Waterfront Type</td><td class="w-1/2 p-2">{{ $property->waterview_description }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Elementary School</td><td class="w-1/2 p-2">{{ $property->elementary_school }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Middle School</td><td class="w-1/2 p-2">{{ $property->middle_school }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">High School</td><td class="w-1/2 p-2">{{ $property->high_school }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Zip Code</td><td class="w-1/2 p-2">{{ $property->zip }}</td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Sub-area</td><td class="w-1/2 p-2">{{ $property->sub_area }}</td></tr>
                        <tr class="flex"><td class="w-1/2 p-2">Subdivision</td><td class="w-1/2 p-2">{{ $property->subdivision }}</td></tr>
                    </table>
                </div>
                <div class="location-right w-full md:w-3/5 px-4 py-4">
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4"></script>
                    <google-map :latitude="{{ $property->latitude }}" :longitude="{{ $property->longitude }}" :zoom="15" name="listing-location" >
                        <google-map-pin :latitude="{{ $property->latitude }}" :longitude="{{ $property->longitude }}" title="{{ $property->street_number }} {{ $property->street_name }}" />
                    </google-map>
                </div>

                @include('partials.disclaimer')

            </div>
        </div>
    </div>
    @include('partials.contact')
@endsection