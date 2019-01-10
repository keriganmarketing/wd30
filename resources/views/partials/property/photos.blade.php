<div class="listing-slider px-1 w-full">
    <img class="w-auto h-auto min-w-full" src="{{ str_replace('http://','//', $property->preferred_image) }}" >
</div>
<div class="w-full">
    <property-gallery>
        @foreach($property->photos as $key => $photo)
            <property-photo
                class="w-full sm:w-1/2 md:w-1/6 lg:w-1/4 px-1 py-1 overflow-hidden"
                :photoid="{{ $key }}"
                photourl="{{ str_replace('http://','//', $photo->url) }}"
            >
            </property-photo>
        @endforeach
    </property-gallery>
</div>
