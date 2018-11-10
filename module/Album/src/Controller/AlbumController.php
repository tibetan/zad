<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Album\Entity\Album as albumEntity;
use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Model\AlbumInterface;

class AlbumController extends AbstractActionController
{
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $model = new Album();
        $albums = $model->getAlbum($this->entityManager);

        return [
            'albums' => $albums
        ];
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $model = new Album();
            $form->setInputFilter($model->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $model->exchangeArray($form->getData());
                $this->entityManager->persist($data);
                $this->entityManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }
        return ['form' => $form];
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'add'
            ));
        }

        $album = $this->entityManager->find(albumEntity::class, $id);
        if (!$album) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'index'
            ));
        }

        $form  = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->entityManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $album = $this->entityManager->find(albumEntity::class, $id);
                if ($album) {
                    $this->entityManager->remove($album);
                    $this->entityManager->flush();
                }
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return array(
            'album' => $this->entityManager->find(albumEntity::class, $id)
        );
    }
}