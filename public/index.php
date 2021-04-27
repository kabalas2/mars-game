<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
require_once '../config/env.php';

use Core\Routing\Request;
use Core\Routing\PageLoader;

$request = new Request();
$loader  = new PageLoader();

$urlParams = $request->getRoute();
$loader->load($urlParams);