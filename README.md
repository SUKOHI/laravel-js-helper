# laravel-js-helper

A Laravel package that provides helper functions for JavaScript like `route()`, `dd()` and `constant()`.

***Available versions:***
- Laravel 9+

## Installation

Run the following command to install the package:

```bash
composer require sukohi/laravel-js-helper
```
Then, publish a config file called `config/js_helper.php`.

```bash
php artisan vendor:publish --tag="laravel-js-helper-config"
```

After that, set your route names and/or constants that you'd like to use in JavaScript in the file`.

## Usage

    <script src="/js/helper.js"></script>
    <script>

        window.onload = () => {

            // URL from routes
            const url = route('item.edit', 1); // <- here
            console.log(url);

            // Constants
            const appName = constant('APP_NAME'); // <- here
            console.log(appName);

            // Debug
            const str1 = 'Test 1';
            const str2 = 'Test 2';
            const str3 = 'Test 3';
            dd(str1, str2, str3); // <- here

        };

    </script>

## License

This package is licensed under the MIT License.