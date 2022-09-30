<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Api\Data;

use Renttek\Uuid\Api\SymfonyUid\Ulid;

interface FooSymfonyUlidInterface
{
    /**
     * @return \Renttek\Uuid\Api\SymfonyUid\Ulid
     */
    public function getId(): Ulid;
}
