<?php

namespace Gallery\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Arts of gallery
 *
 * @ORM\Entity
 * @ORM\Table(name="art")
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Slug $slug
 */
class Art implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Slug")
     * @ORM\JoinColumn(name="slug_id", referencedColumnName="id")
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="art")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Slug|null
     */
    public function getSlug(): ?Slug
    {
        return $this->slug;
    }

    /**
     * @param Slug|null $slug
     */
    public function setSlug(?Slug $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    // TODO addImage() and removeImage() were also added
}
