<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Model;

use Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface;
use Renttek\Uuid\Api\SymfonyUid\Uuid;

class FooSymfonyUuid implements FooSymfonyUuidInterface
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
