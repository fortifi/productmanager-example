<?php
namespace ProductManagerExample\Cli;

use Cubex\Console\ConsoleCommand;
use Fortifi\ProductManager\Response\ProvisioningSuccessResponse;
use Fortifi\ProductManager\Transport;

class SendUpdate extends ConsoleCommand
{
  public function process()
  {
    $transportKey = 'g780d6sJprxR62RO9lbA615NNbu046bc';
    //This URL is provided by the original provisioning request (including transport key)
    $updateUrl = 'http://integrations.fortifi.me:8092/FORTOvJjBQcwf65/provisioning/update/FID:PCHS:PVR:1576239810:vdqtcp2a/' . $transportKey;

    $post = new ProvisioningSuccessResponse();
    $post->setVerificationData($this->getContext()->config()->getItem('fortifi', 'pm_key'), $transportKey);
    $post->message = "All Good";
    $post->log = [
    ];

    print_r(\Requests::post($updateUrl, [], Transport::toJson($post))->body);
  }
}
