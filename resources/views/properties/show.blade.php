@extends('layouts.app')
@section('content')
    @include('partials.property.header')
    <div class="full-listing py-8">
        <div class="container mx-auto text-center md:text-left xl:px-24">
            <div class="flex flex-wrap">
<<<<<<< HEAD
                <div class="listing-left w-full md:w-2/5">
                    <div class="listing-slider px-1">
                        <img class="w-auto h-auto min-h-full min-w-full" src="{{ $property->preferred_image }}" >
                    </div>
                    <div class="hidden md:flex flex-wrap" >                                                                 
                        @foreach($property->photos as $photo)
                            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-1 py-1">                                      
                                <img class="w-auto h-auto min-h-full min-w-full" src="{{ $photo->url }}" >
                            </div>
                        @endforeach
                    </div>
=======
                <div class="listing-photos flex flex-col flex-wrap w-full lg:w-1/2 lg:px-4 py-4">
                    @include('partials.property.photos')
>>>>>>> upstream/master
                </div>
                <div class="listing-details w-full lg:w-1/2 lg:px-4 py-4">
                    @include('partials.property.actionbuttons')
                    @include('partials.property.info')
                    @if($property->has_open_houses)
<<<<<<< HEAD
                    <h2 class="mt-6">Upcoming Open Houses</h2>
                    <div class="flex flex-wrap my-2">
                      @foreach($property->open_houses as $openHouse)                                                                        
                        <div class="w-full md:w-1/3 " >                                                                   
                            <div class="card border-grey shadow">
                                <div class="card-block p-2">
                                    <p class="card-text py-2"><strong>Date: </strong> <?php echo date('M j, Y', strtotime($openHouse->event_start)); ?><br>
                                        <strong>Time: </strong> <?php echo date('h:s a', strtotime($openHouse->event_start)); ?> - <?php echo date('h:s a', strtotime($openHouse->event_end)); ?></p>
                                    <a target="_blank" href="https://www.google.com/maps/place/<?php //echo $addressString; ?>" class="button button-brand text-xs">Get Directions</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
=======
                        @include('partials.property.openhouses')
>>>>>>> upstream/master
                    @endif
                    @include('partials.property.features')
                </div>
                <div class="listing-features w-full py-4 lg:px-4">
                    @if(count($features) > 0)
                        <div class="flex flex-wrap justify-start">
                            @foreach ($features as $key => $value)
                                @include('partials.feature')
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="listing-location w-full py-4 lg:px-4">
                    @include('partials.property.infotable')
                </div>
                <div class="listing-map w-full px-1 lg:px-4">
                    <div class="border-b-2 border-secondary-light mx-1 my-4 shadow">
                        <google-map :latitude="{{ $property->latitude }}" :longitude="{{ $property->longitude }}" :zoom="15" />
                    </div>
                </div>
                @include('partials.disclaimer')
            </div>
        </div>
    </div>
    @include('partials.contact')
@endsection