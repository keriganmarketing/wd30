<h2 class="mt-6 text-grey-darkest mx-1"  tabindex="0">Property Features</h2>
<table class="border-b-2 border-secondary-light mx-1 my-4 mb-1 shadow flex flex-col text-left text-grey-darkest"  tabindex="0">
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">MLS#</td><td class="w-1/2 p-2">{{ $property->mls_account }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Status</td><td class="w-1/2 p-2">{{ $property->status }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Property Type</td><td class="w-1/2 p-2">{{ $property->property_type }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Bedrooms</td><td class="w-1/2 p-2">{{ $property->bedrooms }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Bathrooms</td><td class="w-1/2 p-2">{{ $property->bathrooms }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">H/C Sqft</td><td class="w-1/2 p-2">{{ $property->sq_ft }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Year Built</td><td class="w-1/2 p-2">{{ $property->year_built }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Stories</td><td class="w-1/2 p-2">{{ $property->stories }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Lot Size (Acres)</td><td class="w-1/2 p-2">{{ $property->acreage }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Lot Dimensions</td><td class="w-1/2 p-2">{{ $property->lot_dimensions }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Taxes in {{ $property->last_tax_year }}</td><td class="w-1/2 p-2">${{ number_format($property->last_taxes) }}</td></tr>
</table>