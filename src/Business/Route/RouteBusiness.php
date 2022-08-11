<?php

namespace App\Business\Route;

use App\Business\Business;
use App\Repository\Route\RouteRepository;

class RouteBusiness extends Business
{
    /**
     * @var string
     */
    protected string $repositoryClass = RouteRepository::class;
}