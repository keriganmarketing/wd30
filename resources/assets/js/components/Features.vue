<template>
    <div>
        <div class="w-full sm:w-1/6 py-2 px-3 text-grey-darker border-right bg-grey-lighter rounded-t sm:rounded-l">Features</div>
        <div class="w-full sm:w-auto flex-grow p-0 m-0">
            <div class="flex align-middle justify-center">
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="openHouses" value="1" class="radio-input" >
                    <span class="radio-description">Open Houses</span>
                </label>
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="waterfront" value="1" class="radio-input" >
                    <span class="radio-description">Waterfront</span>
                </label>
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="pool" value="1" class="radio-input" >
                    <span class="radio-description">Pool</span>
                </label>
            </div>
        </div>
    </div>
</template>