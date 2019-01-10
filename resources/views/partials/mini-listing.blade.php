<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2" >
    <div class="property relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-primary hover:border-secondary">
        <a href="/listing/{{ $listing->mls_account }}/" class="absolute pin hover:shadow-inner z-50" ></a>
        <div class="property-image md:h-48 md:overflow-hidden">
            @if($listing->has_open_houses)
                <div class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10 font-brand text-xl">
                    OPEN HOUSE
                </div>
            @endif
            @if($listing->status != 'Active')
                <div class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10 font-brand text-xl">
                    {{ $listing->status }}
                </div>
            @endif
            @if(isset($listing->preferred_image))
                <img class="w-auto h-auto min-h-full min-w-full" src="{{ $listing->preferred_image }}">
            @else
                <div class="text-grey-lighter w-full h-full bg-white text-center">
                    <svg class="h-full " version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" viewBox="0 0 1000 1000"
                         enable-background="new 0 0 1000 1000" xml:space="preserve">
                        <path class="fill-current stroke-current opacity-75" d="M200.9,489.4L163.5,444L500,167.2L836.5,444l-37.4,45.4L500,243.4L200.9,489.4z M853.9,645.6h-96.8v93.6H244.2v-93.6h-98.1L10,832.6h54.3c2.5,0,5,0.1,7.5,0.1c120.5,0,240.9,0,361.4,0c6.4,0,12.8,0,19.1,0h111.2c1.2,0,2.2,0,3.4,0c120.5,0,240.9,0.1,361.4,0c2.5,0,5,0,7.5-0.1H990L853.9,645.6z M500,300.2l217.2,179.9v163.7v56.1v6H282.8v-6.7v-55.5V479.4L500,300.2z M496.7,544.3h-80.5v75.2h80.5V544.3z M496.7,459.3h-80.5v75.2h80.5V459.3z M507.2,534.5h80.5v-75.2h-80.5V534.5z M507.2,619.6h80.5v-75.2h-80.5V619.6z" ></path>
                    </svg>
                </div>
            @endif
        </div>
        <div class="property-details py-2 px-2">
            <div class="address h-12 flex flex-col justify-center align-middle">
                <p class="p-2 text-grey-darker text-sm text-center">{{ $listing->street_number }} {{ $listing->street_name }} {{ $listing->street_suffix }} @if($listing->unit_number) Unit {{$listing->unit_number}} @endif<br>
                    {{ $listing->city }}, {{ $listing->state }}</p>
            </div>
            <div class="price">
                <p class="py-2 text-center text-primary text-3xl font-brand">
                    @if($listing->class == 'H' && $listing->price == 0)
                        Auction
                    @else
                        ${{ number_format($listing->price, 0, '.', ',') }}
                    @endif
                </p>
            </div>
            <div class="prop-type">
                <p class="pb-2 text-grey-darkest text-center text-xs text-grey-dark text-uppercase">{{ $listing->property_type }}</p>
                {{--<p class="pb-2 text-grey-darkest text-center text-xs text-grey-dark text-uppercase">{{ $listing->class }}</p>--}}
            </div>
            <div class="attributes flex text-center justify-around py-2">
            @if($listing->class == 'A' || $listing->class == 'G' || $listing->class == 'H')
                @if($listing->bedrooms > 0)
                    @include('partials.mini-listing.beds')
                @endif
                @if($listing->bathrooms > 0)
                    @include('partials.mini-listing.baths')
                @endif
                @if($listing->sq_ft > 0)
                    @include('partials.mini-listing.sqft')
                @endif
            @elseif($listing->class == 'J' || $listing->class == 'C')
                @if($listing->lot_dimensions != '')
                    @include('partials.mini-listing.lot-dimensions')
                @endif
                @if($listing->acreage > 0)
                    @include('partials.mini-listing.acreage')
                @endif
                @if($listing->sq_ft > 0)
                    @include('partials.mini-listing.sqft')
                @endif
            @elseif($listing->property_type == 'Farm')
                @if($listing->bedrooms > 0)
                    @include('partials.mini-listing.beds')
                @endif
                @if($listing->bathrooms > 0)
                    @include('partials.mini-listing.baths')
                @endif
                @if($listing->acreage > 0)
                    @include('partials.mini-listing.acreage')
                @endif
            @elseif($listing->class == 'J' || $listing->class == 'F' || $listing->class == 'E')
                @if($listing->acreage > 0)
                    @include('partials.mini-listing.acreage')
                @endif
                @if($listing->lot_dimensions != '')
                    @include('partials.mini-listing.lot-dimensions')
                @elseif($listing->stories > 0)
                    @include('partials.mini-listing.stories')
                @endif
                @if($listing->sq_ft > 0)
                    @include('partials.mini-listing.sqft')
                @endif
            @endif
            </div>
            <div class="mls text-center mt-3">
                <p class="text-grey-dark text-xs">MLS# {{ $listing->mls_account }}</p>
            </div>
        </div>

    </div>


</div>