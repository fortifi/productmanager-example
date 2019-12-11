<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningSuccessResponse;

class ProvisionActivateController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningSuccessResponse();
  }
}
