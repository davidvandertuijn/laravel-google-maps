<?php

namespace Davidvandertuijn\LaravelGoogleMaps\Contracts;

interface ObjectableInterface
{
    /**
     * Public constructor.
     */
    public function __construct(array $parameters = []);
}
