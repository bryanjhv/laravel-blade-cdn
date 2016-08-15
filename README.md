# Laravel Blade CDN

A [Blade][blade] directive for getting asset URLs according to app environment.


## Installation

Require this package with [Composer][composer] using the following command

```bash
composer require bryanjhv/laravel-blade-cdn
```

After updating Composer, add the service provider to the `providers` array in
your `config/app.php` file:

```php
Bryanjhv\BladeCdn\BladeCdnServiceProvider::class,
```

Finally, publish the config file, so you can configure your own CDN aliases and
prefix:

```bash
php artisan vendor:publish --provider="Bryanjhv\BladeCdn\BladeCdnServiceProvider" --tag=config
```


## Usage

**Important**: First at all, please remove all your cached views, using:

```bash
php artisan view:clear
```

The service provider makes the `@cdn` Blade directive available, so you can use
it like so (working on `resources/views/sample.blade.php`):

```blade
<link rel="stylesheet" href="@cdn('bootstrap-css')" />
<script src="@cdn('jquery')"></script>
<script src="@cdn('bootstrap-js')"></script>
<script src="@cdn('js/main.js')"></script>
```

The above code will be expanded, in production, using the default configuration
file the package ships with, to:

```html
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="[APP_URL]/js/main.js"></script>
```

Or, in any other environment, to:

```html
<link rel="stylesheet" href="[APP_URL]/css/bootstrap.min.css" />
<script src="[APP_URL]/js/jquery.min.js"></script>
<script src="[APP_URL]/js/bootstrap.min.js"></script>
<script src="[APP_URL]/js/main.js"></script>
```

In both cases, `[APP_URL]` is expanded to your application URL using the `asset`
Laravel helper.

Of course, you may define any custom alias and prefix after publishing the
configuration by editing the `config/blade-cdn.php` file.


## License

This project is released under the MIT license.


[blade]: https://laravel.com/docs/blade
[composer]: https://getcomposer.org
