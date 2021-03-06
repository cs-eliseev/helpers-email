<?php

use cse\helpers\Email;
use PHPUnit\Framework\TestCase;

class TestEmail extends TestCase
{
    /**
     * @param string $email
     * @param string $expected
     *
     * @dataProvider providerHide
     */
    public function testHide(string $email, string $expected): void
    {
        $this->assertEquals($expected, Email::hide($email));
    }

    /**
     * @return array
     */
    public function providerHide(): array
    {
        return [
            [
                'mail@google.com',
                'm***@google.com',
            ],
            [
                'email@google.com',
                'e***l@google.com',
            ],
            [
                'email2018@google.com',
                'e***l***8@google.com',
            ],
        ];
    }

    /**
     * @param string $email
     * @param string $domain
     * @param bool $expected
     *
     * @dataProvider providerCheckDomain
     */
    public function testCheckDomain(string $email, string $domain, bool $expected): void
    {
        $this->assertEquals($expected, Email::checkDomain($email, $domain));
    }

    /**
     * @return array
     */
    public function providerCheckDomain(): array
    {
        return [
            [
                'mail@google.com',
                'google.com',
                true,
            ],
            [
                'mail@mail.ru',
                'google.com',
                false,
            ],
        ];
    }

    /**
     * @param string $email
     * @param bool $expected
     *
     * @dataProvider providerIs
     */
    public function testIs(string $email, bool $expected): void
    {
        $this->assertEquals($expected, Email::is($email));
    }

    /**
     * @return array
     */
    public function providerIs(): array
    {
        return [
            [
                '',
                false,
            ],
            [
                'mail@google.com',
                true,
            ],
            [
                'Test text mail@google.com',
                false,
            ],
            [
                'mail@google.com test text',
                false,
            ],
        ];
    }

    /**
     * @param string $email
     * @param string $format
     * @param bool $expected
     *
     * @dataProvider providerExist
     */
    public function testExist(string $email, string $format, bool $expected): void
    {
        $this->assertEquals($expected, Email::exist($email, $format));
    }

    /**
     * @return array
     */
    public function providerExist(): array
    {
        return [
            [
                '',
                Email::PATTERN,
                false,
            ],
            [
                'email@google.com',
                Email::PATTERN,
                true,
            ],
            [
                'Test text email@google.com',
                '([a-z]+@google.com)',
                true,
            ],
            [
                'Test text email@ema.com',
                '([a-z]+@google.com)',
                false,
            ],
            [
                'Test text @google.com test text',
                Email::PATTERN,
                false,
            ],
        ];
    }

    /**
     * @param string $email
     * @param string $format
     * @param null|string $expected
     *
     * @dataProvider providerExtract
     */
    public function testExtract(string $email, string $format, ?string $expected): void
    {
        $this->assertEquals($expected, Email::extract($email, $format));
    }

    /**
     * @return array
     */
    public function providerExtract(): array
    {
        return [
            [
                '',
                Email::PATTERN,
                null,
            ],
            [
                'email@google.com',
                Email::PATTERN,
                'email@google.com',
            ],
            [
                'Test text email@google.com',
                Email::PATTERN,
                'email@google.com',
            ],
            [
                'Test text email@google.com',
                '([a-z]+@google.com)',
                'email@google.com',
            ],
            [
                'Test text email@ema.com',
                '([a-z]+@google.com)',
                null,
            ],
            [
                'Test text @google.com test text',
                Email::PATTERN,
                null,
            ],
        ];
    }

    /**
     * @param string $email
     * @param string $format
     * @param null|array $expected
     *
     * @dataProvider providerExtractAll
     */
    public function testExtractAll(string $email, string $format, ?array $expected): void
    {
        $this->assertEquals($expected, Email::extractAll($email, $format));
    }

    /**
     * @return array
     */
    public function providerExtractAll(): array
    {
        return [
            [
                '',
                Email::PATTERN,
                null,
            ],
            [
                'email@google.com',
                Email::PATTERN,
                ['email@google.com'],
            ],
            [
                'Test text email@google.com, mail@inbox.com',
                Email::PATTERN,
                ['email@google.com', 'mail@inbox.com'],
            ],
            [
                'Test text email@google.com, mail@inbox.com, mail@mail.ru',
                '([a-z]+@google.com)',
                ['email@google.com'],
            ],
            [
                'Test text mail@inbox.com, mail@mail.ru',
                '([a-z]+@google.com)',
                null,
            ],
            [
                'Test text @google.com test text',
                Email::PATTERN,
                null,
            ],
        ];
    }
}