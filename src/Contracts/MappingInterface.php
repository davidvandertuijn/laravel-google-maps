<?php

namespace Davidvandertuijn\LaravelGoogleMaps\Contracts;

use Davidvandertuijn\LaravelGoogleMaps\Exceptions\MapperArgumentException;
use Davidvandertuijn\LaravelGoogleMaps\Exceptions\MapperException;
use Davidvandertuijn\LaravelGoogleMaps\Exceptions\MapperSearchException;
use Davidvandertuijn\LaravelGoogleMaps\Exceptions\MapperSearchLimitException;
use Davidvandertuijn\LaravelGoogleMaps\Exceptions\MapperSearchResultException;
use Davidvandertuijn\LaravelGoogleMaps\Models\Location;

interface MappingInterface
{
    /**
     * Renders and returns Google Map code.
     *
     * @param  int  $item
     * @return string
     */
    public function render($item = -1);

    /**
     * Renders and returns Google Map javascript code.
     *
     * @return string
     */
    public function renderJavascript();

    /**
     * Locate a location and return a Location instance.
     *
     * @param  string  $location
     * @return Location
     *
     * @throws MapperArgumentException
     * @throws MapperSearchException
     * @throws MapperSearchResultException
     * @throws MapperSearchLimitException
     * @throws MapperException
     */
    public function location($location);

    /**
     * Add a new map.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return void
     */
    public function map($latitude, $longitude, array $options = []);

    /**
     * Add a new street view map.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @param  int  $heading
     * @param  int  $pitch
     * @return void
     */
    public function streetview($latitude, $longitude, $heading, $pitch, array $options = []);

    /**
     * Add a new map marker.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return void
     *
     * @throws MapperException
     */
    public function marker($latitude, $longitude, array $options = []);

    /**
     * Add a new map information window.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @param  string  $content
     * @return void
     *
     * @throws MapperException
     */
    public function informationWindow($latitude, $longitude, $content, array $options = []);

    /**
     * Add a new map polyline.
     *
     *
     * @return void
     *
     * @throws MapperException
     */
    public function polyline(array $coordinates = [], array $options = []);

    /**
     * Add a new map polygon.
     *
     *
     * @return void
     *
     * @throws MapperException
     */
    public function polygon(array $coordinates = [], array $options = []);

    /**
     * Add a new map rectangle.
     *
     *
     * @return void
     *
     * @throws MapperException
     */
    public function rectangle(array $coordinates = [], array $options = []);

    /**
     * Add a new map circle.
     *
     *
     * @return void
     *
     * @throws MapperException
     */
    public function circle(array $coordinates = [], array $options = []);
}
