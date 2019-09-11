# Unit conversion and guessing simplified

[![Github Actions CI](https://github.com/nkootstra/unit-conversion/workflows/Continuous%20Integration/badge.svg)](https://github.com/nkootstra/unit-conversion)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/nkootstra/unit-conversion.svg?style=flat-square)](https://packagist.org/packages/nkootstra/unit-conversion)
[![Total Downloads](https://img.shields.io/packagist/dt/nkootstra/unit-conversion.svg?style=flat-square)](https://packagist.org/packages/nkootstra/unit-conversion)

This package is made with the intention to make it easier to convert units. It's also possible to let the package figure out what kind unit has been used. 

## Installation

You can install the package via composer:

```bash
composer require nkootstra/unit-conversion
```

## Usage

``` php
$guess = new UnitGuesser;
$unit = $guess->guess('2,5 x 5 l');
$unit->getQuantity(); // 12.5
$unit->getUnit(); // liter
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email niels.kootstra@gmail.com instead of using the issue tracker.

## Credits

- [Niels Kootstra](https://github.com/nkootstra)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
