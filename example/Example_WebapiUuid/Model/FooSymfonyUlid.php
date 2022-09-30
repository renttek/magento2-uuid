<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Model;

use Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface;
use Renttek\Uuid\Api\SymfonyUid\Ulid;

class FooSymfonyUlid implements FooSymfonyUlidInterface
{
    private Ulid $id;

    public function __construct(Ulid $id)
    {
        $this->id = $id;
    }

    public function getId(): Ulid
    {
        return $this->id;
    }
}
