EMAIL CSE HELPERS
=======

The helpers allows you manipulating, get, detecting EMAIL.

Project repository: https://github.com/cs-eliseev/helpers-email

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. EMAIL CSE HELPERS for manipulating, get and detecting email.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-email).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-email
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-email": "*"
    }
}
```

### Git

Clone this repository locally:
```shell
git clone https://github.com/cs-eliseev/helpers-email.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-email/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-email.php](https://github.com/cs-eliseev/helpers-email/blob/master/examples/examples-email.php).

**Hide email**

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


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-email/blob/master/LICENSE.md) file for licensing details.