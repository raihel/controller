# Raihel Controller

[![Total Downloads](https://img.shields.io/packagist/dt/raihel/controller)](https://packagist.org/packages/raihel/controller)
[![Latest Stable Version](https://img.shields.io/packagist/v/raihel/controller)](https://packagist.org/packages/raihel/controller)
[![License](https://img.shields.io/packagist/l/raihel/controller)](https://packagist.org/packages/raihel/controller)

Create your routes using attributes in your controllers


## Installation


```bash
  composer install raihel/controller 
```

## Setting

Use Controller Factory to map your routes

- `diretory`: An array with the directories of your controllers
- `controllers`: An array with your controller classes
- `loadRoute`: The class that will do the work of including the routes mapped in your controllers in your application accepts any class that implements `Raihel\Controller\Core\Load\Type\LoudRoute`

### Slim:

```php

require __DIR__.'/../../vendor/autoload.php';

use App\HelloController;
use Raihel\Controller\Core\ControllerFactory;
use Slim\App;

$app = new App();

use Raihel\Controller\Core\Load\Type\SlimLoadRoute;


ControllerFactory::load(
  loadRoute: new SlimLoadRoute($app),
  diretory: [__DIR__ . '/../src'],
  controllers: [HelloController::class]
);

$app->run();

```

### Lumen:

```php
ControllerFactory::load(
    loadRoute: new LumenLoadRoute($router),
    diretory: [__DIR__ . '/../app/Http/Controllers'],
);
```
## Usage/Examples

### Controller

Create your controller by adding the
attribute Controller in your class it can receive a prefix that groups your routes
```php

namespace App;

use Raihel\Controller\Attributes\Controller;
use Raihel\Controller\Attributes\Route\Get;
use Raihel\Controller\Attributes\Route\Put;

#[Controller('home')]
class AppController
{
    #[Get]
    public function home()
    {
        echo 'Hello World!';
    }

    #[Get('hello'), Put('hello')]
    public function get2()
    {
        echo 'Hello World 2!';
    }
}
```

### Routes
The attribute `Get` before the home method creates a `GET /home` endponit for application
| Attributes                                                                            |
| ----------------- 
| Get | 
| Post | 
| Put | 
| Delete |
| Patch | 

## Authors

- [@heliodantas](https://github.com/HelioDantas)

## License

The Raihel Controller is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).