import GoogleMapsLoader from 'google-maps';
import GeoLocator from './geolocator.service';
import MarkerClusterer from 'marker-clusterer-plus';

export default class GoogleMap {
    constructor (config, pins) {
        this.config = config;
        this.map = {};
        this.apiKey = 'AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4';
        this.pins = pins;
    }
    load () {
        return new Promise((resolve, reject = null) => {
            resolve(this.render());
        });
    }
    render() {
        GoogleMapsLoader.KEY = this.apiKey;
        let config = this.config;
        let mapData = this.map;
        let pins = this.pins;
        GoogleMapsLoader.load(google => {
            mapData.map = new google.maps.Map(config.mapElement, {
                zoom: config.zoom,
                center: new google.maps.LatLng(config.destination.latitude, config.destination.longitude),
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true,
                maxZoom: 18
            });

            let control = config.directionsButton;
            mapData.map.controls[google.maps.ControlPosition.TOP_LEFT].push(control);
            mapData.bounds = new google.maps.LatLngBounds(mapData.position);
            mapData.markers = [];
            console.log(pins);
            for (let i = 0; i < pins.length; i++) {
                let obj = pins[i];
                let position = new google.maps.LatLng(obj.latitude,obj.longitude);
                let marker = new google.maps.Marker({
                    position: position,
                    map: mapData.map,
                    pin: 'http://mt.googleapis.com/vt/icon/name=icons/spotlight/spotlight-poi.png&scale=1'
                });

                mapData.markers.push(marker);
                mapData.bounds.extend(position);
                mapData.map.fitBounds(mapData.bounds);
            }

            window.map = mapData.map;

            mapData.markerCluster = new MarkerClusterer(window.map, mapData.markers, {
                maxZoom: 14,
                gridSize: 60
            })
        });

        return this.map;
    }
    getDirections(locations, mapData, button, panel) {
        GoogleMapsLoader.KEY = this.apiKey;
        GoogleMapsLoader.load(google => {
            let directionsDisplay = new google.maps.DirectionsRenderer({
                origin: new google.maps.LatLng(locations.origin.latitude, locations.origin.longitude),
                destination: new google.maps.LatLng(locations.destination.latitude, locations.destination.longitude),
                travelMode: 'DRIVING',
            });

            mapData.bounds.extend(directionsDisplay.destination);

            let directionsService = new google.maps.DirectionsService;
            directionsDisplay.setPanel(panel);
            directionsService.route({
                origin: directionsDisplay.origin,
                destination: directionsDisplay.destination,
                travelMode: 'DRIVING'
            }, function (response, status) {
                if (status === 'OK') {
                    return directionsDisplay.setDirections(response);
                } else {
                    return window.alert('Directions request failed due to ' + status)
                }
            });
            mapData.map.fitBounds(mapData.bounds);
            directionsDisplay.setMap(mapData.map);
        });
    }
}