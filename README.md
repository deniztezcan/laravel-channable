# Laravel Channable
[![Latest Stable Version](https://poser.pugx.org/deniztezcan/laravel-channable/v/stable)](https://packagist.org/packages/deniztezcan/laravel-channable) 
[![Total Downloads](https://poser.pugx.org/deniztezcan/laravel-channable/downloads)](https://packagist.org/packages/deniztezcan/laravel-channable) 
[![Latest Unstable Version](https://poser.pugx.org/deniztezcan/laravel-channable/v/unstable)](https://packagist.org/packages/deniztezcan/laravel-channable) 
[![License](https://poser.pugx.org/deniztezcan/laravel-channable/license)](https://packagist.org/packages/deniztezcan/laravel-channable)
[![Maintainability](https://api.codeclimate.com/v1/badges/9057b79855fcc029f989/maintainability)](https://codeclimate.com/github/deniztezcan/laravel-channable/maintainability)

A Laravel package for the Channable API.

## Instalation
```
composer require deniztezcan/laravel-channable
```

Add the facade to the facades array:
```php
    'aliases' => [
    	//other things here

    	'Channable' => DenizTezcan\Channable\Facades\Channable::class,
    ];
```

Finally, publish the configuration files:
```
php artisan vendor:publish --provider="DenizTezcan\Channable\ChannableServiceProvider"
```

### Configuration
Please set your API key: `CHANNABLE_BEARER_TOKEN` and `CHANNABLE_COMPANY_ID` in your .env file.