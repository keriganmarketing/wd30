<template>
    <div>
        <div class="grid-container">
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-center items-start min-h-full">
                    <mini-listing
                        v-for="listing in properties.data"
                        :key="listing.id"
                        :listing="listing"
                    />
                </div>
            </div>
        </div>
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
        window.axios.get('/search/')
            .then(response => {
                this.properties = response.data
            })
            .catch(error => {
                console.log(error)
            });
    }
}
</script>
