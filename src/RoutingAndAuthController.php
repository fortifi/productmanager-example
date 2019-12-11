<?php
namespace ProductManagerExample;

use Cubex\Controller\AuthedController;
use Fortifi\ProductManager\Request\RequestType;
use Packaged\Routing\FuncCondition;
use Packaged\Routing\Handler\Handler;
use Packaged\Routing\Route;
use ProductManagerExample\Manager\AvailabilityCheckController;
use ProductManagerExample\Manager\AvailabilityReserveController;
use ProductManagerExample\Manager\ProvisionActivateController;
use ProductManagerExample\Manager\ProvisionCancelController;
use ProductManagerExample\Manager\ProvisionPropertiesSetController;
use ProductManagerExample\Manager\ProvisionReactivateController;
use ProductManagerExample\Manager\ProvisionSetupController;
use ProductManagerExample\Manager\ProvisionSuspendController;
use ProductManagerExample\Manager\ProvisionTerminateController;

class RoutingAndAuthController extends AuthedController
{
  public function canProcess(&$response): bool
  {
    $ctx = $this->getContext();
    //Verify the request against the product manager key (from config)
    if($ctx instanceof PMContext && $ctx->pmRequest()->isVerified($ctx->config()->getItem("fortifi", "pm_key")))
    {
      //Set the request type on context, so we can route on the value
      $ctx->meta()->set('pm_request_type', $ctx->pmRequest()->type->getValue());
      return parent::canProcess($response);
    }

    //If we cant verify the request, we cannot process the request
    return false;
  }

  /**
   * @param string                  $type
   * @param string|callable|Handler $result
   *
   * @return Route
   */
  protected function _pmroute($type, $result)
  {
    //Route based on the request type
    return Route::with(
      FuncCondition::i(
        function (PMContext $c) use ($type) { return $c->meta()->get('pm_request_type') === $type; }
      )
    )->setHandler($result);
  }

  protected function _generateRoutes()
  {
    yield $this->_pmroute(RequestType::AVAILABILITY_CHECK, AvailabilityCheckController::class);
    yield $this->_pmroute(RequestType::AVAILABILITY_RESERVE, AvailabilityReserveController::class);
    yield $this->_pmroute(RequestType::PROVISION_SETUP, ProvisionSetupController::class);
    yield $this->_pmroute(RequestType::PROVISION_ACTIVATE, ProvisionActivateController::class);
    yield $this->_pmroute(RequestType::PROVISION_PROPERTIES_SET, ProvisionPropertiesSetController::class);
    yield $this->_pmroute(RequestType::PROVISION_SUSPEND, ProvisionSuspendController::class);
    yield $this->_pmroute(RequestType::PROVISION_REACTIVATE, ProvisionReactivateController::class);
    yield $this->_pmroute(RequestType::PROVISION_CANCEL, ProvisionCancelController::class);
    yield $this->_pmroute(RequestType::PROVISION_TERMINATE, ProvisionTerminateController::class);
  }
}
