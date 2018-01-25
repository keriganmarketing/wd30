<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2" >
    <div class="property relative bg-white shadow-md md:rounded overflow-hidden">
        <a href="#" class="absolute pin hover:shadow-inner" ></a>
        <div class="property-image md:h-48 md:overflow-hidden">
            <img class="w-auto h-auto min-h-full min-w-full" src="{{ $listings[$i]->preferred_image }}" >
        </div>
        <div class="property-details py-2 px-2">
            <div class="address">
                <p class="py-2 text-grey-darkest text-center">{{ $listings[$i]->full_address }}</p>
            </div>
            <div class="price">
                <p class="py-2 font-bold text-center text-brand text-2xl">${{ $listings[$i]->price }}</p>
            </div>
            <div class="attributes flex text-center py-2">
                <div class="beds w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listings[$i]->bedrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">beds</p>
                </div>
                <div class="baths w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listings[$i]->bathrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">baths</p>
                </div>
                <div class="sqft w-1/3">
                    <div class="icon">

                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listings[$i]->sq_ft }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">sqft</p>
                </div>
            </div>
            <div class="mls text-center mt-3">
                <p class="text-grey-dark text-xs">MLS# {{ $listings[$i]->mls_account }}</p>
            </div>
        </div>

    </div>


</div>