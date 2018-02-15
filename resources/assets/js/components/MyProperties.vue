<template>
    <div class="container flex flex-wrap justify-center items-start min-h-full">
        <div class="w-full text-center text-white text-xl p-4 bg-brand mb-4">
            Here is where you can see your properties' analytics data from
            Kerigan Marketing Associate's entire real estate network.
        </div>
        <my-property
            v-for="listing in properties"
            :key="listing.id"
            :listing="listing"
        />
    </div>
</template>
<script>
export default {
    data () {
        return {
            properties: []
        }
    },
    mounted () {
        window.axios.get('/my-properties')
            .then(response => {
                this.properties = response.data
            });
    }
}
</script>
