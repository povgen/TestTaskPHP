<?php

use controllers\CountryStatisticController;
use core\Route;

require '../core/autoloader.php';

Route::add('/', [CountryStatisticController::class, 'index']);
Route::add('/statistic', [CountryStatisticController::class, 'getStatistic']);

Route::callMatches($_SERVER['REQUEST_URI']);

