<?php

declare(strict_types = 1);

namespace cse\helpers;

/**
 * Class Email
 *
 * @package cse\helpers
 */
class Email
{
    const UTF8 = 'UTF-8';

    /**
     * Hide email
     *
     * @param $email
     *
     * @return string
     */
    public static function hide(string $email): string
    {
        list($name, $domain) = explode('@', $email);

        $length = mb_strlen($name, self::UTF8);

        if ($length <= 4) {
            // abcd => a***
            $result = mb_substr($name, 0, 1, self::UTF8) . str_repeat('*', $length - 1);
        } elseif ($length > 4 && $length <= 6) {
            // abcdef => a****f
            $result = mb_substr($name, 0, 1, self::UTF8)
                    . str_repeat('*', $length - 2)
                    . mb_substr($name, -1, 1, self::UTF8);
        } else {
            // abcdefghijk => a****f****k
            // abcdefghijkl => a****f*****k
            $result = mb_substr($name, 0, 1, self::UTF8)
                    . str_repeat('*', (int) floor(($length - 3) / 2))
                    . mb_substr($name, (int) ceil(($length - 2) / 2), 1, self::UTF8)
                    . str_repeat('*', (int) ceil(($length - 3) / 2))
                    . mb_substr($name, -1, 1, self::UTF8);
        }

        return $result . '@' . $domain;
    }

    /**
     * Check domain to email
     *
     * @param string $email
     * @param string $domain
     *
     * @return bool
     */
    public static function checkDomain(string $email, string $domain): bool
    {
        $email = trim($email);

        return strlen($email) == 0 ? false : (preg_match('/^.*@' . $domain . '$/i', $email) === 1);
    }

    /**
     * Check email
     *
     * @param string $email
     *
     * @return bool
     */
    public static function is(string $email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}