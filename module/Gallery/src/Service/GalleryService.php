<?php

namespace Gallery\Service;

use Gallery\Repository\SlugRepository;
use Doctrine\ORM\EntityManager;

class GalleryService
{
    /**
     * @var SlugRepository
     */
    protected $slugRepository;

    /**
     * GalleryService constructor.
     */
    public function __construct()
    {
        $this->slugRepository = new SlugRepository();
    }

    /**
     * @param EntityManager $entityManager
     * @return array
     */
    public function getSlugs(EntityManager $entityManager): array
    {
        return $this->slugRepository->getSlugs($entityManager);
    }
}
