<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;
use Assert\AssertionFailedException;

class UlidFactory
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct()
    {
        Assertion::classExists(\Symfony\Component\Uid\Ulid::class, 'symfony/uuid is not installed');
    }

    public function create(): Ulid
    {
        return Ulid::fromUlid(new \Symfony\Component\Uid\Ulid());
    }
}
