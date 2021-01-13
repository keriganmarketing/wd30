<div class="listing-slider px-1 w-full">
    <img 
        class="w-auto h-auto min-w-full" 
        lazy="loading"
        src="{{ str_replace('http://','//', $property->preferred_image) }}"  
        data-src="{{ str_replace('http://','//', $property->preferred_image) }}"
        tabindex="0" 
        alt="Photo of {{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}"
    >
</div>
<div class="w-full">
    <property-gallery>
        @foreach($property->photos as $key => $photo)
            <!-- <transition mode="in" enter-active-class="animate__animated animate__fadeIn"> -->
                <property-photo
                    tabindex="0"
                    class="w-full sm:w-1/2 md:w-1/6 lg:w-1/4 px-1 py-1 overflow-hidden lazy-img-fadein"
                    lazy="loading"
                    :photoid="{{ $key }}"
                    photourl="{{ str_replace('http://','//', $photo->url) }}"
                    caption="Photo {{$key .' of '. count($property->photos) . ' | ' . $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }}"
                >
                </property-photo>
            <!-- </transition> -->
        @endforeach
    </property-gallery>
</div>
