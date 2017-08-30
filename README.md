# Laravel-ASCII-Table
This package convert multi-dimensional arrays into ASCII tables

Based on this repo https://github.com/pgooch/PHP-Ascii-Tables

This class will convert multi-dimensional arrays into ASCII Tabled, and vise-versa.

## Installation

You can install this package via composer using this command:

```bash
composer require tridcatij/asciitables
```

Add the service provider to your `config/app.php` file within the `providers` key:

```php
// ...
'providers' => [
    /*
     * Package Service Providers...
     */

    Tridcatij\Asciitables\AsciitableServiceProvider::class,
],
// ...
```
And facade: 

```php
// ...
'aliases' => [
    /*
     * Class Aliases...
     */

    'Asciitable' => Tridcatij\Asciitables\AsciitableFacade::class,
],
// ...
```

## Usage

Add ```Asciitable``` facade to your controller. You can then call one of three functions:

- `make_table($array,[$title],[$return])` will make a table with the multi-dimensional `$array` passed. Additionally you can specify an optional `$title` that will be centered on a line above the table. The `$return` variable gives you 3 options; `True` will return the table as an array, `False` will output the array directly, and a `String` will attempt to save the array in a text file with the given name/location and will return true/false upon completlion. If false the error message will be logged to the `$error` class variable.
- `break_table($table)` Takes an table or a filename that containing a text file output from `make_table()` and will return a multi-dimensional array similar to the one that you would have given it `make_table()` to create it.
- `scrape_table($table,$key,[$value])` will take a table or link to a file containing a table as `break_table()` does but will only return they key/value pairs you request. If you do not include the value it will use the key as the value and return it in a numeric array. It should be noted that if you use both key and value that muliple keys will overrite eachother and the returning array will only contain the last one in the table.

## Examples

```php
use Asciitable;

$data = [
    ['id' => 1, 'name' => 'Tom', 'status' => 'active'],
    ['id' => 2, 'name' => 'Nick', 'status' => 'disabled'],
    ['id' => 3, 'name' => 'Peter', 'status' => 'active'],
];

$table = Asciitable::make_table($data, 'Users', true);

echo "<pre>$table</pre>";

print_r(Asciitable::scrape_table($table,'name','status'));

```
### Output

          	Users
	+----+-------+----------+
	| id | name  | status   |
	+----+-------+----------+
	| 1  | Tom   | active   |
	| 2  | Nick  | disabled |
	| 3  | Peter | active   |
	+----+-------+----------+

`Array ( [Tom] => active [Nick] => disabled [Peter] => active )`
