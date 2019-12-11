<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningSuccessResponse;

class ProvisionSuspendController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningSuccessResponse();
  }
}
