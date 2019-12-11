<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Response\ProvisioningProcessingResponse;

class ProvisionSetupController extends AbstractProductManagerController
{
  public function process()
  {
    return new ProvisioningProcessingResponse();
  }
}
