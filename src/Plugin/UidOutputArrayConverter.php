<?php

declare(strict_types=1);

namespace Renttek\Uuid\Plugin;

use Magento\Framework\Reflection\DataObjectProcessor;
use Renttek\Uuid\Api\RamseyUuid;
use Renttek\Uuid\Api\SymfonyUid;

class UidOutputArrayConverter
{
    /**
     * @return string|mixed
     */
    public function aroundBuildOutputDataArray(
        DataObjectProcessor $processor,
        callable $proceed,
        mixed $data,
        string $type
    ): mixed {
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
