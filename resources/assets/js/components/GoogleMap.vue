<template>
    <div class="google-map w-full h-full" ref="map">
        <div
            ref="directionsButton"
            class="w-1/5 p-4 flex border-white justify-center items-center rounded absolute z-99 bg-brand-light text-lg rounded text-white text-center"
            @click="getDirections"
        >
            GET DIRECTIONS
        </div>
        <div
            ref="directionsPanel"
            class="w-full h-full bg-white z-99 relative text-black pl-2 relative absolute overflow-auto"
            v-html="directionsPanel"
        />
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
            directionsPanel: ''
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
            let directions = new GoogleMap(config)
                .getDirections(locations, this.renderedMap, this.$refs.directionsButton, this.$refs.directionsPanel);
            console.log(directions);
        }
    }
}
</script>