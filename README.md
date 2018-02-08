# INFO

Using PHP-ref is a debugger for Drupal 8.

# INSTALL

By the moment this port is not distributed on Drupal's packagist repository.

Add the following entry to your `composer.json` `repositories` entry:

```json
{
    "type": "vcs",
    "url": "https://github.com/Accelys/ref_debug"
}
```

Then run `composer require drupal/ref_debug`

Please refer to [this issue](https://www.drupal.org/project/ref_debug/issues/2943078).

# USAGE

Enable module.

Basic usage from php-ref documentation:

## Devel dumper plugin

Select _PHP-Ref_ as the default dumper at `/admin/config/development/devel` and calls to `dpm()` and other dump helpers will be using RefDebug.

_Or_ 

Override the default dumper in your `settings.local.php`:

`$config['devel.settings']['devel_dumper'] = 'ref_debug';`

## Display info about defined classes

`r(get_declared_classes());`

Display info about global variables

`r($GLOBALS)`

To print in text mode you can use the rt() function instead:

`rt($var);`

To terminate the script after the info is dumped, prepend the bitwise NOT operator:

```php
~r($var);   // html
~rt($var);  // text
```

Prepending the error control operator (@) will return the information:

```php
$output = @r($var);   // html
$output = @rt($var);  // text
```

# Keyboard shortcuts (javascript must be enabled):

X - collapses / expands all levels

For more options, see: https://github.com/digitalnature/php-ref
