Silex PDO Service Provider
==========================

[![Build Status](https://travis-ci.org/nkt/flame.svg?branch=master)](https://travis-ci.org/nkt/silex-pdo-provider)

Silex provider for PDO

Usage
-----

```php
$app->register(new \Silex\Provider\PDOServiceProvider, array(
  'pdo.dsn'        => 'mysql:host=localhost;dbname=foobar', // sqlite::memory: by default
  'pdo.username'   => 'nkt', // null by default
  'pdo.password'   => 'hello world', // null by default
  'pdo.attributes' => array(), // empty array by default
  'pdo.class_name' => 'MyCustomPDOClass' // PDO by default
));
```

License
-------
MIT
