<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningSuccessResponse;

class ProvisionCancelController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningSuccessResponse();
  }
}
