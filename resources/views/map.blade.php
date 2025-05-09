<div id="map-canvas-{!! $id !!}" style="width: 100%; height: 100%; margin: 0; padding: 0; position: relative; overflow: hidden;"></div>

<script type="text/javascript">

    var maps = [];

    function initialize_{!! $id !!}() {
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
        var position = new google.maps.LatLng({!! $options['latitude'] !!}, {!! $options['longitude'] !!});

        var mapOptions_{!! $id !!} = {
            @if ($options['center'])
                center: position,
            @endif
            zoom: {!! $options['zoom'] !!},
            mapTypeId: google.maps.MapTypeId.{!! $options['type'] !!},
            @if (!$options['ui']) disableDefaultUI: true @else disableDefaultUI: false @endif,
            @if ($options['scrollWheelZoom']) scrollwheel: true @else scrollwheel: false @endif,
            @if ($options['zoomControl']) zoomControl: true @else zoomControl: false @endif,
            @if ($options['mapTypeControl']) mapTypeControl: true @else mapTypeControl: false @endif,
            @if ($options['scaleControl']) scaleControl: true @else scaleControl: false @endif,
            @if ($options['streetViewControl']) streetViewControl: true @else streetViewControl: false @endif,
            @if ($options['rotateControl']) rotateControl: true @else rotateControl: false @endif,
            @if ($options['fullscreenControl']) fullscreenControl: true @else fullscreenControl: false @endif,
            gestureHandling: '{!! $options['gestureHandling'] !!}'
        };

        var map_{!! $id !!} = new google.maps.Map(document.getElementById('map-canvas-{!! $id !!}'), mapOptions_{!! $id !!});
        map_{!! $id !!}.setTilt({!! $options['tilt'] !!});

        var markers = [];
        var infowindows = [];
        var shapes = [];

        @foreach ($options['markers'] as $key => $marker)
            {!! $marker->render($key, $view) !!}
        @endforeach

        @foreach ($options['shapes'] as $key => $shape)
            {!! $shape->render($key, $view) !!}
        @endforeach

        @if ($options['overlay'] == 'BIKE')
            var bikeLayer = new google.maps.BicyclingLayer();
            bikeLayer.setMap(map_{!! $id !!});
        @endif

        @if ($options['overlay'] == 'TRANSIT')
            var transitLayer = new google.maps.TransitLayer();
            transitLayer.setMap(map_{!! $id !!});
        @endif

        @if ($options['overlay'] == 'TRAFFIC')
            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map_{!! $id !!});
        @endif

        var idleListener = google.maps.event.addListenerOnce(map_{!! $id !!}, "idle", function () {
            map_{!! $id !!}.setZoom({!! $options['zoom'] !!});

            @if (!$options['center'])
                map_{!! $id !!}.fitBounds(bounds);
            @endif

            @if ($options['locate'])
                if (typeof navigator !== 'undefined' && navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        map_{!! $id !!}.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                    });
                }
            @endif
        });

        var map = map_{!! $id !!};

        @if (isset($options['eventBeforeLoad']))
            {!! $options['eventBeforeLoad'] !!}
        @endif

        @if (isset($options['eventAfterLoad']))
            google.maps.event.addListenerOnce(map_{!! $id !!}, "tilesloaded", function() {
                {!! $options['eventAfterLoad'] !!}
            });
        @endif

        @if ($options['cluster'])
            var markerClusterOptions = {
                imagePath: '{!! $options['clusters']['icon'] !!}',
                gridSize: {!! $options['clusters']['grid'] !!},
                maxZoom: @if ($options['clusters']['zoom'] === null) null @else {!! $options['clusters']['zoom'] !!} @endif,
                averageCenter: @if ($options['clusters']['center'] === true) true @else false @endif,
                minimumClusterSize: {!! $options['clusters']['size'] !!}
            };
            var markerCluster = new MarkerClusterer(map_{!! $id !!}, markers, markerClusterOptions);
        @endif

        maps.push({
            key: {!! $id !!},
            markers: markers,
            infowindows: infowindows,
            map: map_{!! $id !!},
            shapes: shapes
        });
    }

    @if (!$options['async'])

        google.maps.event.addDomListener(window, 'load', initialize_{!! $id !!});

    @endif

</script>
