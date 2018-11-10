<?php

namespace Gallery\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Doctrine\ORM\EntityManager;
use Gallery\Controller\GalleryController;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class GalleryControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
                             $requestedName, array $options = null)
    {
        return new GalleryController($container->get(EntityManager::class));
    }
}
