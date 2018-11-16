<?php

namespace Gallery\Service;

use Gallery\Repository\SlugRepository;
use Gallery\Repository\ArtRepository;
use Gallery\Entity\Slug;
use Gallery\Entity\Art;
use Doctrine\ORM\EntityManager;

class GalleryService
{
    /**
     * @var SlugRepository
     */
    protected $slugRepository;

    /**
     * @var ArtRepository
     */
    protected $artRepository;

    /**
     * GalleryService constructor.
     */
    public function __construct()
    {
        $this->slugRepository = new SlugRepository();
        $this->artRepository = new ArtRepository();
    }

    /**
     * @param EntityManager $entityManager
     * @return array
     */
    public function getSlugs(EntityManager $entityManager): array
    {
        return $this->slugRepository->getSlugs($entityManager);
    }

    /**
     * @param EntityManager $entityManager
     * @param string $slugName
     * @return Slug|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getSlug(EntityManager $entityManager, string $slugName): ?Slug
    {
        return $this->slugRepository->getSlug($entityManager, $slugName);
    }

    /**
     * @param EntityManager $entityManager
     * @param Slug $slug
     * @return array
     */
    public function getArtsBySlug(EntityManager $entityManager, Slug $slug): array
    {
        return $this->artRepository->getArtsBySlug($entityManager, $slug);
    }

    /**
     * @param EntityManager $entityManager
     * @param int $id
     * @return Art|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getArtById(EntityManager $entityManager, int $id): ?Art
    {
        return $this->artRepository->getArtById($entityManager, $id);
    }
}
