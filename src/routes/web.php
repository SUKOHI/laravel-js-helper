<?php

use Sukohi\JsHelper\Http\Controllers\JsHelperController;

Route::get('js/helper.js', [JsHelperController::class, 'js']);