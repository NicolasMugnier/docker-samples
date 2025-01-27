<?php

namespace Docker\App\BusinessRules\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'albums')]
class Album
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public readonly ?int $id;

    public function __construct(
        #[ORM\Column(type: 'string')]
        public string $title,
        #[ORM\Column(type: 'string')]
        public string $artist,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }
}
