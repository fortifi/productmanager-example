<?php
namespace ProductManagerExample;

use Fortifi\ProductManager\Request\Request;
use Fortifi\ProductManager\Request\RequestType;
use Fortifi\ProductManager\Transport;
use Packaged\Context\Context;

class PMContext extends Context
{
  protected $_pmRequest;

  /**
   * @return Request
   * @throws \Exception
   */
  public function pmRequest()
  {
    if($this->_pmRequest === null)
    {
      $types = RequestType::getValues();
      shuffle($types);
      $type = reset($types);

      $content = '{"type":"' . $type . '","transportKey":"a", "verifyHash":"0b771942a9b88b7ed7bb960f9139dcea"}';
      $this->_pmRequest = Transport::fromJsonRequest($content);
      //$this->_pmRequest = Transport::fromJsonRequest($this->request()->getContent());
    }
    return $this->_pmRequest;
  }
}
