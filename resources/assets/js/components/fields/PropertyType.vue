<template>
    <div>
        <select name="propertyType" v-model="selected" class="block shadow appearance-none w-full border rounded text-grey-darker hover:border-grey h-10 px-3 py-2 pr-8">
            <option disabled value="">Property Type</option>
            <option>Single Family Home</option>
            <option>Condo / Townhome</option>
            <option>Commercial</option>
            <option>Lots / Land</option>
            <option>Multi-Family Home</option>
            <option>Manufactured</option>
            <option>Farms / Agricultural</option>
            <option>Other</option>
        </select>
        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="fill-current h-4 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            fieldValue: {
                type: String,
                default: 'Single Family Home'
            }
        },
        data () {
            return {
                selected: this.fieldValue
            }
        },
        mounted () {
            console.log(this.$refs.selectbox);
        }
    }
</script>