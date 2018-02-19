
<h2 class="listing-page-location text-grey-darkest text-2xl mt-2 md:m-t-0">{{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}  </h2>
<h2 class="listing-page-area text-grey-darkest text-2xl">{{ $property->city }}, {{ $property->state }}</h2>
<h3 class="listing-page-price text-5xl text-secondary-light">${{ number_format($property->price) }}</h3>
<p class="text-grey-darkest pt-4 leading-normal">{{ $property->description }}</p>