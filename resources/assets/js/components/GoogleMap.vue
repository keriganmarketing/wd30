<template>
    <div class="google-map w-full h-full" :id="mapName">
        <slot />
    </div>
</template>

<script>
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
    data () {
        return {
            mapName: this.name + "-map",
            markers: [],
            pins: []
        }
    },
    mounted () {
        const element = document.getElementById(this.mapName);
        const options = {
            zoom: this.zoom,
            center: new google.maps.LatLng(this.latitude,this.longitude),
            disableDefaultUI: true,
            zoomControl: true,
            scaleControl: true
        };
        const map = new google.maps.Map(element, options);
        //const bounds = new google.maps.LatLngBounds();
        this.markers = this.$children;

        for(var i = 0; i < this.markers.length; i++){
            var pin = this.markers[i];
            this.pins.push({
                latitude: pin._data.markerCoordinates.latitude,
                longitude: pin._data.markerCoordinates.longitude,
            });

            const position = new google.maps.LatLng(pin.latitude, pin.longitude);
            const marker = new google.maps.Marker({
                position,
                map
            });

            const infowindow = new google.maps.InfoWindow({
                maxWidth: 279,
                content: pin.$refs.infowindow,
                title: pin._data.name
            });

            marker.addListener('click', () => {
                infowindow.open(map, marker);
            });
        }
    },
}
</script>