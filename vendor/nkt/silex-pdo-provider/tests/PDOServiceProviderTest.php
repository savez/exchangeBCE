<?php

namespace Silex\Tests\Provider;

use Silex\Application;
use Silex\Provider\PDOServiceProvider;

class PDOServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testInitialState()
    {
        $app = new Application();
        $app->register(new PDOServiceProvider());

        $this->assertInstanceOf('PDO', $app['db']);
    }
}
