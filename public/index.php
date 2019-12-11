<?php
define('PHP_START', microtime(true));

use Cubex\Cubex;
use ProductManagerExample\Project;

$loader = require_once(dirname(__DIR__) . '/vendor/autoload.php');
try
{
  $cubex = new Cubex(dirname(__DIR__), $loader);
  $cubex->handle(new Project($cubex));
}
catch(Throwable $e)
{
  print_r($cubex->getContext()->meta()->all());
  var_dump($e);
}
