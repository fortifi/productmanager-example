<?php
namespace ProductManagerExample;

use Cubex\Application\Application;
use Cubex\Cubex;
use Packaged\Context\Context;
use Packaged\DiContainer\DependencyInjector;
use Packaged\Http\Request;
use Packaged\Routing\Handler\Handler;

class Project extends Application
{
  public function __construct(Cubex $cubex)
  {
    parent::__construct($cubex);

    //Construct a Product Manager Context
    $cubex->factory(
      Context::class,
      function () use ($cubex) {
        return $cubex->prepareContext(new PMContext(Request::createFromGlobals()));
      },
      DependencyInjector::MODE_IMMUTABLE
    );
  }

  protected function _defaultHandler(): Handler
  {
    return new RoutingAndAuthController();
  }

}
