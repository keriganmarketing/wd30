<template>
    <div class="relative flex flex-col min-h-64">
        <div ref="map" class="google-map w-full h-64" >
            <div
                    ref="directionsButton"
                    class="font-brand w-auto px-4 py-2 cursor-pointer border-white justify-center items-center rounded absolute z-99 bg-brand-light text-2xl rounded text-white text-center"
                    :class="{'hidden': showDirections}"
                    @click="getUserLocation"
            >
                GET DIRECTIONS
            </div>
        </div>
        <div
                ref="directionsPanel"
                class="w-full bg-white text-brand-darket p-8 overflow-auto h-auto overflow-y-scroll"
                :class="{'hidden': !showDirections}"
        >
            <a class="font-brand w-auto px-4 py-2 cursor-pointer border-white justify-center items-center rounded bg-brand-light text-2xl rounded text-white text-center" @click="closeDirections">CLOSE DIRECTIONS</a>
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
            showDirections: false,
            config: {}
        }
    },
    mounted() {
        this.config = {
            zoom:    this.zoom,
            origin:  {}, //we don't know this yet
            mapElement: this.$refs.map,
            destination: {
                latitude: this.latitude,
                longitude: this.longitude
            },
            directionsButton: this.$refs.directionsButton,
            directionsPanel: this.$refs.directionsPanel
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
        },
        getUserLocation(){
            let vm = this;
            let geo = new GeoLocator();
            geo.getLocation()
                .then(position => {
                    vm.config.origin = position;
                    vm.openDirections();
                })
                .catch(error => {
                    vm.error = error.message;
                })
        },
        openDirections() {
            this.showDirections = true;

            if(this.config.origin !== null) {
                let vm = this;
                let locations = {
                    origin: vm.config.origin,
                    destination: vm.config.destination,
                };
                new GoogleMap(vm.config)
                    .getDirections(locations, this.renderedMap, this.$refs.directionsButton, this.$refs.directionsPanel);
            }
        },
        closeDirections(){
            this.showDirections = false;
            this.renderMap();
        }
    }
}
</script>