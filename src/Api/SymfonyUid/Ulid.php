<?php

declare(strict_types=1);

namespace Renttek\Uuid\Api\SymfonyUid;

use Assert\Assertion;
use Stringable;
use Symfony\Component\Uid\Ulid as SymfonyUlid;

class Ulid implements Stringable
{
    private SymfonyUlid $ulid;

    public function __construct(string $ulid)
    {
        Assertion::classExists(SymfonyUlid::class, 'symfony/uid is not installed');
        Assertion::true(SymfonyUlid::isValid($ulid), 'Invalid ulid given: ' . $ulid);

        $this->ulid = SymfonyUlid::fromString($ulid);
    }

    public static function fromUlid(SymfonyUlid $ulid): self
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

    public function __toString(): string
    {
        return $this->getUlid();
    }
}
