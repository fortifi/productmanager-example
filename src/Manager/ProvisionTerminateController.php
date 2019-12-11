<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningFailedResponse;

class ProvisionTerminateController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningFailedResponse();
  }
}
