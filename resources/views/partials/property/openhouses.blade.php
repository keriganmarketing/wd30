
<h2 class="mt-6 text-grey-darkest mx-1" tabindex="0">Upcoming Open Houses</h2>
<div class="flex flex-wrap my-2">
    @foreach($openHouses as $openHouse)
        <div class="w-full md:w-auto p-1" >
            <div class="card border-secondary-light border-b-2 shadow">
                <div class="card-block p-2" tabindex="0">
                    <p class="card-text text-grey-darkest py-2"><strong>Date: </strong> {{ $openHouse['start_date'] }}<br>
                        <strong>Time: </strong> {{ $openHouse['start_time'] }} - {{ $openHouse['end_time'] }}</p>
                    <a target="_blank" href="https://www.google.com/maps/place/{{ $property->street_number }} {{ $property->street_name }} {{ $property->street_suffix }} {{ $property->city }}, {{ $property->state }}" class="button button-brand text-xs">Get Directions</a>
                </div>
            </div>
        </div>
    @endforeach
</div>