import GoogleMapsLoader from 'google-maps';
import GeoLocator from './geolocator.service';

export default class GoogleMap {
    constructor (config) {
        this.config = config;
        this.map = {};
    }
    load () {
        return new Promise((resolve, reject = null) => {
            resolve(this.render());
        });
    }
    render () {
        GoogleMapsLoader.KEY = 'AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4';
        let config = this.config;
        let mapData = this.map;
        GoogleMapsLoader.load(google => {
            mapData.map = new google.maps.Map(config.mapElement, {
                zoom: config.zoom,
                center: new google.maps.LatLng(config.destination.latitude, config.destination.longitude),
                disableDefaultUI: true,
                zoomControl: true,
                scaleControl: true
            });

            let control = config.directionsButton;
            mapData.map.controls[google.maps.ControlPosition.TOP_LEFT].push(control);

            mapData.position = mapData.map.center;
            mapData.bounds = new google.maps.LatLngBounds(mapData.position);
            mapData.marker = new google.maps.Marker({
                position: mapData.position,
                map: mapData.map
            });

            window.map = mapData.map;
        });

        return this.map;
    }
    getDirections(locations, mapData, button, panel) {
        GoogleMapsLoader.KEY = 'AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4';
        GoogleMapsLoader.load(google => {
            let directionsDisplay = new google.maps.DirectionsRenderer({
                origin: new google.maps.LatLng(locations.origin.latitude, locations.origin.longitude),
                destination: new google.maps.LatLng(locations.destination.latitude, locations.destination.longitude),
                travelMode: 'DRIVING',
            });

            mapData.bounds.extend(directionsDisplay.destination);

            let directionsService = new google.maps.DirectionsService();
            directionsDisplay.setPanel(panel);
            directionsService.route({
                origin: directionsDisplay.origin,
                destination: directionsDisplay.destination,
                travelMode: 'DRIVING'
            }, function (response, status) {
                if (status === 'OK') {
                    return directionsDisplay.setDirections(response);
                } else {
                    return window.alert('Directions request failed due to ' + status);
                }
            });
            mapData.map.fitBounds(mapData.bounds);
            directionsDisplay.setMap(mapData.map);
        });
    }
}