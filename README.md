# Header Harmony for Laravel

A lightweight Laravel package that helps you manage, organize, and retrieve custom HTTP headers using Laravel's configuration and .env setup for third-party API requests, whether for development or production. Instead of hardcoding headers in each request, centralize them in configuration and access them with a clean, simple interface.

## Features

- Clean separation of logic and configuration.

- Supports .env dynamic values (secure for production use).

- Compatible with Laravel 12.x and PHP 8.0+.

- Can be used with Laravel's HTTP client or Guzzle.

- Ready for development and production use.

## Requirements

- Laravel 10 / 11 / 12

- PHP 8.0+

## Installation

### 1. Require the package via Composer

```bash
composer require ayoub-amzil/header-harmony

```

### 2. Publish the configuration file

```bash
php artisan vendor:publish --tag=header-harmony-config

```

This will publish the config file to: `config/header-harmony.php`

## Usage/Examples

### 1. Define services and headers in the config file

Edit the `config/header-harmony.php` file:

```php
'openai' => [
    'Authorization' => 'Bearer ' . env('OPENAI_KEY'),
    'Content-Type' => 'application/json',
],
'coinmarketcap' => [
    'X-CMC_PRO_API_KEY' => env('COINMARKETCAP_KEY'),
    'Accept' => 'application/json',
],
'weatherapi' => [
    'key' => env('WEATHER_API_KEY'),
    'Accept' => 'application/json',
],
'test' => [
    'Authorization' => env('TEST'),
    'Content-Type' => 'application/json',
],
```

### 2. Add your API keys to the .env file

```bash
OPENAI_KEY=sk-xxxxx
COINMARKETCAP_KEY=ghp_xxxxxx
WEATHER_API_KEY=abc123
TEST=####
```

### 3. You're now ready to use the package!

Use it anywhere in your Laravel app like:

```php
use HeaderHarmony\HeaderHarmony;

$headers = HeaderHarmony::for('openai');

```

## Error Handling

The `for($service)` method will throw an exception if:

- The service name is not defined in `config/header-harmony.php`

## License

[MIT](https://choosealicense.com/licenses/mit/)
