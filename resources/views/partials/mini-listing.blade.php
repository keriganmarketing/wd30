<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2" >
    <div class="property relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-brand hover:border-secondary">
        <a href="/listing/{{ $listing->mls_account }}/" class="absolute pin hover:shadow-inner z-50" ></a>
        <div class="property-image md:h-48 md:overflow-hidden">
            @if($listing->has_open_houses)
                <div class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10">
                    OPEN HOUSE
                </div>
            @endif
            @if($listing->status != 'Active')
                <div class="inline-block absolute flag pin-t pin-l w-auto bg-secondary text-white p-1 px-4 mt-2 z-10">
                    {{ $listing->status }}
                </div>
            @endif
            <img class="w-auto h-auto min-h-full min-w-full" src="{{ $listing->preferred_image }}" >
        </div>
        <div class="property-details py-2 px-2">
            <div class="address h-12 flex flex-col justify-center align-middle">
                <p class="p-2 text-grey-darker text-sm text-center">{{ $listing->street_number }} {{ $listing->street_name }} @if($listing->unit_number) Unit {{$listing->unit_number}} @endif<br>
                    {{ $listing->city }}, {{ $listing->state }}</p>
            </div>
            <div class="price">
                <p class="py-2 font-bold text-center text-brand text-2xl">${{ number_format($listing->price, 0, '.', ',') }}</p>
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