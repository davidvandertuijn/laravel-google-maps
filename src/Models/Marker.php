<?php

namespace Davidvandertuijn\LaravelGoogleMaps\Models;

use Davidvandertuijn\LaravelGoogleMaps\Contracts\ModelingInterface;
use Illuminate\View\Factory as View;

class Marker implements ModelingInterface
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

        if (isset($parameters['markers'])) {
            $this->options = array_replace_recursive(
                $parameters['markers'],
                $this->options,
                ($parameters['markers']['content'] !== '' ? ['content' => $parameters['markers']['content']] : [])
            );
        }
    }

    /**
     * Render the model item.
     *
     * @param  int  $identifier
     * @return string
     */
    public function render($identifier, View $view)
    {
        return $view->make('laravel-google-maps::marker')
            ->withOptions($this->options)
            ->withId($identifier)
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
