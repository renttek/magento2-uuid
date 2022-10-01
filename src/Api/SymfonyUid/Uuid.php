<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;
use Stringable;
use Symfony\Component\Uid\Uuid as SymfonyUuid;

class Uuid implements Stringable
{
    private SymfonyUuid $uuid;

    public function __construct(string $uuid)
    {
        Assertion::classExists(SymfonyUuid::class, 'symfony/uid is not installed');
        Assertion::true(SymfonyUuid::isValid($uuid), 'Invalid uuid given: ' . $uuid);

        $this->uuid = SymfonyUuid::fromString($uuid);
    }

    public static function fromUuid(SymfonyUuid $uuid): self
    {
        return new self((string)$uuid);
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return (string)$this->uuid;
    }

    public function __toString(): string
    {
        return $this->getUuid();
    }
}
