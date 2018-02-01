<template>
    <div>
        <div class="w-full sm:w-1/6 py-2 px-3 text-grey-darker border-right bg-grey-lighter rounded-t sm:rounded-l">Features</div>
        <div class="w-full sm:w-auto flex-grow p-0 m-0">
            <div class="flex align-middle justify-center">
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="status[]" value="active" class="radio-input" >
                    <span class="radio-description">Active</span>
                </label>
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="status[]" value="sold" class="radio-input" >
                    <span class="radio-description">Sold</span>
                </label>
                <label class="py-2 px-3 h-auto">
                    <input type="checkbox" name="status[]" value="panding" class="radio-input" >
                    <span class="radio-description">Pending</span>
                </label>
            </div>
        </div>
    </div>
</template>