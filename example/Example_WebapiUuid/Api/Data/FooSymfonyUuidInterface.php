<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Api\Data;

use Renttek\Uuid\Api\SymfonyUid\Uuid;

interface FooSymfonyUuidInterface
{
    /**
     * @return \Renttek\Uuid\Api\SymfonyUid\Uuid
     */
    public function getId(): Uuid;
}
