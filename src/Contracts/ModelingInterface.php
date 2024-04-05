<?php

namespace Davidvandertuijn\LaravelGoogleMaps\Contracts;

use Illuminate\View\Factory as View;

interface ModelingInterface
{
    /**
     * Public constructor.
     */
    public function __construct(array $parameters = []);

    /**
     * Render the model item.
     *
     * @param  int  $identifier
     * @return string
     */
    public function render($identifier, View $view);

    /**
     * Get the model options.
     *
     * @return array
     */
    public function getOptions();
}
