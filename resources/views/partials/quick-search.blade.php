<div class="md:max-w-md mx-auto my-auto">
    <form class="bg-white shadow-md md:rounded px-8 pt-6 pb-8 align-top flex flex-wrap" action="/property-search" method="GET">
        {{ csrf_field() }}
        <div class="flex-auto relative px-2 py-2 w-full sm:w-full md:w-3/5">
            <input class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 py-2 px-3" name="omniField" type="text" placeholder="City, address, subdivision or zip" >
        </div>
        <div class="flex-auto relative px-2 py-2 w-full sm:w-1/3 md:w-2/5">
            <select name="propertyType" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 px-3 py-2 pr-8">
                <option>Property Type</option>
                <option>Single Family Home</option>
                <option>Condo / Townhome</option>
                <option>Commercial</option>
                <option>Lots / Land</option>
                <option>Multi-Family Home</option>
                <option>Rental</option>
                <option>Manufactured</option>
                <option>Farms / Agricultural</option>
                <option>Other</option>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="fill-current h-4 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="flex-auto relative px-2 py-2 w-full sm:w-1/3 md:w-2/5">
            <select name="minPrice" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 px-3 py-2 pr-8">
                <option>Min-price</option>
                <option value=100000>$100,000</option>
                <option value=200000>$200,000</option>
                <option value=300000>$300,000</option>
                <option value=400000>$400,000</option>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="fill-current h-4 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="flex-auto relative px-2 py-2 w-full sm:w-1/3 md:w-2/5">
            <select name="maxPrice" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 px-3 py-2 pr-8">
                <option>Max-price</option>
                <option value=200000>$200,000</option>
                <option value=300000>$300,000</option>
                <option value=400000>$400,000</option>
                <option value=500000>$500,000</option>
            </select>
            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="fill-current h-4 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        <div class="flex-auto px-2 py-2 xs:w-full w-full md:w-1/5">
            <button class="button-brand w-full h-10" type="submit" >Submit</button>
        </div>
    </form>
</div>
