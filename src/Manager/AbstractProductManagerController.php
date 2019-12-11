<?php
namespace ProductManagerExample\Manager;

use Cubex\Controller\SingleRouteController;
use Fortifi\ProductManager\BaseData;
use Packaged\Context\Context;
use Packaged\Http\Responses\JsonResponse;
use ProductManagerExample\PMContext;

class AbstractProductManagerController extends SingleRouteController
{
  public function context(): ?PMContext
  {
    $ctx = $this->getContext();
    //Typed context
    return $ctx instanceof PMContext ? $ctx : null;
  }

  protected function _prepareResponse(Context $c, $result, $buffer = null)
  {
    //Convert any base data response to a json response
    if($result instanceof BaseData)
    {
      return JsonResponse::create($result);
    }
    return parent::_prepareResponse($c, $result, $buffer);
  }
}
