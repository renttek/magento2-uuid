<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;

class Ulid
{
    private \Symfony\Component\Uid\Ulid $ulid;

    public function __construct(string $ulid)
    {
        Assertion::classExists(\Symfony\Component\Uid\Ulid::class, 'symfony/uid is not installed');
        Assertion::true(\Symfony\Component\Uid\Ulid::isValid($ulid), 'Invalid ulid given: ' . $ulid);

        $this->ulid = \Symfony\Component\Uid\Ulid::fromString($ulid);
    }

    public static function fromUlid(\Symfony\Component\Uid\Ulid $ulid): self
    {
        return new self((string)$ulid);
    }

    /**
     * @return string
     */
    public function getUlid(): string
    {
        return (string)$this->ulid;
    }
}
