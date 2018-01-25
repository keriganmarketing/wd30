<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2" >
    <div class="property relative bg-white shadow-md md:rounded overflow-hidden">
        <a href="#" class="absolute pin hover:shadow-inner" ></a>
        <div class="property-image md:h-48 md:overflow-hidden">
            <img class="w-auto h-auto min-h-full min-w-full" src="{{ $listing->preferred_image }}" >
        </div>
        <div class="property-details py-2 px-2">
            <div class="address">
                <p class="py-2 text-grey-darkest text-center">{{ $listing->full_address }}</p>
            </div>
            <div class="price">
                <p class="py-2 font-bold text-center text-brand text-2xl">${{ number_format($listing->price, 0, '.', ',') }}</p>
            </div>
            <div class="attributes flex text-center py-2">
                <div class="beds w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listing->bedrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">beds</p>
                </div>
                <div class="baths w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listing->bathrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">baths</p>
                </div>
                <div class="sqft w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ number_format($listing->sq_ft, 0, '.', ',') }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">sqft</p>
                </div>
            </div>
            <div class="mls text-center mt-3">
                <p class="text-grey-dark text-xs">MLS# {{ $listing->mls_account }}</p>
            </div>
        </div>

    </div>


</div>