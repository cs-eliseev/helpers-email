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
}