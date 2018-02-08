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