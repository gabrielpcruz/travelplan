<?php

namespace App\Business\Travel;

use App\Business\Business;
use App\Repository\Travel\TravelRepository;

class TravelBusiness extends Business
{
    /**
     * @var string
     */
    protected string $repositoryClass = TravelRepository::class;
}