<?php

namespace Gallery\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arts of gallery
 *
 * @ORM\Entity
 * @ORM\Table(name="art")
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $slug
 */
class Art
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
     * @return int
     */
    public function getSlug(): int
    {
        return $this->slug;
    }

    /**
     * @param int $slug
     */
    public function setSlug(int $slug): void
    {
        $this->slug = $slug;
    }
}
