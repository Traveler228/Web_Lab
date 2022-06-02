<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $grade;

    #[ORM\Column(type: 'text')]
    private $textReview;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dateReview;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $status;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photoReview;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reviews')]
    private $userID;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'reviews')]
    private $productID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(?int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getTextReview(): ?string
    {
        return $this->textReview;
    }

    public function setTextReview(string $textReview): self
    {
        $this->textReview = $textReview;

        return $this;
    }

    public function getDateReview(): ?\DateTimeInterface
    {
        return $this->dateReview;
    }

    public function setDateReview(?\DateTimeInterface $dateReview): self
    {
        $this->dateReview = $dateReview;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPhotoReview(): ?string
    {
        return $this->photoReview;
    }

    public function setPhotoReview(?string $photoReview): self
    {
        $this->photoReview = $photoReview;

        return $this;
    }

    public function getUserID(): ?User
    {
        return $this->userID;
    }

    public function setUserID(?User $userID): self
    {
        $this->userID = $userID;

        return $this;
    }

    public function getProductID(): ?Product
    {
        return $this->productID;
    }

    public function setProductID(?Product $productID): self
    {
        $this->productID = $productID;

        return $this;
    }
}
