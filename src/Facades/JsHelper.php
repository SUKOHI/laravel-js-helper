<?php

namespace Sukohi\JsHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sukohi\JsHelper\JsHelper
 */
class JsHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'js-helper';
    }
}
