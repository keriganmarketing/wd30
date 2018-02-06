import GoogleMapsLoader from 'google-maps';

function loadMap(config) {
    GoogleMapsLoader.KEY = 'AIzaSyCRXeRhZCIYcKhtc-rfHCejAJsEW9rYtt4';
    GoogleMapsLoader.load(google => {
        let map = new google.maps.Map(config.element, {
            zoom: config.zoom,
            center: new google.maps.LatLng(config.lat, config.long),
            disableDefaultUI: true,
            zoomControl: true,
            scaleControl: true
        });
        let position = map.center;
        let marker = new google.maps.Marker({
            position,
            map
        });
    });
}

export { loadMap };