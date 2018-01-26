<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 py-2" >
    <div class="property relative bg-white shadow-md md:rounded overflow-hidden border-b-4 border-grey hover:border-brand">
        <a href="/listing/{{ $listing->mls_account }}/" class="absolute pin hover:shadow-inner" ></a>
        <div class="property-image md:h-48 md:overflow-hidden">
            @if($listing->has_open_houses)
                <div class="inline-block flag pin-b pin-l w-auto bg-brand text-white p-1 px-4 mt-2">
                    OPEN HOUSE
                </div>
            @endif
            @if($listing->status != 'Active')
                <div class="inline-block flag pin-b pin-l w-auto bg-brand text-white p-1 px-4 mt-2">
                    {{ $listing->status }}
                </div>
            @endif
            <img class="w-auto h-auto min-h-full min-w-full" src="{{ $listing->preferred_image }}" >
        </div>
        <div class="property-details py-2 px-2">
            <div class="address h-12 flex flex-col justify-center align-middle">
                <p class="py-2 text-grey-darkest text-center">{{ $listing->full_address }}</p>
            </div>
            <div class="price">
                <p class="py-2 font-bold text-center text-brand text-2xl">${{ number_format($listing->price, 0, '.', ',') }}</p>
            </div>
            <div class="attributes flex text-center justify-center py-2">
            @if($listing->bedrooms > 0 && $listing->bathrooms > 0)
                @if($listing->bedrooms > 0)
                <div class="beds w-1/3">
                    <div class="icon">
                        <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                            <rect fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" x="8.5" y="73.7" width="187" height="37.8"/>
                            <rect fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" x="108.1" y="40.8" width="71.5" height="18.9"/>
                            <rect fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" x="24.5" y="40.8" width="71.5" height="18.9"/>
                            <polyline fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="179.6,127.6 179.6,111.5 24.5,111.9 24.5,128"/>
                            <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="11.5,73.3 22.2,59.6 181.9,59.6 192.5,73.3"/>
                        </svg>
                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listing->bedrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">beds</p>
                </div>
                @endif
                @if($listing->bathrooms > 0)
                <div class="baths w-1/3">
                    <div class="icon">
                        <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                            <path fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" d="M49.9,39.5v-11h-25v30h171c0,0,0,29-15.8,46.3c-22.4,24.6-49.8,24.8-49.8,24.8H73.9c0,0-32.5-2.8-51-26.3
                                C7.7,83.9,7.2,58.5,7.2,58.5h17.8"/>
                            <polyline fill="none" class="stroke-brand" stroke-width="4" stroke-miterlimit="10" points="47.9,134.8 65.2,129.8 142.9,129.7 161.2,134.8 	"/>
                        </svg>
                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listing->bathrooms }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">baths</p>
                </div>
                @endif
                @if($listing->sq_ft > 0)
                <div class="sqft w-1/3">
                    <div class="icon">
                        <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                            <polyline fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="7.9,33.2 7.9,21.5 195.9,21.5 195.9,132.3 7.9,132.3 7.9,61.3 	"/>
                            <line fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" x1="144.9" y1="21.5" x2="144.9" y2="48.5"/>
                            <polyline fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="196.3,76.8 101.9,78.2 101.9,55.5 101.9,97.5 	"/>
                        </svg>
                    </div>
                    <p class="text-grey-darkest text-lg">{{ number_format($listing->sq_ft, 0, '.', ',') }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">sqft</p>
                </div>
                @endif
            @elseif($listing->lot_dimensions != '' && $listing->acreage > 0)
                @if($listing->lot_dimensions != '')
                <div class="lot-dimensions w-1/3">
                    <div class="icon">
                        <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                            <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="142.9,37.9 101.3,69.5 59.7,37.9 101.3,6.3 	"/>
                            <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="89.5,78.3 47.9,109.8 6.3,78.3 47.9,46.7 	"/>
                            <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="196.3,78.3 154.7,109.8 113.1,78.3 154.7,46.7 	"/>
                            <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="142.9,118.6 101.3,150.2 59.7,118.6 101.3,87 	"/>
                        </svg>
                    </div>
                    <p class="text-grey-darkest text-lg">{{ $listing->lot_dimensions }}</p>
                    <p class="text-grey-dark text-xs text-uppercase">lot size</p>
                </div>
                @endif
                @if($listing->acreage > 0)
                    <div class="acres w-1/3">
                        <div class="icon">
                            <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                                <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="44.4,25 15.7,62.5 29.9,62.5 10.2,101.5 27.9,101.5 7.4,137.5 97.9,137.5 72.9,100.5 92.9,100.5 61.9,61.5 77.9,61.5 	"/>
                                <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="84.5,6.5 60,41.6 68.6,51.3 77.9,61.5 61.9,61.5 92.9,100.5 72.9,100.5 97.9,137.5 101.5,137.5 119.9,98.5 102.2,98.5 121.9,50.5 107.7,50.5 112,42 	"/>
                                <polygon fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="136.4,7.5 107.7,50.5 121.9,50.5 102.2,98.5 119.9,98.5 99.4,144.5 189.9,143.5 164.9,97.5 184.9,97.5 153.9,48.5 169.9,48.5 	"/>
                            </svg>
                        </div>
                        <p class="text-grey-darkest text-lg">{{ $listing->acreage }}</p>
                        <p class="text-grey-dark text-xs text-uppercase">acres</p>
                    </div>
                @endif
            @else
                @if($listing->sq_ft > 0)
                    <div class="sqft w-1/3">
                        <div class="icon">
                            <svg class="h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 203.2 156.3" style="enable-background:new 0 0 203.2 156.3;" xml:space="preserve">
                                <polyline fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="7.9,33.2 7.9,21.5 195.9,21.5 195.9,132.3 7.9,132.3 7.9,61.3 	"/>
                                <line fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" x1="144.9" y1="21.5" x2="144.9" y2="48.5"/>
                                <polyline fill="none" class="text-brand stroke-current" stroke-width="4" stroke-miterlimit="10" points="196.3,76.8 101.9,78.2 101.9,55.5 101.9,97.5 	"/>
                            </svg>
                        </div>
                        <p class="text-grey-darkest text-lg">{{ number_format($listing->sq_ft, 0, '.', ',') }}</p>
                        <p class="text-grey-dark text-xs text-uppercase">sqft</p>
                    </div>
                @endif
            @endif
            </div>
            <div class="mls text-center mt-3">
                <p class="text-grey-dark text-xs">MLS# {{ $listing->mls_account }}</p>
            </div>
        </div>

    </div>


</div>