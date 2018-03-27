<template>
<div>
    <section class="flex hero lg:h-16 bg-brand-darker py-4 bg-image-full" style="background-image: url('https://beachybeach.com/wp-content/themes/kmaidx/img/beachy-illustration.jpg')">
        <div class="container mx-auto text-center md:text-left">
            <h1 class="text-white">Property Search</h1>
        </div>
    </section>
    <search-bar
        :data-map-module="hasMapModule"
        :searchTerms="searchTerms"
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
            <property-search-results
                :searchResults="searchResults"
            >
            </property-search-results>
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
import SearchResults from '../models/search-results';
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
                omni: 'Panama City Beach',
                propertyType: 'Single Family Home',
                minPrice: '200000',
                maxPrice: '',
                sq_ft: '',
                acreage: '',
                status: ['active'],
                bedrooms: 3,
                bathrooms: 2,
                openHouses: 0,
                waterFront: 1,
                pool: 0
            },
            searchResults: new SearchResults({
                pagination: {
                    from: null,
                    to: null,
                    total: null,
                    last_page: 0,
                    first_page_url: '',
                    prev_page_url: '',
                    next_page_url: '',
                    last_page_url: '',
                    current_page: 0,
                    per_page: 0
                },
                properties: []
            })
        }
    },
    mounted () {
        this.getMapAvailability();
        this.getProperties(this.searchTerms);
    },
    methods: {
        getMapAvailability () {
            axios.get('/modules/map')
                 .then(response => {
                     this.hasMapModule = response.data;
                })
                 .catch(() => {
                     this.hasMapModule = false;
                 })
        },
        onSubmit (form) {
            // TODO: Clean this with a loop
            this.searchTerms.omni         = form.omni.value;
            this.searchTerms.propertyType = form.propertyType.value;
            this.searchTerms.minPrice     = form.minPrice.value;
            this.searchTerms.maxPrice     = form.maxPrice.value;
            this.searchTerms.bedrooms     = form.bedrooms.value;
            this.searchTerms.bathrooms    = form.bathrooms.value;
            this.searchTerms.sq_ft        = form.sq_ft.value;
            this.searchTerms.acreage      = form.acreage.value;
            this.searchTerms.openHouses   = form.openHouses.checked ? 1: 0;
            this.searchTerms.waterFront   = form.waterFront.checked ? 1: 0;
            this.searchTerms.pool         = form.pool.checked ? 1:       0;
            this.searchTerms.status       = [];
            if (form.active.checked) {
                this.searchTerms.status.push('active');
            }
            if (form.sold.checked) {
                this.searchTerms.status.push('sold');
            }
            if (form.pending.checked) {
                this.searchTerms.status.push('pending');
            }
            this.getProperties(this.searchTerms);

        },
        getProperties (searchTerms) {
            // this can be an array, so we need to stringify it before building the query string
            searchTerms.status = searchTerms.status.join('|');
            //
            let queryString = this.buildQueryString(searchTerms);
            window.axios.get('/search' + queryString)
                .then(response => {
                    this.searchResults = new SearchResults(response.data);
                });
        },
        buildQueryString(searchTerms) {
            // loop through searchTerms object and build a url query string from it
            let queryString = '?';
            let i = 0;
            Object.keys(searchTerms).forEach(key => {
                queryString += key + '=' + searchTerms[key];
                i++;
                if (i < (Object.keys(searchTerms).length - 1 )) {
                    queryString += '&';
                }
            });

            return queryString;
        },
        onViewChange (viewingMap) {
            this.mapView = viewingMap;
        }
    }
}
</script>
