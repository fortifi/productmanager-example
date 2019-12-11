<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningSuccessResponse;

class ProvisionReactivateController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningSuccessResponse();
  }
}
