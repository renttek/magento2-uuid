<?php

declare(strict_types=1);

namespace Example\WebapiUuid\Api;

interface FooRepositoryInterface
{
    /* Ramsey UUID ****************************************************************************************************/

    /**
     * @return \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface
     */
    public function getRamseyUuid(): \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface;

    /**
     * @param \Renttek\Uuid\Api\RamseyUuid\Uuid $id
     *
     * @return \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface
     */
    public function getRamseyUuidById(\Renttek\Uuid\Api\RamseyUuid\Uuid $id): \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface;

    /**
     * @param \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface $foo
     *
     * @return \Renttek\Uuid\Api\RamseyUuid\Uuid
     */
    public function saveRamseyUuid(\Example\WebapiUuid\Api\Data\FooRamseyUuidInterface $foo): \Renttek\Uuid\Api\RamseyUuid\Uuid;

    /* Symfony UUID ***************************************************************************************************/

    /**
     * @return \Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface
     */
    public function getSymfonyUuid(): \Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface;

    /**
     * @param \Renttek\Uuid\Api\SymfonyUid\Uuid $id
     *
     * @return \Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface
     */
    public function getSymfonyUuidById(\Renttek\Uuid\Api\SymfonyUid\Uuid $id): \Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface;

    /**
     * @param \Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface $foo
     *
     * @return \Renttek\Uuid\Api\SymfonyUid\Uuid
     */
    public function saveSymfonyUuid(\Example\WebapiUuid\Api\Data\FooSymfonyUuidInterface $foo): \Renttek\Uuid\Api\SymfonyUid\Uuid;

    /* Symfony ULID ***************************************************************************************************/

    /**
     * @return \Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface
     */
    public function getSymfonyUlid(): \Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface;

    /**
     * @param \Renttek\Uuid\Api\SymfonyUid\Ulid $id
     *
     * @return \Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface
     */
    public function getSymfonyUlidById(\Renttek\Uuid\Api\SymfonyUid\Ulid $id): \Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface;

    /**
     * @param \Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface $foo
     *
     * @return \Renttek\Uuid\Api\SymfonyUid\Ulid
     */
    public function saveSymfonyUlid(\Example\WebapiUuid\Api\Data\FooSymfonyUlidInterface $foo): \Renttek\Uuid\Api\SymfonyUid\Ulid;
}
