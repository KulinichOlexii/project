function initAutocomplete() {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 49.06577436, lng: 31.405442},
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // Create the search box and link it to the UI element.

    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.

    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    var marker;

    if ($('#lat').val() != '' && $('#lng').val()) {
        var image = {
            url: 'http://colibri.datamaster.com.ua/public/img/mark.png',
            scaledSize: new google.maps.Size(45, 45)
        };
        marker = new google.maps.Marker({
            map: map,
            icon: image,
            draggable: true,
            position: {
                lat: lat,
                lng: lng
            }
        });

        // Lat and Lng input.
        marker.addListener('drag', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        markers.push(marker);
    }

    // [START region_getplaces]
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.

    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.

        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];


        // For each place, get the icon, name and location.

        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.

            var image = {
                url: 'http://colibri.datamaster.com.ua/public/img/mark.png',
                scaledSize: new google.maps.Size(45, 45)
            };


            marker = new google.maps.Marker({
                map: map,
                icon: image,
                title: place.name,
                draggable: true,
                position: place.geometry.location

            });
            markers.push(marker);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            // Lat and Lng input.

            google.maps.event.addListener(marker, 'position_changed', function () {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                $('#lat').val(lat);
                $('#lng').val(lng);
            });

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        map.fitBounds(bounds);
    });

    // [END region_getplaces]
}