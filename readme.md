# XssInput for Laravel

XssInput is a screamingly simple extension of Laravel's Input facade that somewhat mimics the XSS filtering of CodeIgniter's input library. In fact, underneath the hood, this package uses an altered form of CodeIgniter's Security library to filter inputs for XSS.

XSS filtering happens in one of two ways: by setting the `` option in this package's config to `true`, or by passing true as the third option to `Input::get()` or as the only option for `Input::all()`.


- **Author:** Jan Hartigan
- **Website:** [http://frozennode.com](http://frozennode.com)
- **Version:** 1.0.0

## Composer

To install XssInput as a Composer package to be used with Laravel 4, simply add this to your composer.json:

```json
"frozennode/xssinput": "dev-master"
```

..and run `composer update`. Once it's installed, you can register the service provider in `app/config/app.php` in the `providers` array:

```php
'providers' => array(
    'Frozennode\XssInput\XssInputServiceProvider',
)
```

..and change the `Input` alias to point to the facade for XssInput:

```php
'aliases' => array(
	'Input' => 'Frozennode\XssInput\XssInput'
)
```

You could also, instead of doing this, give the XssInput facade a separate alias.

Then publish the config file with `php artisan config:publish frozennode/xssinput`. This will add the file `app/config/packages/frozennode/xssinput/xssinput.php`, which you should look at and understand because it's one option long.