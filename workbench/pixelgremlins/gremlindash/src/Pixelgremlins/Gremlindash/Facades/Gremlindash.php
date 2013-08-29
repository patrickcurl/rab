<?php namespace Pixelgremlins\Gremlindash\Facades;

use Illuminate\Support\Facades\Facade;

class Gremlindash extends Facade {

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'gremlindash'; }

}