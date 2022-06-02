<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titleProduct;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $productPhoto;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    private $CategoryID;

    #[ORM\OneToMany(mappedBy: 'productID', targetEntity: Review::class)]
    private $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleProduct(): ?string
    {
        return $this->titleProduct;
    }

    public function setTitleProduct(string $titleProduct): self
    {
        $this->titleProduct = $titleProduct;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProductPhoto(): ?string
    {
        return $this->productPhoto;
    }

    public function setProductPhoto(?string $productPhoto): self
    {
        $this->productPhoto = $productPhoto;

        return $this;
    }

    public function getCategoryID(): ?Category
    {
        return $this->CategoryID;
    }

    public function setCategoryID(?Category $CategoryID): self
    {
        $this->CategoryID = $CategoryID;

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setProductID($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getProductID() === $this) {
                $review->setProductID(null);
            }
        }

        return $this;
    }
}
