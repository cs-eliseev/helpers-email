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
    const PATTERN = '(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))';

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

    /**
     * Check email exist to string
     *
     * @param string $string
     * @param string $pattern
     * @return bool
     */
    public static function exist(string $string, string $pattern = self::PATTERN): bool
    {
        return preg_match('/' . $pattern . '/iD', $string) === 1;
    }

    /**
     * Get email to string
     *
     * @param string $string
     * @param string $pattern
     * @return null|string
     */
    public static function get(string $string, string $pattern = self::PATTERN): ?string
    {
        return preg_match('/' . $pattern . '/iD', $string, $email) === 1 ? $email[0] : null;
    }
}