<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\RamseyUuid;

use Assert\Assertion;
use Ramsey\Uuid\UuidInterface;

class Uuid
{
    private UuidInterface $uuid;

    public function __construct(string $uuid)
    {
        Assertion::classExists(\Ramsey\Uuid\Uuid::class, 'ramsey/uuid is not installed');
        Assertion::true(\Ramsey\Uuid\Uuid::isValid($uuid), 'Invalid uuid given: ' . $uuid);

        $this->uuid = \Ramsey\Uuid\Uuid::fromString($uuid);
    }

    public static function fromUuid(UuidInterface $uuid): self
    {
        return new self($uuid->toString());
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid->toString();
    }
}
