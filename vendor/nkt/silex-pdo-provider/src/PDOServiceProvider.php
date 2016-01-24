<?php

namespace Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * PDO Service Provider.
 *
 * @author Gusakov Nikita <dev@nkt.me>
 */
class PDOServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['pdo.dsn'] = 'sqlite::memory:';
        $app['pdo.username'] = '';
        $app['pdo.password'] = '';
        $app['pdo.attributes'] = array();
        $app['pdo.class_name'] = 'PDO';

        $app['db'] = $app->share(function ($app) {
            return new $app['pdo.class_name']($app['pdo.dsn'], $app['pdo.username'], $app['pdo.password'], $app['pdo.attributes']);
        });
    }

    public function boot(Application $app)
    {
    }
}
