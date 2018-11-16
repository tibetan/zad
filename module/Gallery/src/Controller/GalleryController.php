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

    /**
     * @return array|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return ['slugs' => $this->service->getSlugs($this->entityManager)];
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function artsAction()
    {
        $slugName = $this->params()->fromRoute('slug');

        if (!$slugName) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $slug = $this->service->getSlug($this->entityManager, $slugName);

        if (!$slug) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $arts =  $this->service->getArtsBySlug($this->entityManager, $slug);

        return [
            'arts' => $arts,
        ];
    }

    public function artAction()
    {
        $artId = $this->params()->fromRoute('id');

        if (!$artId) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $art =  $this->service->getArtById($this->entityManager, $artId);

        return ['art' => $art];
    }
}
