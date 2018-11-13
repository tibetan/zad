<?php

namespace Gallery\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Gallery\Service\GalleryService;

class GalleryController extends AbstractActionController
{
    protected $entityManager;
    protected $qb;
    protected $service;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        $this->service = new GalleryService();
    }

    public function indexAction()
    {
        return ['slugs' => $this->service->getSlugs($this->entityManager)];
    }

    public function galleryAction()
    {
        $params = $this->params()->fromRoute();

        return [
            'slug' => $params['slug'],
        ];
    }
}
