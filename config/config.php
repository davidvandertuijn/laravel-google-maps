<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Mapping
    |--------------------------------------------------------------------------
    |
    | Enable Google mapping.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Google API Key
    |--------------------------------------------------------------------------
    |
    | A Google API key to link Laravel Google Maps to Google's API.
    |
    */
    'key' => env('GOOGLE_API_KEY', 'AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw'),

    /*
    |--------------------------------------------------------------------------
    | Google API version
    |--------------------------------------------------------------------------
    |
    | A Google API version to use with Laravel Google Maps.
    |
    */
    'version' => env('GOOGLE_API_VERSION', 'quarterly'),

    /*
    |--------------------------------------------------------------------------
    | Region
    |--------------------------------------------------------------------------
    |
    | The region Google API should use required in ISO 3166-1 code format.
    |
    */
    'region' => 'GB',

    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    | The Language Google API should use required in ISO 639-1 code format.
    |
    */
    'language' => 'en-gb',

    /*
    |--------------------------------------------------------------------------
    | Asynchronous
    |--------------------------------------------------------------------------
    |
    | Perform the loading and rendering of Laravel Google Maps map asynchronously.
    |
    */
    'async' => false,

    /*
    |--------------------------------------------------------------------------
    | Location Marker
    |--------------------------------------------------------------------------
    |
    | Automatically add a location marker to the provided location for a
    | Laravel Google Maps displayed map.
    |
    */
    'marker' => true,

    /*
    |--------------------------------------------------------------------------
    | Center Map
    |--------------------------------------------------------------------------
    |
    | Automatically center the Laravel Google Maps displayed map on the provided
    | location.
    |
    */
    'center' => true,

    /*
    |--------------------------------------------------------------------------
    | Locate Users Location
    |--------------------------------------------------------------------------
    |
    | Automatically center the Laravel Google Maps displayed map on the users current
    | location.
    |
    */
    'locate' => false,

    /*
    |--------------------------------------------------------------------------
    | Default Zoom
    |--------------------------------------------------------------------------
    |
    | The default zoom level Laravel Google Maps should use.
    |
    */
    'zoom' => 8,

    /*
    |--------------------------------------------------------------------------
    | Scroll wheel Zoom
    |--------------------------------------------------------------------------
    |
    | Set if scroll wheel zoom should be used by Laravel Google Maps.
    |
    */
    'scrollWheelZoom' => true,

    /*
    |--------------------------------------------------------------------------
    | Zoom Control
    |--------------------------------------------------------------------------
    |
    | Set if zoom control should be displayed by Laravel Google Maps.
    |
    */
    'zoomControl' => true,

    /*
    |--------------------------------------------------------------------------
    | Map Type Control
    |--------------------------------------------------------------------------
    |
    | Set if map type control should be displayed by Laravel Google Maps.
    |
    */
    'mapTypeControl' => true,

    /*
    |--------------------------------------------------------------------------
    | Scale Control
    |--------------------------------------------------------------------------
    |
    | Set if scale control should be displayed by Laravel Google Maps.
    |
    */
    'scaleControl' => false,

    /*
    |--------------------------------------------------------------------------
    | Street View Control
    |--------------------------------------------------------------------------
    |
    | Set if street view control should be displayed by Laravel Google Maps.
    |
    */
    'streetViewControl' => true,

    /*
    |--------------------------------------------------------------------------
    | Rotate Control
    |--------------------------------------------------------------------------
    |
    | Set if rotate control should be displayed by Laravel Google Maps.
    |
    */
    'rotateControl' => false,

    /*
    |--------------------------------------------------------------------------
    | Fullscreen Control
    |--------------------------------------------------------------------------
    |
    | Set if fullscreen control should be displayed by Laravel Google Maps.
    |
    */
    'fullscreenControl' => true,

    /*
    |--------------------------------------------------------------------------
    | Gesture Handling
    |--------------------------------------------------------------------------
    |
    | Set if gesture handling for Laravel Google Maps.
    |
    */
    'gestureHandling' => 'auto',

    /*
    |--------------------------------------------------------------------------
    | Map Type
    |--------------------------------------------------------------------------
    |
    | Set the default Laravel Google Maps displayed map type. (ROADMAP|SATELLITE|HYBRID|TERRAIN)
    |
    */
    'type' => 'ROADMAP',

    /*
    |--------------------------------------------------------------------------
    | Map UI
    |--------------------------------------------------------------------------
    |
    | Should the default Laravel Google Maps displayed map UI be shown.
    |
    */
    'ui' => true,

    /*
    |--------------------------------------------------------------------------
    | Map Marker
    |--------------------------------------------------------------------------
    |
    | Set the default Laravel Google Maps map marker behaviour.
    |
    */
    'markers' => [

        /*
        |--------------------------------------------------------------------------
        | Marker Icon
        |--------------------------------------------------------------------------
        |
        | Display a custom icon for markers. (Link to an image)
        |
        */
        'icon' => '',

        /*
        |--------------------------------------------------------------------------
        | Marker Animation
        |--------------------------------------------------------------------------
        |
        | Display an animation effect for markers. (NONE|DROP|BOUNCE)
        |
        */
        'animation' => 'NONE',

    ],

    /*
    |--------------------------------------------------------------------------
    | Map Marker Cluster
    |--------------------------------------------------------------------------
    |
    | Enable default Laravel Google Maps map marker cluster.
    |
    */
    'cluster' => true,

    /*
    |--------------------------------------------------------------------------
    | Map Marker Cluster
    |--------------------------------------------------------------------------
    |
    | Set the default Laravel Google Maps map marker cluster behaviour.
    |
    */
    'clusters' => [

        /*
        |--------------------------------------------------------------------------
        | Cluster Icon
        |--------------------------------------------------------------------------
        |
        | Display custom images for clusters using icon path. (Link to an image path)
        |
        */
        'icon' => '//googlearchive.github.io/js-marker-clusterer/images/m',

        /*
        |--------------------------------------------------------------------------
        | Cluster Size
        |--------------------------------------------------------------------------
        |
        | The grid size of a cluster in pixels.
        |
        */
        'grid' => 60,

        /*
        |--------------------------------------------------------------------------
        | Cluster Zoom
        |--------------------------------------------------------------------------
        |
        | The maximum zoom level that a marker can be part of a cluster.
        |
        */
        'zoom' => null,

        /*
        |--------------------------------------------------------------------------
        | Cluster Center
        |--------------------------------------------------------------------------
        |
        | Whether the center of each cluster should be the average of all markers
        | in the cluster.
        |
        */
        'center' => false,

        /*
        |--------------------------------------------------------------------------
        | Cluster Size
        |--------------------------------------------------------------------------
        |
        | The minimum number of markers to be in a cluster before the markers are
        | hidden and a count is shown.
        |
        */
        'size' => 2,

    ],

];
