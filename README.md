`.env` file is used very often in projects. Especially when it comes to some kind of powerful framework. It would be very convenient to add variables from the `.env` file, for example, directly to the `$_ENV` array and use them from there. `EnvParser` is a very simple and fast class for adding some settings to global variables. `EnvParser` has no external dependencies, which guarantees that it is simplicity and fast. It's installation is very simple.

> **Note:** The minimum required `PHP` version is `7.0`

1. Install package:
```shell
composer require lexxyit/env-parser:dev-master
```

2. Create environment file `.env`:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_PASSWORD=super_secure_password_12345
```

3. Now, let's instantiate the `EnvParser` class and use it's public `load()` method. This method needs only one parameter with path to `.env` file. In my case I include it before the configs with connecting to databases.

```php
$envParser = new LeXxyIT\EnvParser\EnvParser();
$envParser->load(__DIR__ . '/.env');
```

As a result, the variables will be added to the global environment and you can use it in your configuration files. You can check it:

```php
print_r($_ENV);
```

Result:

```
Array
(
    [DB_HOST] => 127.0.0.1
    [DB_PORT] => 3306
    [DB_PASSWORD] => super_secure_password_12345
)
```

Enjoy it!
