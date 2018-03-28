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
            <sortbar
                :data-from="searchResults.from"
                :data-to="searchResults.to"
                :data-total="searchResults.total"
                v-on:new-sort="onSort"
            />
            <vue-progress-bar></vue-progress-bar>
            <property-search-results
                :searchResults="searchResults"
                :fetchingProperties="fetchingProperties"
            />
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
import VueProgressBar from '../../../../node_modules/vue-progressbar';
import SearchResults from '../models/search-results';
export default {
    props: {
        dataMapModule: {
            type: Boolean,
            default: this.dataMapModule
        },
        initialSearchTerms: {
            type: Object,
            default: this.initialSearchTerms
        },
        initialSearchResults: {
            type: Object,
            default: this.initialSearchResults
        }
    },
    data () {
        return {
            hasMapModule: false,
            mapView: false,
            fetchingProperties: false,
            searchTerms: {
                omni: 'Panama City Beach',
                propertyType: 'Single Family Home',
                minPrice: '200000',
                maxPrice: '',
                sq_ft: '',
                acreage: '',
                status: ['active'],
                bedrooms: '3',
                bathrooms: '2',
                openHouses: 0,
                waterFront: 1,
                pool: 0,
                sortBy: 'date_modified',
                orderBy: 'DESC'
            },
            searchResults: new SearchResults()
        }
    },
    created () {
        this.getMapAvailability();
        this.searchTerms = this.initialSearchTerms != '' ? this.initialSearchTerms : this.searchTerms;
        this.searchTerms.status = ['active'];
        this.searchResults = this.initialSearchResults;
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
            this.searchTerms.pool         = form.pool.checked       ? 1: 0;
            this.searchTerms.status       = [];
            this.searchTerms.sortBy       = '',
            this.searchTerms.orderBy      = ''

            if (form.active.checked) {
                this.searchTerms.status.push('active');
            }
            if (form.sold.checked) {
                this.searchTerms.status.push('sold');
            }
            if (form.pending.checked) {
                this.searchTerms.status.push('pending');
            }
            this.$Progress.start();
            this.getProperties(this.searchTerms);
            this.$Progress.finish();

        },
        getProperties (searchTerms, sortBy = 'date_modified', orderBy = 'DESC') {

            // this can be an array, so we need to stringify it before building the query string
            searchTerms.sortBy  = sortBy;
            searchTerms.orderBy = orderBy;
            searchTerms.status  = Array.isArray(searchTerms.status) ? searchTerms.status.join('|') : searchTerms.status;

            let queryString     = this.buildQueryString(searchTerms);
            // alert(queryString);

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
                if (i < (Object.keys(searchTerms).length)) {
                    queryString += '&';
                }
            });

            return queryString;
        },
        onSort(sortBy, orderBy) {
            this.$Progress.start();
            this.getProperties(this.searchTerms, sortBy, orderBy);
            this.$Progress.finish();
        },
        onViewChange (viewingMap) {
            this.mapView = viewingMap;
        }
    }
}
</script>
