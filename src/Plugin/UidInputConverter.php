<?php

declare(strict_types=1);

namespace Renttek\Uuid\Plugin;

use Magento\Framework\Webapi\ServiceInputProcessor;
use Renttek\Uuid\Api\RamseyUuid;
use Renttek\Uuid\Api\SymfonyUid;

class UidInputConverter
{
    public function aroundConvertValue(
        ServiceInputProcessor $processor,
        callable $proceed,
        mixed $data,
        string $type
    ) {
        if (!is_string($data)) {
            return $proceed($data, $type);
        }

        return match($type) {
            RamseyUuid\Uuid::class => new RamseyUuid\Uuid($data),
            SymfonyUid\Uuid::class => new SymfonyUid\Uuid($data),
            SymfonyUid\Ulid::class => new SymfonyUid\Ulid($data),
            default => $proceed($data, $type),
        };
    }
}
