<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titleRole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleRole(): ?string
    {
        return $this->titleRole;
    }

    public function setTitleRole(string $titleRole): self
    {
        $this->titleRole = $titleRole;

        return $this;
    }
}
