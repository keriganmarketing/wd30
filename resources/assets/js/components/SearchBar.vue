<template>
    <div class="search-bar">
        <div class="container mx-auto">
            <form class="flex flex-wrap py-4 my-4" action="/property-search" method="GET">
                <omni-bar class="flex-auto relative px-2 py-2 w-full sm:w-3/5 md:w-1/2"></omni-bar>
                <div class="flex-auto relative px-2 py-2 flex-grow">
                    <select name="propertyType" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 px-3 py-2 pr-8">
                        <option value="">Property Type</option>
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
                <div class="flex-auto relative px-2 py-2 w-full text-right w-full sm:w-auto">
                    <button class="button-brand h-10 block w-full" >Advanced</button>
                </div>
                <div :class="['advanced-menu','hidden', { 'block': advancedOpen }]" >

                </div>
                <div class="flex-auto relative px-2 py-2 w-full text-right w-full sm:w-auto">
                    <button class="button-brand h-10 block w-full" type="submit" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'advancedOpen': false
        }
    }
</script>