<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Model;

use Example\WebapiUuid\Api\Data\FooRamseyUuidInterface;
use Renttek\Uuid\Api\RamseyUuid\Uuid;

class FooRamseyUuid implements FooRamseyUuidInterface
{
    private Uuid $id;

    public function __construct(Uuid $id)
    {
        $this->id = $id;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}
