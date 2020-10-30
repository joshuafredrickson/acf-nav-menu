# ACF Navigation Menu

A navigation menu field for ACF

## Requirements

- [PHP](https://secure.php.net/manual/en/install.php) >= 7.2
- [Composer](https://getcomposer.org/download/)

## Installation

### Bedrock

Install via Composer:

```bash
$ composer require joshuafredrickson/acf-nav-menu
```

## Usage

The field will return the nav menu ID.

Use with `wp_nav_menu`:

```php
$nav_menu_ID = get_field('nav_menu');
wp_nav_menu($args = ['menu' => $nav_menu_ID]);
```

Use with [log1x/navi](https://github.com/Log1x/navi) (recommended):

```php
$nav_menu_ID = get_field('nav_menu');
(new \Log1x\Navi\Navi())->build($nav_menu_ID);
```

### ACF Composer

```php
$field->addField('my_nav_menu_field', 'nav_menu');
```

## Bug Reports

If you discover a bug in ACF Navigation Menu, please [open an issue](https://github.com/joshuafredrickson/acf-nav-menu/issues).

## Contributing

Contributing whether it be through PRs, reporting an issue, or suggesting an idea is encouraged and appreciated.

## License

ACF Nav Menu is provided under the [MIT License](https://github.com/joshuafredrickson/acf-nav-menu/blob/master/LICENSE.md).
