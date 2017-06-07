function initMap() {

    var LatLng = {lat: 49.06577436, lng: 31.405442};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: LatLng
    });
    var marker, markerFindePosition;
    var markers = [];

    var image = {
        url: '../img/mark.png',
        scaledSize: new google.maps.Size(45, 45)
    };

    markerFindePosition = new google.maps.Marker({
        map: map
    });

    for (var x in infoMarkers) {
        var stations = infoMarkers[x];
        var location = new google.maps.LatLng(stations.lat, stations.lng);
        marker = new google.maps.Marker({
            position: location,
            icon: image,
            map: map
        });
        var fuels = '';

        if (stations.fuels != undefined) {
            for (var z in stations.fuels) {
                fuels += '<tr class="tHead"><th>' + stations.fuels[z].name_ru + '</th></tr>' +
                    '<tr class="info_row">' +
                    '<td>' + stations.fuels[z].price + '</td>';
            }
        }

        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h2 id="firstHeading" class="firstHeading"> ' + stations.city + '</h2>' +
            '<h3 id="firstHeading" class="firstHeading"> ' + stations.address + '</h3>' +
            '<div id="bodyContent">' +
            '</div>' +
            '</div>' +
            '<div class="panel-body">' +
            '<table class="table table-hover table-bordered table-condensed">' +
            ' ' + fuels + ' ' +
            '</table>' +
            '</div>';

        markers.push(marker);
        markerInfoWindows(marker, markers, map, contentString);
    }

    // Проложить маршрут

    var origin_place_id = null;
    var destination_place_id = null;
    var travel_mode = google.maps.TravelMode.DRIVING;

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map);

    var origin_input = document.getElementById('startWay');
    var destination_input = document.getElementById('endWay');

    var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
    origin_autocomplete.bindTo('bounds', map);
    var destination_autocomplete =
        new google.maps.places.Autocomplete(destination_input);
    destination_autocomplete.bindTo('bounds', map);


    function expandViewportToFitPlace(map, place) {
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
    }

    origin_autocomplete.addListener('place_changed', function () {
        var place = origin_autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
        expandViewportToFitPlace(map, place);

        // If the place has a geometry, store its place ID and route if we have
        // the other place ID
        origin_place_id = place.place_id;
        route(origin_place_id, destination_place_id, travel_mode,
            directionsService, directionsDisplay);
    });

    destination_autocomplete.addListener('place_changed', function () {
        var place = destination_autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
        expandViewportToFitPlace(map, place);

        // If the place has a geometry, store its place ID and route if we have
        // the other place ID
        destination_place_id = place.place_id;
        route(origin_place_id, destination_place_id, travel_mode,
            directionsService, directionsDisplay);
    });

    function route(origin_place_id, destination_place_id, travel_mode,
                   directionsService, directionsDisplay) {
        if (!origin_place_id || !destination_place_id) {
            return;
        }
        directionsService.route({
            origin: {'placeId': origin_place_id},
            destination: {'placeId': destination_place_id},
            travelMode: travel_mode
        }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    };

// Поиск местонахождения (GeolocationControl, geolocate)

    function GeolocationControl() {
        var getButton = document.getElementById('location');
        google.maps.event.addDomListener(getButton, 'click', geolocate);
    };

    function geolocate() {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                map.setZoom(12);
                markerFindePosition.setPosition(pos);
            });
        } else {
            alert('The Geolocation service failed.');
        }
    };
    GeolocationControl();
    //GeolocationWay();

}

function markerInfoWindows(marker, markers, map, contentString) {

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 500
    });

    marker.addListener('click', function () {
        markers.forEach(function (marker) {
            infowindow.close(marker.get('map'), marker);
        });

        infowindow.open(marker.get('map'), marker);
    });

    // Инфовиндоу меток при клике на карту пропадают
    map.addListener('click', function () {
        infowindow.close();
    });
}