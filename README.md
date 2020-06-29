# PHP Wrapper for the HPE Intelligent Management Center API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fredbradley/imcapi.svg?style=flat-square)](https://packagist.org/packages/fredbradley/imcapi)
[![Build Status](https://img.shields.io/travis/fredbradley/imcapi/master.svg?style=flat-square)](https://travis-ci.org/fredbradley/imcapi)
![StyleCI Status](https://github.styleci.io/repos/274608789/shield)
[![Total Downloads](https://img.shields.io/packagist/dt/fredbradley/imcapi.svg?style=flat-square)](https://packagist.org/packages/fredbradley/imcapi)

You can find more information about the HPE IMC here: https://support.hpe.com/hpesc/public/docDisplay?docId=emr_na-c05367573

## Installation

You can install the package via composer:

```bash
composer require fredbradley/imcapi
```

## Usage
This project is still very much a work in progress. The intention is that more default methods will be added.  
``` php
$imc = new \FredBradley\IMCAPI\Imcapi("http://mydomain.tld:8080/imcrs/", "username", "pa55w0rd");

$listDevices = $imc->getDevices();
$anyOtherRequest = $imc->request('/endpoint');
```

You can see a list of valid endpoints on your device: http://mydomain.tld:8080/imcrs

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email code@fredbradley.uk instead of using the issue tracker.

## Credits

- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
