<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningFailedResponse;

class ProvisionPropertiesSetController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningFailedResponse();
  }
}
