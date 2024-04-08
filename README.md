# Laravel Google Maps

<a href="https://packagist.org/packages/davidvandertuijn/laravel-google-maps"><img src="https://poser.pugx.org/davidvandertuijn/laravel-google-maps/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/davidvandertuijn/laravel-google-maps"><img src="https://poser.pugx.org/davidvandertuijn/laravel-google-maps/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/davidvandertuijn/laravel-google-maps"><img src="https://poser.pugx.org/davidvandertuijn/laravel-google-maps/license.svg" alt="License"></a>

 ![Laravel Google Maps](https://cdn.davidvandertuijn.nl/github/laravel-google-maps.png)

 Thank you, **Bradley Cornford**, for creating the original ![package](https://github.com/bradcornford/Googlmapper).
 
| Laravel | Version |
| --- |---------|
| 11  | v1.0    |

## Introduction

Consider Laravel Google Maps as a streamlined solution for seamlessly integrating Google Maps with Laravel. It offers a range of convenient helpers to accelerate mapping utilization, including:
- `Mapper::map`
- `Mapper::location`
- `Mapper::streetview`
- `Mapper::marker`
- `Mapper::informationWindow`
- `Mapper::polyline`
- `Mapper::polygon`
- `Mapper::rectangle`
- `Mapper::circle`
- `Mapper::render`

## Installation

```
composer require davidvandertuijn/laravel-google-maps
```

Next, update Composer via the Terminal:

	composer update

Once the operation is complete, proceed to add the service provider. Open `app/config/app.php` and append a new item to the providers array.

	Davidvandertuijn\LaravelGoogleMaps\MapperServiceProvider::class,

Subsequently, introduce the facade. Similarly, in `app/config/app.php`, add a new item to the aliases array.

	'Mapper' => Davidvandertuijn\LaravelGoogleMaps\Facades\MapperFacade::class,

Lastly, integrate the configuration files into your application.

	php artisan vendor:publish --provider="Davidvandertuijn\LaravelGoogleMaps\MapperServiceProvider" --tag=laravel-google-maps

Don't forget to configure your Google API Key as the GOOGLE_API_KEY environment variable. Obtain an API key for your project from the [Google developers console](https://console.developers.google.com/).

## Configuration

Configure Laravel Google Maps effortlessly in a few steps. Open `config/laravel-google-maps.php` and adjust the options accordingly.

- `enabled` - Enable Google Maps.
- `key` - A Google Maps API key.
- `region` - A region Google Maps should utilise, required in ISO 3166-1 code format, e.g. GB.
- `language` - A language Google Maps should utilise, required in ISO 639-1 code format, e.g. en-gb.
- `async` - Perform the loading and rendering of Laravel Google Maps map asynchronously, e.g. false.
- `marker` - Automatically add Google Maps marker for your maps initial location, e.g. true.
- `center` - Automatically center Google Maps around the initial location, when false, Google Maps will automatically center the map, e.g. true.
- `locate` - Automatically center Google Maps around the users current location, when false, Google Maps will automatically center the map, e.g. true.
- `zoom` - Set the default zoom level for Google Maps, e.g. 8.
- `scrollWheelZoom` - Set the default scroll wheel zoom Google Maps, e.g. true.
- `zoomControl` - Set the default zoom control for Google Maps, e.g. true.
- `mapTypeControl` - Set the default map type control for Google Maps, e.g. true.
- `scaleControl` - Set the default scale control for Google Maps, e.g. true.
- `streetViewControl` - Set the default street view control for Google Maps, e.g. true.
- `rotateControl` - Set the default rotate control for Google Maps, e.g. true.
- `fullscreenControl` - Set the default fullscreen control for Google Maps, e.g. true.
- `gestureHandling` - Set the default gesture handling for Google Maps, e.g. auto, none, cooperative, greedy.
- `type` - Set the default map type for Google Maps, e.g. ROADMAP, SATELLITE, HYBRID, TERRAIN.
- `ui` - Show the Google Maps default UI options, e.g. true.
- `markers.icon` - Set the default marker icon, e.g. img/icon.png.
- `markers.animation` - Set the default marker animation, e.g. NONE, DROP, BOUNCE.
- `markers.autoClose` - Automatically close Information Windows of current marker when other markers are clicked, e.g. true.
- `cluster` - Set if map marker clusters should be used.
- `clusters.icon` - Display custom images for clusters using icon path.
- `clusters.grid` - The grid size of a cluster in pixels.
- `clusters.zoom` - The maximum zoom level that a marker can be part of a cluster.
- `clusters.center` - Whether the center of each cluster should be the average of all markers in the cluster.
- `clusters.size` - The minimum number of markers to be in a cluster before the markers are hidden and a count is shown.

## Usage

It's straightforward—utilize the Mapper class in any Controller/Model/File as needed:

`Mapper::`

This will give you access to

- [Map](#map)
- [Location](#location)
- [Streetview](#streetview)
- [Marker](#marker)
- [Information Window](#information-window)
- [Polyline](#polyline)
- [Polygon](#polygon)
- [Rectangle](#rectangle)
- [Circle](#circle)
- [Render](#render)
- [RenderJavascript](#renderjavascript)

### Example

Initialize the map in your controller `MapController.php`:

	use Mapper;

	public function index()
	{
		Mapper::map(53.381128999999990000, -1.470085000000040000);

		return view('map')
	}

Within in the view `map.blade.php` add following code to render the map:

	<div style="width: 500px; height: 500px;">
		{!! Mapper::render() !!}
	</div>

### Map

The `map` method allows a map to be created, with latitude, longitude and optional parameters for options.

	Mapper::map(53.381128999999990000, -1.470085000000040000);
	Mapper::map(53.381128999999990000, -1.470085000000040000, ['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);
	Mapper::map(53.381128999999990000, -1.470085000000040000, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']]);
	Mapper::map(53.381128999999990000, -1.470085000000040000, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'cluster' => false]);
	Mapper::map(53.381128999999990000, -1.470085000000040000, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 20]]);

##### Map Events

**Before Load**

This event is fired before the map is loaded.

	Mapper::map(53.381128999999990000, -1.470085000000040000, ['eventBeforeLoad' => 'console.log("before load");']);

**After Load**

This event is fired after the map is loaded.

	Mapper::map(53.381128999999990000, -1.470085000000040000, ['eventAfterLoad' => 'console.log("after load");']);

### Location

The `location` method allows a location to be searched for with a string, returning a Location object with its latitude and longitude.

	Mapper::location('Sheffield');
	Mapper::location('Sheffield')->map(['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);
	Mapper::location('Sheffield')->streetview(1, 1, ['ui' => false]);

### Streetview

The `streetview` method allows a streetview map to be created, with latitude, longitude, heading, pitch and optional parameters for options.

	Mapper::streetview(53.381128999999990000, -1.470085000000040000, 1, 1);
	Mapper::streetview(53.381128999999990000, -1.470085000000040000, 1, 1, ['ui' => false]);

### Marker

The `marker` method allows a marker to be added to a map, with latitude, longitude, and optional parameters for options.

	Mapper::marker(53.381128999999990000, -1.470085000000040000);
	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['animation' => 'DROP', 'label' => 'Marker', 'title' => 'Marker', 'draggable' => true]);
	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['icon' => 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=|FE6256|000000']);
	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['icon' => ['url' => 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=|FE6256|000000', 'scale' => 100]]);
	Mapper::map(52.381128999999990000, 0.470085000000040000, ['markers' => ['icon' => ['symbol' => 'CIRCLE', 'scale' => 10], 'animation' => 'DROP', 'label' => 'Marker', 'title' => 'Marker']])->marker(53.381128999999990000, -1.470085000000040000);
	Mapper::marker(53.381128999999990000, -1.470085000000040000, [
		'title' 	=> 'title',
		'icon'      => [
			'path'         => 'M10.5,0C4.7,0,0,4.7,0,10.5c0,10.2,9.8,19,10.2,19.4c0.1,0.1,0.2,0.1,0.3,0.1s0.2,0,0.3-0.1C11.2,29.5,21,20.7,21,10.5 C21,4.7,16.3,0,10.5,0z M10.5,5c3,0,5.5,2.5,5.5,5.5S13.5,16,10.5,16S5,13.5,5,10.5S7.5,5,10.5,5z',
			'fillColor'    => '#DD716C',
			'fillOpacity'  => 1,
			'strokeWeight' => 0,
			'anchor'       => [0, 0],
			'origin'       => [0, 0],
			'size'         => [21, 30]
		],
		'label'     => [
			'text' => 'Marker',
			'color' => '#B9B9B9',
			'fontFamily' => 'Arial',
			'fontSize' => '13px',
			'fontWeight' => 'bold',
		],
		'autoClose' => true,
		'clickable' => false,
		'cursor' => 'default',
		'opacity' => 0.5,
		'visible' => true,
		'zIndex' => 1000,
	]);

#### Draggable Markers

If you need draggable marker, you can add option draggable. 

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true]);

##### Draggable Events

**Click**

This event is fired when the marker icon was clicked.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventClick' => 'console.log("left click");']);

**Double Click**

This event is fired when the marker icon was double clicked.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDblClick' => 'console.log("double left click");']);

**Right Click**

This event is fired for a right click on the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventRightClick' => 'console.log("right click");']);

**Mouse Over**

This event is fired when the mouse enters the area of the marker icon.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventMouseOver' => 'console.log("mouse over");']);

**Mouse Down**

This event is fired for a mouse down on the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventMouseDown' => 'console.log("mouse down");']);

**Mouse Up**

This event is fired for a mouse up on the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventMouseUp' => 'console.log("mouse up");']);

**Mouse Out**

This event is fired when the mouse leaves the area of the marker icon.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventMouseOut' => 'console.log("mouse out");']);

**Drag**

This event is repeatedly fired while the user drags the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDrag' => 'console.log("dragging");']);

**Drag Start**

This event is fired when the user starts dragging the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragStart' => 'console.log("drag start");']);

**Drag End**

This event is fired when the user stops dragging the marker.

	Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'console.log("drag end");']);

### Information Window

The `informationWindow` method allows an information window to be added to to a map, with latitude, longitude, content, and optional parameters for options.

	Mapper::informationWindow(53.381128999999990000, -1.470085000000040000, 'Content');
	Mapper::informationWindow(53.381128999999990000, -1.470085000000040000, 'Content', ['open' => true, 'maxWidth'=> 300, 'autoClose' => true, 'markers' => ['title' => 'Title']]);
	Mapper::map(52.381128999999990000, 0.470085000000040000)->informationWindow(53.381128999999990000, -1.470085000000040000, 'Content', ['markers' => ['animation' => 'DROP']]);

### Polyline

The `polyline` method allows a polyline to be added to a map, with coordinates, and optional parameters for options.

	Mapper::polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]]);
	Mapper::polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['editable' => 'true']);
	Mapper::map(52.381128999999990000, 0.470085000000040000)->polyline([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2]);

### Polygon

The `polygon` method allows a polygon to be added to a map, with coordinates, and optional parameters for options.

	Mapper::polygon([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]]);
	Mapper::polygon([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['editable' => 'true']);
	Mapper::map(52.381128999999990000, 0.470085000000040000)->polygon([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF']);

### Rectangle

The `rectangle` method allows a rectangle to be added to a map, with coordinates, and optional parameters for options.

	Mapper::rectangle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]]);
	Mapper::rectangle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['editable' => 'true']);
	Mapper::map(52.381128999999990000, 0.470085000000040000)->rectangle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000], ['latitude' => 52.381128999999990000, 'longitude' => 0.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF']);

### Circle

The `circle` method allows a circle to be added to a map, with coordinates, and optional parameters for options.

	Mapper::circle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000]]);
	Mapper::circle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000]], ['editable' => 'true']);
	Mapper::map(52.381128999999990000, 0.470085000000040000)->circle([['latitude' => 53.381128999999990000, 'longitude' => -1.470085000000040000]], ['strokeColor' => '#000000', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FFFFFF', 'radius' => 1000]);

### Render

The `render` method allows all maps to be rendered to the page, this method can be included in Views or added as controller passed parameter, and optional parameter for item.

	Mapper::render();
	Mapper::render(0);

### RenderJavascript

The `renderJavascript` method allows all required javascript to be rendered to the page, this method can be included in Views or added as controller passed parameter.

	Mapper::renderJavascript();
