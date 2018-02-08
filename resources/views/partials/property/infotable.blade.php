
<table class="border-b-2 border-brand mx-1 shadow flex flex-col text-left text-grey-darkest">
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Waterfront</td><td class="w-1/2 p-2">{{ $property->waterfront }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Waterfront Type</td><td class="w-1/2 p-2">{{ $property->waterview_description }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Elementary School</td><td class="w-1/2 p-2">{{ $property->elementary_school }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Middle School</td><td class="w-1/2 p-2">{{ $property->middle_school }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">High School</td><td class="w-1/2 p-2">{{ $property->high_school }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Zip Code</td><td class="w-1/2 p-2">{{ $property->zip }}</td></tr>
    <tr class="bg-grey-lighter flex"><td class="w-1/2 p-2">Sub-area</td><td class="w-1/2 p-2">{{ $property->sub_area }}</td></tr>
    <tr class="flex"><td class="w-1/2 p-2">Subdivision</td><td class="w-1/2 p-2">{{ $property->subdivision }}</td></tr>
</table>