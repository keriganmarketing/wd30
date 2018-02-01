
<div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3 p-1 flex-grow" >
    <div class="card border-grey shadow h-full text-left">
        <div class="card-title p-2 bg-grey">
            <p class="text-white">{{ $key }}</p>
        </div>
        <div class="card-block p-2">
            <ul>
            @if(count($value > 0))
                @foreach ($value as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            @endif
            </ul>
        </div>
    </div>
</div>