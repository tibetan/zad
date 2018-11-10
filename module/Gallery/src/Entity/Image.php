<?php

namespace Gallery\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images for ceramics, mosaic, paintings...
 *
 * @ORM\Entity
 * @ORM\Table(name="image")
 * @property int $id
 * @property string $path
 * @property string $alt
 * @property int $priority
 * @property int $art
 */
class Image
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
    protected $path;

    /**
     * @ORM\Column(type="string")
     */
    protected $alt;

    /**
     * @ORM\Column(type="integer")
     */
    protected $priority;

    /**
     * @ORM\ManyToOne(targetEntity="Art")
     * @ORM\JoinColumn(name="art_id", referencedColumnName="id")
     */
    private $art;

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
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }

    /**
     * @return int
     */
    public function getArt(): int
    {
        return $this->art;
    }

    /**
     * @param int $art
     */
    public function setArt(int $art): void
    {
        $this->art = $art;
    }
}
