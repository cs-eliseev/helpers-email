<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Email;

// Example: hide short mail
$label = 'Hide short mail: ';
// m***@google.com
var_dump($label . Email::hide('mail@google.com'));
// Example: hide medium mail
// e***l@google.com
var_dump($label . Email::hide('email@google.com'));
// Example: hide large mail
// e***l***8@google.com
var_dump($label . Email::hide('email2018@google.com'));
echo PHP_EOL;

// Example: check domain to email
$label = 'Check domain to email: ';
// true
var_dump($label . Email::checkDomain('mail@google.com', 'google.com'));
// false
var_dump($label . Email::checkDomain('mail@mail.ru', 'google.com'));
echo PHP_EOL;

// Example: check email
$label = 'Check email: ';
// true
var_dump($label . Email::is('mail@google.com'));
// false
var_dump($label . Email::is('Example text mail@google.com'));
echo PHP_EOL;

// Example: extract email
$label = 'Extract email: ';
//  mail@google.com
var_dump($label . Email::extract('Example text mail@google.com'));
// null
var_dump($label . Email::extract('Example text mail@inbox.com', '([a-z]+@google.com)'));
echo PHP_EOL;