<template>
    <div class="container flex flex-wrap justify-center items-center">
        <div class="w-full text-center text-white text-xl p-4 mb-8">
            Here is where you can see your properties' analytics data from
            <br>
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
    props: {
        user: {
            type: Object,
            default: () => {}
        }
    },
    data () {
        return {
            properties: [],
            loading: false
        }
    },
    mounted () {
        this.loading = true;
        window.axios.get('my-properties')
            .then(response => {
                this.properties = response.data;
                this.loading = false;
            });
    }
}
</script>
