<?php

namespace App\Repository\Travel;

use App\Entity\Travel\TravelEntity;
use App\Repository\Repository;

class TravelRepository extends Repository
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return TravelEntity::class;
    }
}