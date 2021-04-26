<?php

require_once '../vendor/autoload.php';
require_once '../config/env.php';

use Core\Routing\Request;
use Core\Routing\PageLoader;

$request = new Request();
$loader  = new PageLoader();

$urlParams = $request->getRoute();
$loader->load($urlParams);