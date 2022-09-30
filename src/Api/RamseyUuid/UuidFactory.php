<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\RamseyUuid;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Type\Integer as IntegerObject;
use Ramsey\Uuid\UuidInterface;

class UuidFactory
{
    /**
     * @throws AssertionFailedException
     */
    public function __construct()
    {
        Assertion::classExists(\Ramsey\Uuid\Uuid::class, 'ramsey/uuid is not installed');
    }

    public function v1(Hexadecimal|int|string|null $node = null, ?int $clockSeq = null): Uuid
    {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid1($node, $clockSeq));
    }

    public function v2(
        int $localDomain,
        ?IntegerObject $localIdentifier = null,
        ?Hexadecimal $node = null,
        ?int $clockSeq = null
    ): Uuid {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid2($localDomain, $localIdentifier, $node, $clockSeq));
    }

    public function v3(string|UuidInterface $ns, string $name): Uuid
    {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid3($ns, $name));
    }

    public function v4(): Uuid
    {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid4());
    }

    public function v5(string|UuidInterface $ns, string $name): Uuid
    {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid5($ns, $name));
    }

    public function v6(?Hexadecimal $node = null, ?int $clockSeq = null): Uuid
    {
        return Uuid::fromUuid(\Ramsey\Uuid\Uuid::uuid6($node, $clockSeq));
    }
}
