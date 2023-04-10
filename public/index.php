<?php

use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config.php';

$app = AppFactory::create();

require_once __DIR__ . '/../app/Routes/web.php';

$app->run();