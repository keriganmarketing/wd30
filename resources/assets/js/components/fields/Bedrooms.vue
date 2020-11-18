<template>
    <div>
        <div class="w-full sm:w-1/6 border-right h-auto md:h-10 overflow-hidden">
            <div class="flex h-auto md:h-10 justify-start items-center bg-grey-lighter rounded-t sm:rounded-t-none sm:rounded-l">
                <span class="flex-grow h-auto py-2 px-3 text-grey-darker">Beds</span>
            </div>
        </div>
        <div class="w-full sm:w-auto flex-grow p-0 m-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-center flex-wrap px-2">
                <label 
                    @keydown.enter="set('')"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value=""
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">Any</span>
                    <span class="custom-input radio"></span>
                </label>
                <label 
                    @keydown.enter="set(1)"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value="1"
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">1+</span>
                    <span class="custom-input radio"></span>
                </label>
                <label 
                    @keydown.enter="set(2)"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value="2"
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">2+</span>
                    <span class="custom-input radio"></span>
                </label>
                <label 
                    @keydown.enter="set(3)"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value="3"
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">3+</span>
                    <span class="custom-input radio"></span>
                </label>
                <label 
                    @keydown.enter="set(4)"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value="4"
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">4+</span>
                    <span class="custom-input radio"></span>
                </label>
                <label 
                    @keydown.enter="set(5)"
                    tabindex="0"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap">
                    <input
                            type="radio"
                            name="bedrooms"
                            value="5"
                            class="radio-input"
                            v-model="bedrooms"
                            tabindex="-1"
                    >
                    <span class="radio-description px-1 text-grey-darker">5+</span>
                    <span class="custom-input radio"></span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            fieldValue: {
                type: String,
                default: this.fieldValue
            }
        },
        data() {
            return {
                bedrooms: this.fieldValue
            }
        },
        methods: {
            set(val){
                this.bedrooms = val
            }
        }
    }
</script>