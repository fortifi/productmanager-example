<?php
namespace ProductManagerExample\Manager;

use Fortifi\ProductManager\Log\Message;
use Fortifi\ProductManager\Response\ProvisioningProcessingResponse;

class ProvisionSetupController extends AbstractProductManagerController
{
  public function process()
  {
    $resp = new ProvisioningProcessingResponse();
    $resp->message = "All good";
    $resp->log = [
      Message::DEBUG("Log Item 1"),
      Message::INFO("Log Item 2"),
      Message::WARNING("Log Item 3"),
      Message::SUCCESS("Log Item 4"),
      Message::ERROR("Log Item 5"),
    ];
    return $resp;
  }
}
