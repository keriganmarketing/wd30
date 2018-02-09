<template>
    <div class="h-full w-full relative flex flex-wrap justify-around">
        <div class="google-map w-full h-full" ref="map" :class="{'w-1/2': showDirections }">
            <div
                ref="directionsButton"
                class="font-brand w-auto px-4 py-2 cursor-pointer border-white justify-center items-center rounded absolute z-99 bg-brand-light text-2xl rounded text-white text-center"
                @click="getDirections"
            >
                GET DIRECTIONS
            </div>
        </div>
        <div
            ref="directionsPanel"
            class="w-1/2 h-auto absolute pin text-xl bg-white text-brand-darket p-8 overflow-auto"
            :class="{'hidden': !showDirections}"
        >
            <a class="font-brand w-auto px-4 py-2 cursor-pointer border-white justify-center items-center rounded bg-brand-light text-2xl rounded text-white text-center" @click="showDirections = false">CLOSE DIRECTIONS</a>
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
    data () {
        return {
            renderedMap: {},
            myPosition: {},
            error: '',
            showDirections: false
        }
    },
    mounted () {
        this.getUserLocation();
        this.renderMap();
    },
    methods: {
        getUserLocation() {
            let vm = this;
            let geo = new GeoLocator();
            geo.getLocation()
                .then(position => {
                    vm.myPosition = position;
                })
                .catch(error => {
                    vm.error = error.message;
                })
        },
        renderMap() {
            let config = {
                zoom:    this.zoom,
                origin:  this.myPosition,
                mapElement: this.$refs.map,
                destination: {
                    latitude: this.latitude,
                    longitude: this.longitude
                },
                directionsButton: this.$refs.directionsButton,
                directionsPanel: this.$refs.directionsPanel
            };
            new GoogleMap(config)
                .load()
                .then(rendered => {
                    this.renderedMap = rendered;
                });
        },
        getDirections () {
            let config = {
                zoom:    this.zoom,
                origin:  this.myPosition,
                mapElement: this.$refs.map,
                destination: {
                    latitude: this.latitude,
                    longitude: this.longitude
                },
                directionsButton: this.$refs.directionsButton,
                directionsPanel: this.$refs.directionsPanel
            };
            let locations = {
                origin: config.origin,
                destination: config.destination,
            };
            new GoogleMap(config)
                .getDirections(locations, this.renderedMap, this.$refs.directionsButton, this.$refs.directionsPanel);
            this.showDirections = true;
        }
    }
}
</script>