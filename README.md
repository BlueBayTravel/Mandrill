# Laravel Mandrill

Laravel 5 wrapper for the [Mandrill](https://mandrillapp.com/api/docs/) API with multiple connections.

[![Build Status](https://travis-ci.org/BlueBayTravel/Mandrill.svg)](https://travis-ci.org/BlueBayTravel/Mandrill)

```php
// Return the users on the Mandrill account.
Mandrill::users()

// Dependency injection example.
$mandrillManager->users()
````

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

```bash
composer require bluebaytravel/mandrill
```

Add the service provider to `config/app.php` in the `providers` array.

```php
BlueBayTravel\Mandrill\MandrillServiceProvider::class
```

If you want you can use the [facade](http://laravel.com/docs/facades). Add the reference in `config/app.php` to your aliases array.

```php
'Mandrill' => BlueBayTravel\Mandrill\Facades\Mandrill::class
```

## Configuration

Laravel Mandrill requires connection configuration. To get started, you'll need to publish all vendor assets:

```bash
php artisan vendor:publish
```

This will create a `config/mandrill.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

#### Default Connection Name

This option `default` is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `main`.

#### Mandrill Connections

This option `connections` is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like.

## Usage

### Mandrill

The Mandrill class is a wrapper around `mandrill\mandrill` package.

#### MandrillManager

This is the class of most interest. It is bound to the ioc container as `mandrill` and can be accessed using the `Facades\Mandrill` facade. This class implements the ManagerInterface by extending AbstractManager. The interface and abstract class are both part of [Graham Campbell's](https://github.com/GrahamCampbell) [Laravel Manager](https://github.com/GrahamCampbell/Laravel-Manager) package, so you may want to go and checkout the docs for how to use the manager class over at that repository. Note that the connection class returned will always be an instance of `BlueBayTravel\Mandrill\Mandrill`.

#### Facades\Mandrill

This facade will dynamically pass static method calls to the `mandrill` object in the ioc container which by default is the `MandrillManager` class.

#### MandrillServiceProvider

This class contains no public methods of interest. This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples
Here you can see an example of just how simple this package is to use. Out of the box, the default adapter is `main`. After you enter your authentication details in the config file, it will just work:

```php
// You can alias this in config/app.php.
use BlueBayTravel\Mandrill\Facades\Mandrill;

Mandrill::users();
```

The Mandrill manager will behave like it is a `BlueBayTravel\Mandrill\Mandrill`. If you want to call specific connections, you can do that with the connection method:

```php
use BlueBayTravel\Mandrill\Facades\Mandrill;

// Writing this…
Mandrill::connection('main')->users();

// ...is identical to writing this
Mandrill::users();

// and is also identical to writing this.
Mandrill::connection()->users();

// This is because the main connection is configured to be the default.
Mandrill::getDefaultConnection(); // This will return main.

// We can change the default connection.
Mandrill::setDefaultConnection('alternative'); // The default is now alternative.
```

If you prefer to use dependency injection over facades like me, then you can inject the manager:

```php
use BlueBayTravel\Mandrill\MandrillManager;

class Foo
{
    protected $mandrill;

    public function __construct(MandrillManager $mandrill)
    {
        $this->mandrill = $mandrill;
    }

    public function bar($id)
    {
        $this->mandrill->users();
    }
}

App::make('Foo')->bar();
```

## License

Laravel Mandrill is licensed under [The MIT License (MIT)](LICENSE).
