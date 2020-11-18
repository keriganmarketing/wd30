<template>
    <div>
        <div class="w-full sm:w-1/6 border-right h-auto md:h-10 overflow-hidden">
            <div class="flex h-auto md:h-10 justify-start items-center bg-grey-lighter rounded-t sm:rounded-t-none sm:rounded-l">
                <span class="flex-grow h-auto py-2 px-3 text-grey-darker" >Status</span>
            </div>
        </div>
        <div class="w-full sm:w-auto flex-grow p-0 m-0">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-center flex-wrap px-2">
                <label 
                    @keydown.enter="set('active')"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap" 
                    tabindex="0">
                    <input type="checkbox" name="active" class="radio-input" v-model="active" tabindex="-1">
                    <span class="input-description checkbox px-1 text-grey-darker">Active</span>
                    <span class="custom-input checkmark"></span>
                </label>
                <label 
                    @keydown.enter="set('sold')"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap" 
                    tabindex="0">
                    <input type="checkbox" name="sold" class="radio-input" v-model="sold" tabindex="-1">
                    <span class="input-description checkbox px-1 text-grey-darker">Sold</span>
                    <span class="custom-input checkmark"></span>
                </label>
                <label 
                    @keydown.enter="set('pending')"
                    class="custom-input-container h-auto md:h-10 flex items-center justify-center flex-wrap" 
                    tabindex="0">
                    <input type="checkbox" name="pending" class="radio-input" v-model="pending" tabindex="-1">
                    <span class="input-description checkbox px-1 text-grey-darker">Pending</span>
                    <span class="custom-input checkmark"></span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            searchTerms: {
                type: Object,
                default: this.searchTerms
            }
        },
        data () {
            return {
                status: this.searchTerms.status,
                active: false,
                sold: false,
                pending: false,
            }
        },
        mounted () {
            this.status.forEach(key => {
                this[key] = true;
            });
        },
        methods: {
            set(key){
                this[key] = !this[key]
            }
        }
    }
</script>