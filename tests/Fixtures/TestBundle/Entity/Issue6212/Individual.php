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

namespace ApiPlatform\Tests\Fixtures\TestBundle\Entity\Issue6212;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Tests\Fixtures\TestBundle\ApiResource\Issue6212\Species;
use ApiPlatform\Tests\Fixtures\TestBundle\Entity\Book;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    normalizationContext: ['groups' => ['read']],
)]
#[ORM\Entity]
class Individual
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['read'])]
    #[ORM\Column(length: 255)]
    public ?string $name = null;

    // The integer is stored in the database, and a state provider transforms the integer into the Species class
    #[ApiProperty]
    #[Groups(['read'])]
    public int|Species|null $species = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReference(): ?Book
    {
        return $this->reference;
    }

    public function setReference(?Book $reference): void
    {
        $this->reference = $reference;
    }

    public function getSpecies(): int|Species|null
    {
        return $this->species;
    }

    public function setSpecies(int|Species|null $species): static
    {
        $this->species = $species;

        return $this;
    }
}
