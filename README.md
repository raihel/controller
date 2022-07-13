# Raihel Controller

Create your routes using attributes in your controllers


## Installation


```bash
  composer install raihel/controller 
```

## Setting

Use Controller Factory to map your routes

- `diretory`: An array with the directories of your routes
- `controllers`: An array with your controller classes
- `loadRoute`: The class that will do the work of including the routes mapped in your controllers in your application accepts any class that implements `Raihel\Controller\Core\Load\Type\LoudRoute`


Slim example: 
```

require __DIR__.'/../../vendor/autoload.php';

use App\HelloController;
use Raihel\Controller\Core\ControllerFactory;
use Slim\App;

$app = new App();

use Raihel\Controller\Core\Load\Type\SlimLoadRoute;


ControllerFactory::load(
  loadRoute: new SlimLoadRoute($app),
  diretory: [__DIR__ . '/../../app/Aluno'],
  controllers: [HelloController::class]
);

$app->run();

```

lumen example: (In test)
```
ControllerFactory::load(
  loadRoute: new LaravelLoadRoute($router),
  diretory: [__DIR__ . '../app/Http/Controllers'],
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
