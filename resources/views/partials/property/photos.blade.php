
<div class="listing-left w-full md:w-2/5">
    <div class="listing-slider px-1">
        <img class="w-auto h-auto min-h-full min-w-full" src="{{ $property->preferred_image }}" >
    </div>
    <property-gallery>
        @foreach($property->photos as $key => $photo)
            <property-photo
                class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-1 py-1 overflow-hidden"
                :photoid="{{ $key }}"
                photourl="{{ $photo->url }}"
            >
            </property-photo>
        @endforeach
    </property-gallery>
</div>