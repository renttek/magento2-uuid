<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;
use Assert\AssertionFailedException;

class UuidFactory
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct()
    {
        Assertion::classExists(\Symfony\Component\Uid\Uuid::class, 'symfony/uuid is not installed');
    }

    public function v1(): Uuid
    {
        return Uuid::fromUuid(\Symfony\Component\Uid\Uuid::v1());
    }

    public function v3(\Symfony\Component\Uid\Uuid $namespace, string $name): Uuid
    {
        return Uuid::fromUuid(\Symfony\Component\Uid\Uuid::v3($namespace, $name));
    }

    public function v4(): Uuid
    {
        return Uuid::fromUuid(\Symfony\Component\Uid\Uuid::v4());
    }

    public function v5(\Symfony\Component\Uid\Uuid $namespace, string $name): Uuid
    {
        return Uuid::fromUuid(\Symfony\Component\Uid\Uuid::v5($namespace, $name));
    }

    public function v6(): Uuid
    {
        return Uuid::fromUuid(\Symfony\Component\Uid\Uuid::v6());
    }
}
