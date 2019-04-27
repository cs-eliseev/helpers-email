[English](https://github.com/cs-eliseev/helpers-email/blob/master/README.md) | Русский

EMAIL CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-email.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-email)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-email.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-email)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-email.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-email/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-email.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-email)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-email)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-email.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-email/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-email.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-email/archive/master.zip)

Данная библиотек состоит из статических методов, которые позволят вам легко обрабатывать, обнаруживать и получать email адреса. 

Репозиторий проекта: https://github.com/cs-eliseev/helpers-email

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


## Описание проекта

CSE HELPERS - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. EMAIL CSE HELPERS, предоставляет дополнительные статические методы, позволяющие вам более эффективно работать с email адресами.

CSE HELPERS создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
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

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-email).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-email
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-email": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-email.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-email/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-email.php](https://github.com/cs-eliseev/helpers-email/blob/master/examples/examples-email.php).

**Скрыть email адрес разной длинны**


Пример для короткого email адреса:
```php
Email::hide('mail@google.com');
// m***@google.com
```

Пример для среднего email адреса:
```php
Email::hide('email@google.com');
// m***l@google.com
```

Пример для длинного email адреса:
```php
Email::hide('email2018@google.com');
// e***l***8@google.com
```

**Проверить домен в email адресе**

Пример:
```php
$domain = 'google.com';
Email::checkDomain('mail@google.com', $domain);
// true
Email::checkDomain('mail@mail.ru', $domain);
// false
```

**Проверка на email адрес**

Пример:
```php
Email::is('mail@google.com');
// true
```

Проверить наличие email адреса в строке:
```php
Email::is('Example text mail@google.com');
// false

**Проверить что email адрес существует**

Пример:
```php
Email::exist('mail@google.com');
// true
```

Проверить наличие email адреса в строке:
```php
Email::exist('Example text mail@google.com');
// true
```

Изменить паттерн проверки email адреса:
```php
Email::exist('Example text mail@inbox.com', '([a-z]+@google.com)');
// false
```

**Извлеч email адрес из строки**

Пример:
```php
Email::extract('Пример text mail@google.com');
// mail@google.com
```

Изменить паттерн проверки email адреса:
```php
Email::extract('Пример text mail@inbox.com', '([a-z]+@google.com)');
// null
```

## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

EMAIL CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-email/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)