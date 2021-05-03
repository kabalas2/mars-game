<?php

include_once '../vendor/autoload.php';
include_once '../config.php';

use Controller\Index;

$controller = new Index();
$controller->index();

