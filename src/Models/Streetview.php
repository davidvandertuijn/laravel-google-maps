<?php

namespace Davidvandertuijn\LaravelGoogleMaps\Models;

use Davidvandertuijn\LaravelGoogleMaps\Contracts\ModelingInterface;
use Illuminate\View\Factory as View;

class Streetview implements ModelingInterface
{
    /**
     * Options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Public constructor.
     */
    public function __construct(array $parameters = [])
    {
        $this->options = $parameters;
    }

    /**
     * Render the model item.
     *
     * @param  int  $identifier
     * @return string
     */
    public function render($identifier, View $view)
    {
        return $view->make('laravel-google-maps::streetview')
            ->withOptions($this->options)
            ->withId($identifier)
            ->withView($view)
            ->render();
    }

    /**
     * Get the model options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
