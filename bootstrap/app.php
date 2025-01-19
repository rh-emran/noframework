<?php

use App\Core\App;
use Dotenv\Dotenv;
use App\Config\Config;
use App\Core\Container;
use Laminas\Diactoros\Response;
use App\Providers\ConfigServiceProvider;
use League\Container\ReflectionContainer;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require '../vendor/autoload.php';

$dotEnv = Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load();

$container = Container::getInstance();
$container->delegate(new ReflectionContainer());
$container->addServiceProvider(new ConfigServiceProvider());

$config = $container->get(Config::class);

foreach($config->get('app.providers') as $provider) {
    $container->addServiceProvider(new $provider);
}

$app = new App($container);

(require '../routes/web.php')($app->getRouter(), $container);

$app->run();