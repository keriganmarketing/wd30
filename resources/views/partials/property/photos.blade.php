<div class="listing-slider px-1 w-full">
    <img 
        class="w-auto h-auto min-w-full" 
        src="{{ str_replace('http://','//', $property->preferred_image) }}"  
        tabindex="0" 
        alt="Photo of {{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}"
    >
</div>
<div class="w-full">
    <property-gallery>
        @foreach($property->photos as $key => $photo)
            <property-photo
                tabindex="0"
                class="w-full sm:w-1/2 md:w-1/6 lg:w-1/4 px-1 py-1 overflow-hidden"
                :photoid="{{ $key }}"
                photourl="{{ str_replace('http://','//', $photo->url) }}"
                caption="Photo {{$key .' of '. count($property->photos) . ' | ' . $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}"
            >
            </property-photo>
        @endforeach
    </property-gallery>
</div>
