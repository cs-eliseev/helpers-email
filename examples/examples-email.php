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
