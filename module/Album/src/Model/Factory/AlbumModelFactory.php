<?php

namespace Album\Model\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Album\Model\Album as AlbumModel;

//use Album\Entity\Album as AlbumEntity;

class AlbumModelFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
                             $requestedName, array $options = null)
    {
        $model = new AlbumModel();;
        return $model;
    }
}