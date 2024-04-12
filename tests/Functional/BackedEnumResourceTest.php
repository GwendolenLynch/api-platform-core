<?php

/*
 * This file is part of the API Platform project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ApiPlatform\Tests\Functional;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Tests\Fixtures\TestBundle\ApiResource\BackedEnumIntegerResource;
use ApiPlatform\Tests\Fixtures\TestBundle\ApiResource\BackedEnumStringResource;

final class BackedEnumResourceTest extends ApiTestCase
{
    public static function providerEnums(): iterable
    {
        yield 'Int enum collection' => [BackedEnumIntegerResource::class, GetCollection::class, '_api_/backed_enum_integer_resources{._format}_get_collection'];
        yield 'Int enum item' => [BackedEnumIntegerResource::class, Get::class, '_api_/backed_enum_integer_resources/{id}{._format}_get'];

        yield 'String enum collection' => [BackedEnumStringResource::class, GetCollection::class, '_api_/backed_enum_string_resources{._format}_get_collection'];
        yield 'String enum item' => [BackedEnumStringResource::class, Get::class, '_api_/backed_enum_string_resources/{id}{._format}_get'];
    }

    /** @dataProvider providerEnums */
    public function testOnlyGetOperationsAddedWhenNonSpecified(string $resourceClass, string $operationClass, string $operationName): void
    {
        $factory = self::getContainer()->get('api_platform.metadata.resource.metadata_collection_factory');
        $resourceMetadata = $factory->create($resourceClass);

        $this->assertCount(1, $resourceMetadata);
        $resource = $resourceMetadata[0];
        $operations = iterator_to_array($resource->getOperations());
        $this->assertCount(2, $operations);

        $this->assertInstanceOf($operationClass, $operations[$operationName]);
    }
}
