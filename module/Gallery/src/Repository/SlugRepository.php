<?php

namespace Gallery\Repository;

use Gallery\Entity\Slug;
use Doctrine\ORM\EntityManager;

/**
 * Repository of the Slug.
 */
class SlugRepository
{
    /**
     * @param EntityManager $entityManager
     * @return Slug[]
     */
    public function getSlugs(EntityManager $entityManager): array
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('s')
            ->from(Slug::class, 's')
            ->orderBy('s.priority', 'ASC');

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param EntityManager $entityManager
     * @param string $slugName
     * @return Slug|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getSlug(EntityManager $entityManager, string $slugName): ?Slug
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('s')
            ->from(Slug::class, 's')
            ->where('s.slug = :slug')
            ->setParameter('slug', $slugName);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
