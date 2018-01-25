@extends('layouts.app')
@section('content')
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://www.xtns.org/wp-content/uploads/2014/06/beach-resort-glamorous-panama-city-beach-chateau-resort-panama-city-beach-resorts-beachfront-panama-city-beach-resorts-and-condos-panama-city-beach-resorts-with-tiki-bar-panama-city-beach-southern.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white text-center md:text-left">123 Some Street <span class="block md:inline-block text-sm ">MLS# 123456</span> </h1>
        </div>
    </section>
    <div class="full-listing py-8">
        <div class="container mx-auto text-center md:text-left">
            <div class="flex flex-wrap">
                <div class="listing-left w-full md:w-2/5">
                    <div class="listing-slider px-1">
                        <img class="w-auto h-auto min-h-full min-w-full" src="https://cloud.netlifyusercontent.com/assets/344dbf88-fdf9-42bb-adb4-46f01eedd629/160ae39d-b5b0-4d9f-a8e1-76102113e2f8/placeholder-picture-large-opt.png" >
                    </div>
                    <div class="hidden md:flex flex-wrap" >
                        @for ($i = 0; $i < 36; $i++)
                            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-1 py-1">
                                <img class="w-auto h-auto min-h-full min-w-full" src="https://cloud.netlifyusercontent.com/assets/344dbf88-fdf9-42bb-adb4-46f01eedd629/160ae39d-b5b0-4d9f-a8e1-76102113e2f8/placeholder-picture-large-opt.png" >
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="listing-right w-full md:w-3/5 px-4">
                    <div class="text-center md:text-right md:float-right">
                        <a class="button button-brand" href="#contact" >Request Info</a>
                        <a class="button button-brand" @click="$emit('open photo viewer')" >View Photos</a>
                    </div>
                    <h2 class="listing-page-location mt-2 mt-md-0">9860 Thomas</h2>
                    <h2 class="listing-page-area">Panama City Beach, FL</h2>
                    <h3 class="listing-page-price">$199,000</h3>
                    <p class="text-grey-darker pt-4 leading-normal">This residence is FULLY FURNISHED with everything needed for vacation rental, or you to make as your home in paradise. This residence has 1 bedroom, 2 baths, bunk room, and beautiful views from balcony. Laketown Wharf Resort is where all the fun and excitement begins. You are just steps away from the WORLD'S MOST BEAUTIFUL EMERALD COAST, WHITE SANDY BEACHES. Shopping, dining, and entertainment are right at your fingertips. Once you arrive at Laketown, you will not want to leave. We have all the amenities that you can think of which include one of the largest convention centers on the beach at 29,000 square foot, Gulf View fitness center, five unique pools, ''The Wharf'' seafood buffet restaurant, Splash Bar & Grill, The Market Place, The Candy Maker, and two large covered garages.</p>
                    <h2 class="mt-6">Upcoming Open Houses</h2>
                    <div class="flex flex-wrap my-2">
                        <div class="w-full md:w-1/3 " >
                            <div class="card border-grey shadow">
                                <div class="card-block p-2">
                                    <p class="card-text py-2"><strong>Date:</strong> <?php //echo date('M j, Y', strtotime($openHouse->event_start)); ?><br>
                                        <strong>Time:</strong> <?php //echo date('h:s a', strtotime($openHouse->event_start)); ?> - <?php //echo date('h:s a', strtotime($openHouse->event_end)); ?></p>
                                    <a target="_blank" href="https://www.google.com/maps/place/<?php //echo $addressString; ?>" class="button button-brand text-xs">Get Directions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-6">Property Features</h2>
                    <table class="border-b-2 border-brand mx-1 my-4 mb-1 shadow flex flex-col text-left">
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">MLS#</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Status</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Property Type</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Bedrooms</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Bathrooms</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">H/C Sqft</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Year Built</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Stories</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Lot Size</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Taxes</td><td class="w-1/2 p-2"></td></tr>
                    </table>

                    <div class="flex flex-wrap my-2">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 p-1" >
                            <div class="card border-grey shadow h-full text-left">
                                <div class="card-title p-2 bg-grey">
                                    <p class="text-white">title</p>
                                </div>
                                <div class="card-block p-2">
                                    <ul>
                                        <li>item</li>
                                        <li>item</li>
                                        <li>item</li>
                                        <li>item</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endfor
                    </div>
                </div>
                <div class="location-left w-full md:w-2/5">
                    <table class="border-b-2 border-brand mx-1 shadow flex flex-col text-left">
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Waterfront</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Waterfront Type</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Elementary School</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Middle School</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">High School</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Zip Code</td><td class="w-1/2 p-2"></td></tr>
                        <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Sub-area</td><td class="w-1/2 p-2"></td></tr>
                        <tr><td class="w-1/2 p-2">Subdivision</td><td class="w-1/2 p-2"></td></tr>
                    </table>
                </div>
                <div class="location-right w-full md:w-3/5 px-4">
                    <script type="text/javascript">

                        var map,
                          marker,
                          mapElement;

                        //init map using script include callback
                        function initMap() {

                            var myLatLng = { lat: 30.1758995, lng: -85.8052159 };
                            var mapOptions = {
                                zoom: 11,
                                center: myLatLng,
                                disableDefaultUI: true,
                            };

                            // Get the HTML DOM element that will contain your map
                            mapElement = document.getElementById('listing-map');

                            // Create the Google Map using our element and options defined above
                            map = new google.maps.Map(mapElement, mapOptions);
                            bounds = new google.maps.LatLngBounds();

                            marker = new google.maps.Marker({
                                title: '123456',
                                position: myLatLng,
                                map: map
                            });

                        }

                    </script>
                    <div id="listing-map" class="h-full mx-1 flex shadow" ></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4&callback=initMap" async defer></script>
                </div>

                @include('partials.disclaimer')

            </div>
        </div>
    </div>
    @include('partials.contact')
@endsection