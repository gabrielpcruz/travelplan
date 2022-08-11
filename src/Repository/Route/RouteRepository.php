<?php

namespace App\Repository\Route;

use App\Entity\Route\RouteEntity;
use App\Repository\Repository;

class RouteRepository extends Repository
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return RouteEntity::class;
    }
}