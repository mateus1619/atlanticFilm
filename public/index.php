<?php

use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/app.php';

$app = AppFactory::create();

require_once __DIR__ . '/../app/HTTP/Routes/web.php';

$app->run();
