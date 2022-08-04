<?php

use Currency\Exchange\Controllers\ExchangeController;
use Illuminate\Support\Facades\Route;

Route::get('v1/exchange', [ExchangeController::class, '__invoke']);