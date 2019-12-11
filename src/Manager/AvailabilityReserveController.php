<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\AvailabilityResponse;

class AvailabilityReserveController extends AbstractProductManagerController
{
  public function process()
  {
    return new AvailabilityResponse();
  }
}
