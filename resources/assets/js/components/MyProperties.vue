<template>
<section id="featured-listings" class="featured-listings py-8 lg:py-16 xl:py-24">
    <div class="container mx-auto py-2">
        <div v-if="listings.length > 0">
            <h2 class="text-brand-dark text-center pb-4">My Listings</h2>
            <div class="flex flex-wrap items-center justify-center">
                <my-property
                    v-for="listing in listings"
                    :key="listing.id"
                    :listing="listing"
                    @featured-property-added="add"
                    @featured-property-removed="remove"
                >

                </my-property>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
    data () {
        return {
            listings: [],
            featured: []
        }
    },
    methods: {
        getFeaturedProperties() {
            axios.get('/featuredproperties')
                .then(response => {
                    this.featured = response.data;
                });
        },
        getAllProperties() {
            axios.get('/mylistings')
                .then(response => {
                    this.listings = response.data;
            });
        },
        add(mlsNumber) {
            this.getFeaturedProperties();
        },
        remove(mlsNumber) {
            this.getFeaturedProperties();
        }
    },
    mounted() {
        this.getAllProperties();
        this.getFeaturedProperties();
    }
}
</script>
