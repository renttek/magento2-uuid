<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Model;

use Example\WebapiUuid\Api\Data\FooRamseyUuidInterface;
use Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface;
use Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface;
use Example\WebapiUuid\Api\FooRepositoryInterface;
use Renttek\Uuid\Api\RamseyUuid;
use Renttek\Uuid\Api\SymfonyUid;

class FooRepository implements FooRepositoryInterface
{
    private RamseyUuid\UuidFactory $ramseyUuidFactory;
    private SymfonyUid\UuidFactory $symfonyUuidFactory;
    private SymfonyUid\UlidFactory $symfonyUlidFactory;

    public function __construct(
        RamseyUuid\UuidFactory $ramseyUuidFactory,
        SymfonyUid\UuidFactory $symfonyUuidFactory,
        SymfonyUid\UlidFactory $symfonyUlidFactory,
    ) {
        $this->ramseyUuidFactory  = $ramseyUuidFactory;
        $this->symfonyUuidFactory = $symfonyUuidFactory;
        $this->symfonyUlidFactory = $symfonyUlidFactory;
    }

    public function getRamseyUuid(): FooRamseyUuidInterface
    {
        return new FooRamseyUuid($this->ramseyUuidFactory->v4());
    }

    public function getRamseyUuidById(RamseyUuid\Uuid $id): FooRamseyUuidInterface
    {
        return new FooRamseyUuid($id);
    }

    public function saveRamseyUuid(FooRamseyUuidInterface $foo): RamseyUuid\Uuid
    {
        return $foo->getId();
    }

    public function getSymfonyUuid(): FooSymfonyUuidInterface
    {
        return new FooSymfonyUuid($this->symfonyUuidFactory->v4());
    }

    public function getSymfonyUuidById(SymfonyUid\Uuid $id): FooSymfonyUuidInterface
    {
        return new FooSymfonyUuid($id);
    }

    public function saveSymfonyUuid(FooSymfonyUuidInterface $foo): SymfonyUid\Uuid
    {
        return $foo->getId();
    }

    public function getSymfonyUlid(): FooSymfonyUlidInterface
    {
        return new FooSymfonyUlid($this->symfonyUlidFactory->create());
    }

    public function getSymfonyUlidById(SymfonyUid\Ulid $id): FooSymfonyUlidInterface
    {
        return new FooSymfonyUlid($id);
    }

    public function saveSymfonyUlid(FooSymfonyUlidInterface $foo): SymfonyUid\Ulid
    {
        return $foo->getId();
    }
}
