<?php
namespace ProductManagerExample;

use Fortifi\ProductManager\Request\Request;
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
      error_log($this->request()->getContent());
      $this->_pmRequest = Transport::fromJsonRequest($this->request()->getContent());
    }
    return $this->_pmRequest;
  }
}
