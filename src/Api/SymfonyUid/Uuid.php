<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;

class Uuid
{
    private \Symfony\Component\Uid\Uuid $uuid;

    public function __construct(string $uuid)
    {
        Assertion::classExists(\Symfony\Component\Uid\Uuid::class, 'symfony/uid is not installed');
        Assertion::true(\Symfony\Component\Uid\Uuid::isValid($uuid), 'Invalid uuid given: ' . $uuid);

        $this->uuid = \Symfony\Component\Uid\Uuid::fromString($uuid);
    }

    public static function fromUuid(\Symfony\Component\Uid\Uuid $uuid): self
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
}
