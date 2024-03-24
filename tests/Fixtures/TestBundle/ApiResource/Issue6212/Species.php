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

namespace ApiPlatform\Tests\Fixtures\TestBundle\ApiResource\Issue6212;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource]
final class Species
{
    #[ApiProperty(identifier: true)]
    #[Groups(['read'])]
    public ?int $key = null;
    #[Groups(['read'])]
    public ?string $kingdom = null;
    #[Groups(['read'])]
    public ?string $phylum = null;
    #[Groups(['read'])]
    public ?string $order = null;
    #[Groups(['read'])]
    public ?string $family = null;
    #[Groups(['read'])]
    public ?string $genus = null;
    #[Groups(['read'])]
    public ?string $species = null;

    public function getKey(): ?int
    {
        return $this->key;
    }

    public function setKey(?int $key): void
    {
        $this->key = $key;
    }

    public function getKingdom(): ?string
    {
        return $this->kingdom;
    }

    public function setKingdom(?string $kingdom): void
    {
        $this->kingdom = $kingdom;
    }

    public function getPhylum(): ?string
    {
        return $this->phylum;
    }

    public function setPhylum(?string $phylum): void
    {
        $this->phylum = $phylum;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): void
    {
        $this->family = $family;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(?string $genus): void
    {
        $this->genus = $genus;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(?string $species): void
    {
        $this->species = $species;
    }
}
