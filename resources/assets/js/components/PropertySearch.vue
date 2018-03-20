<template>
<div>
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://beachybeach.com/wp-content/themes/kmaidx/img/beachy-illustration.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white">Property Search</h1>
        </div>
    </section>
    <search-bar
        :data-map-module="hasMapModule"
        v-on:view-changed="onViewChange"
        v-on:form-submitted="onSubmit"
    />
    <div v-if="! mapView" class="properties grid pb-4">
        <div class="container mx-auto">
            <!-- <sortbar
                :data-from="searchResults.pagination.from"
                :data-to="searchResults.pagination.to"
                :data-total="searchResults.pagination.total"
            /> -->
            <!-- <property-search-results> -->
            <!-- <property-pagination /> -->
        </div>
    </div>
    <!-- <div v-if="dataMapModule">
        <div v-if="mapView" >
            <map-search
                :latitude="{{ $properties->data[0]->latitude }}"
                :longitude="{{ $properties->data[0]->longitude }}"
                :data-params="{{ $searchParams }}"
                :zoom="16"
                api="{{ config('google.api_key') }}"
                class="border-b-2 border-secondary-light"
            />
        </div>
    </div> -->
</div>
</template>

<script>
export default {
    props: {
        dataMapModule: {
            type: Boolean,
            default: this.dataMapModule
        }
    },
    data () {
        return {
            hasMapModule: false,
            mapView: false,
            searchTerms: {
                omni: '',
                propertyType: '',
                minPrice: '',
                maxPrice: '',
                maxPrice: '',
                sq_ft: '',
                acreage: '',
                status: [],
                bedrooms: 0,
                bathrooms: 0,
                openHouses: false,
                waterFront: false,
                pool: false
            },
            // searchResults: new SearchResults({
            //     pagination: {
            //         from: null,
            //         to: null,
            //         total: null
            //     },
            //     properties: null
            // })
        }
    },
    mounted () {
        this.getMapAvailability();
    },
    methods: {
        getMapAvailability () {
            axios.get('/modules/map')
                 .then(response => {
                     console.log(response);
                     this.hasMapModule = response.data;
                })
                 .catch(() => {
                     this.hasMapModule = false;
                 })
        },
        onSubmit (form) {
            // console.log(form.omni.value);
            this.searchTerms.omni = form.omni.value;
            this.searchTerms.propertyType = form.propertyType.value;
            // this.searchTerms.minPrice = form.minPrice.value;
            // this.searchTerms.maxPrice = form.maxPrice.value;
            // this.searchTerms.status = form.status[].value;
            // this.searchTerms.bedrooms = form.bedrooms.value;
            // this.searchTerms.bathrooms = form.bathrooms.value;
            // this.searchTerms.sq_ft = form.sq_ft.value;
            // this.searchTerms.acreage = form.acreage.value;
            // this.searchTerms.openHouses = form.openHouses.value;
            // this.searchTerms.waterFront = form.waterFront.value;
            // this.searchTerms.pool = form.pool.value;
        },
        getProperties (searchTerms) {
            //
        },
        onViewChange (viewingMap) {
            this.mapView = viewingMap;
        }
    }
}
</script>
