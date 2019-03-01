<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Email;

// Example: hide short mail
// m***@google.com
var_dump(Email::hide('mail@google.com'));
// Example: hide medium mail
// e***l@google.com
var_dump(Email::hide('email@google.com'));
// Example: hide large mail
// e***l***8@google.com
var_dump(Email::hide('email2018@google.com'));
echo PHP_EOL;

// Example: check domain to email
// true
var_dump(Email::checkDomain('mail@google.com', 'google.com'));
// false
var_dump(Email::checkDomain('mail@mail.ru', 'google.com'));
echo PHP_EOL;

// Example: check email
// true
var_dump(Email::is('mail@google.com'));
// false
var_dump(Email::is('Example text mail@google.com'));
echo PHP_EOL;

// Example: get email
//  mail@google.com
var_dump(Email::get('Example text mail@google.com'));
// null
var_dump(Email::get('Example text mail@inbox.com', '([a-z]+@google.com)'));
echo PHP_EOL;