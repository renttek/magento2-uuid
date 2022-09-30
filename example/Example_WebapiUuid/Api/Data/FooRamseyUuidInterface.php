<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Api\Data;

use Renttek\Uuid\Api\RamseyUuid\Uuid;

interface FooRamseyUuidInterface
{
    /**
     * @return \Renttek\Uuid\Api\RamseyUuid\Uuid
     */
    public function getId(): Uuid;
}
