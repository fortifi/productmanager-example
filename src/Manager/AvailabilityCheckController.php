<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\AvailabilityResponse;

class AvailabilityCheckController extends AbstractProductManagerController
{
  public function process()
  {
    return new AvailabilityResponse();
  }
}
