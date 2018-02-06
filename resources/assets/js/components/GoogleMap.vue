<template>
    <div class="google-map w-full h-full" ref="map" />
</template>

<script>
import GoogleMapsLoader from 'google-maps';
import { loadMap } from '../google-maps.service.js';
export default {
    props: {
        name: {
            type: String,
            default: this.name
        },
        latitude: {
            type: Number,
            default: 0
        },
        longitude: {
            type: Number,
            default: 0
        },
        zoom: {
            type: Number,
            default: 100
        }
    },
    mounted () {
        let config = {
            element: this.$refs.map,
            zoom: this.zoom,
            lat: this.latitude,
            long: this.longitude
        };
        loadMap(config);
    }
}
</script>