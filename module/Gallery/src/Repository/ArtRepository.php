<?php

namespace Gallery\Repository;

use Gallery\Entity\Art;
use Gallery\Entity\Image;
use Gallery\Entity\Slug;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;

/**
 * Repository of the Art.
 */
class ArtRepository
{
    public function getArtsBySlug(EntityManager $entityManager, Slug $slug): array
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('a')
            ->from(Art::class, 'a')
            ->where('a.slug = :slug')
            ->setParameter('slug', $slug)
            ->innerJoin(Image::class, 'i', Join::WITH, 'i.art = a.id');

        return $queryBuilder->getQuery()->execute();
    }

    /**
     * @param EntityManager $entityManager
     * @param int $id
     * @return Art|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getArtById(EntityManager $entityManager, int $id): ?Art
    {
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('a')
            ->from(Art::class, 'a')
            ->where('a.id = :id')
            ->setParameter('id', $id)
            ->innerJoin(Image::class, 'i', Join::WITH, 'i.art = a.id');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
