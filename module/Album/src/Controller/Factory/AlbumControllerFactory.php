<?php

namespace Album\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Doctrine\ORM\EntityManager;
use Album\Controller\AlbumController;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class AlbumControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
                             $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);
        return new AlbumController($entityManager);
    }
}
