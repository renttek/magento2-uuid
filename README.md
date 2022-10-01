# Renttek_Uuid

This module adds the possibility to use Uuids (`ramsey/uuid`/`symfony/uid`) and Ulids (`symfony/uid`) with the Magento Webapi.
An example module can be found in the `examples` directory.

## Installation

```shell
composer require renttek/magento2-uuid

bin/magento module:enable Renttek_Uuid
bin/magento setup:upgrade
```

## Usage

To use the Uuids/Ulids in the magento 2 webapi, you have to use one of the provided objects:

- `\Renttek\Uuid\Api\RamseyUuid\Uuid`
- `\Renttek\Uuid\Api\SymfonyUid\Uuid`
- `\Renttek\Uuid\Api\SymfonyUid\Ulid`

These objects wrap the original Uuid/Ulid objects from the `ramsey/uuid` or `symfony/uid` packages, to allow de-/serialization in the API.

### Uuid/Ulid as url parameter

If you want to pass an Uuid/Ulid as a url parameter, simply add the type hinted parameter to your API Interface:
```php
namespace Example\WebapiUuid\Api;

interface FooRepositoryInterface
{
    /**
     * @param \Renttek\Uuid\Api\RamseyUuid\Uuid $id
     *
     * @return \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface
     */
    public function getById(\Renttek\Uuid\Api\RamseyUuid\Uuid $id): \Example\WebapiUuid\Api\Data\FooRamseyUuidInterface;
}
```

And define the URL parameter like a normal string value in the `webapi.xml`:
```xml
<?xml version="1.0"?>
<routes xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Webapi:etc/webapi.xsd">
    <route url="/V1/foo/:id" method="GET">
        <service class="Example\WebapiUuid\Api\FooRepositoryInterface" method="getById" />
        <resources>
            <resource ref="anonymous" />
        </resources>
    </route>
</routes>
```

The API can then be called normally:
```http request
GET https://demo.local/rest/V1/uuid-test/ramsey-uuid/92b1a9a7-c78e-477f-9d78-ef5a1f5e741b
```

The type is detected from the interface and the string is validated and converted into an Uuid or Ulid instance.


### Uuid/Ulid as object property type

If you want to use an Uuid/Ulid as a property type, the value is automatically converted to a string when the object is returned from the API:

If your DTO looks like this:
```php
<?php
namespace Example\WebapiUuid\Api\Data;

interface FooSymfonyUlidInterface
{
    /**
     * @return \Renttek\Uuid\Api\SymfonyUid\Ulid
     */
    public function getId(): \Renttek\Uuid\Api\SymfonyUid\Ulid;
}
```

The resulting output from the API will look like this:
```json
{
    "id": "01GE75ND0WH6VTC2TNSG4B5RSD"
}
```

On the other way around, if you want to pass an Uuid/Ulid to the API (using the same DTO as above), your payload JSON would look exactly like the output:
```json
{
    "id": "01GE75ND0WH6VTC2TNSG4B5RSD"
}
```

The string value/representation is validated and converted into the defined Uuid/Ulid type automatically.
