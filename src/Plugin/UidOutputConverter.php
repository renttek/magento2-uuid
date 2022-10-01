<?php

declare(strict_types=1);

namespace Renttek\Uuid\Plugin;

use Renttek\Uuid\Api\RamseyUuid;
use Renttek\Uuid\Api\SymfonyUid;

class UidOutputConverter
{
    public function aroundConvertValue(
        $processor,
        callable $proceed,
        mixed $data,
        string $type
    ) {
        return $this->isUid($data)
            ? (string)$data
            : $proceed($data, $type);
    }

    private function isUid(mixed $data): bool
    {
        return $data instanceof RamseyUuid\Uuid
            || $data instanceof SymfonyUid\Uuid
            || $data instanceof SymfonyUid\Ulid;
    }
}
