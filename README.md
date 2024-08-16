English | [Русский](https://github.com/cs-eliseev/helpers-email/blob/master/README.ru_RU.md)

EMAIL CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-email.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-email)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-email.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-email)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-email.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-email/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-email.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-email)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-email)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-email.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-email/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-email.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-email/archive/master.zip)

The helpers allows you manipulating, extract, detecting EMAIL.

Project repository: https://github.com/cs-eliseev/helpers-email

**DEMO**
```php
switch (true) {
    case Email::is($emial):
        break;
    case Email::exist($emial):
        $emial = Email::extract($emial);
        break;
    default:
        new Exception('Email is not exist');
}

$emial = Email::hide($emial);
```

***

## Introduction

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.md) is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. 
EMAIL CSE HELPERS for manipulating, extract and detecting email.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.md) was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-email).

### Composer

Execute the following command to get the latest version of the package:
```bash
composer require cse/helpers-email
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-email": "*"
    }
}
```

### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/helpers-email.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-email/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. 
See example [examples-email.php](https://github.com/cs-eliseev/helpers-email/blob/master/examples/examples-email.php).

**HIDE email**

Example short email:
```php
Email::hide('mail@google.com');
// m***@google.com
```

Example medium email:
```php
Email::hide('email@google.com');
// m***l@google.com
```

Example large email:
```php
Email::hide('email2018@google.com');
// e***l***8@google.com
```

**CHECK DOMAIN to email**

Example:
```php
$domain = 'google.com';
Email::checkDomain('mail@google.com', $domain);
// true
Email::checkDomain('mail@mail.ru', $domain);
// false
```

**IS email**

Example:
```php
Email::is('mail@google.com');
// true
```

Check email to string:
```php
Email::is('Example text mail@google.com');
// false
```

**EXIST email**

Example:
```php
Email::exist('mail@google.com');
// true
```

Check email to string:
```php
Email::exist('Example text mail@google.com');
// true
```

Change pattern:
```php
Email::exist('Example text mail@inbox.com', '([a-z]+@google.com)');
// false
```

**EXTRACT email from string**

Example:
```php
Email::extract('Example text mail@google.com');
// mail@google.com
```

Change pattern:
```php
Email::extract('Example text mail@inbox.com', '([a-z]+@google.com)');
// null
```

**EXTRACT ALL email from string**

Example:
```php
Email::extractAll('Example text mail@google.com, mail@inbox.com');
/**
* [
*     0 => 'mail@google.com',
*     1 => 'mail@inbox.com'
* ]
*/
```

Change pattern:
```php
Email::extract('Example text mail@google.com, mail@inbox.com', '([a-z]+@google.com)');
/**
* [
*     0 => 'mail@google.com'
* ]
*/
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```bash
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Donating

You can support this project [here](https://www.paypal.me/cseliseev/10usd). 
You can also help out by contributing to the project, or reporting bugs. 
Even voicing your suggestions for features is great. Anything to help is much appreciated.


## License

The EMAIL CSE HELPERS is open-source PHP library licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/helpers-email/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)