<?php

require_once __DIR__.'/../vendor/autoload.php';



use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Application\UrlGeneratorTrait;

date_default_timezone_set('Europe/Rome');

$app = new Silex\Application();

$env = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production';


// ERROR REPORTING
ini_set('display_errors', 0);
//error_reporting(E_ALL);
$app['debug'] = false;



return $app;
