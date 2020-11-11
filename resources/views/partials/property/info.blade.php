
<h2 class="listing-page-location text-grey-darkest text-2xl mt-2 md:m-t-0" tabindex="0">{{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}
<span class="listing-page-area">{{ $property->city }}, {{ $property->state }}</span></h2>
<h3 class="listing-page-price text-5xl text-secondary"  tabindex="0">${{ number_format($property->price) }}</h3>
<p class="text-grey-darkest pt-4 leading-normal"  tabindex="0">{{ $property->description }}</p>