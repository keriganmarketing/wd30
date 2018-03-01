<template>
    <div>
        <div class="relative flex flex-col md:flex-row min-h-64">
            <div class="z-20 flex justify-center items-center bg-white opacity-75"
                 :class="{
                 'hidden': !isLoading,
                 'absolute': isLoading,
                 'pin': isLoading
            }">
                <ring-loader :loading="isLoading" :color="'bg-brand'" :size="'150px'"></ring-loader>
            </div>
            <div ref="map" class="relative w-full flex-grow md:w-3/4 h-64 z-10" ></div>
            <div v-if="propOpen" class="prop-panel relative w-full md:w-1/4 h-64 z-10 bg-white">
                [property info here]
            </div>
        </div>
    </div>
</template>

<script>
import GeoLocator from '../services/geolocator.service.js';
import GoogleMap from '../services/google-maps.service.js';
export default {
    props: {
        latitude: {
            type: Number,
            default: this.latitude
        },
        longitude: {
            type: Number,
            default: this.longitude
        },
        zoom: {
            type: Number,
            default: this.zoom
        }
    },
    data() {
        return {
            renderedMap: {},
            error: '',
            config: {},
            isLoading: false,
            propOpen: false,
            properties: []
        }
    },
    mounted() {
        window.axios.get('/map-search/')
            .then(response => {
                this.properties = response.data
            })
            .catch(error => {
                console.log(error)
            });
        this.config = {
            zoom:    this.zoom,
            destination: {
                latitude: this.latitude,
                longitude: this.longitude
            },
            mapElement: this.$refs.map
        };
        this.renderMap();
    },
    methods: {
        renderMap() {
            let vm = this;
            new GoogleMap(vm.config)
                .load()
                .then(rendered => {
                    this.renderedMap = rendered;
                });
        }
    }
}
</script>